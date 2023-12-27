<?php

namespace App\Repository;

use App\Entity\Book;
use App\Db\Mysql;

class BookRepository 
{
    public function getById(int $id)
    {
        //Appel BDD
        $mysql = Mysql::getInstance(); // Permet de récupérer l'instance de Mysql
        $pdo = $mysql->getPDO();// Permet de récupérer l'instance de PDO

        //requête SQL
        $query = $pdo->prepare('SELECT * FROM book WHERE id = :id');
        $query->bindValue(':id', $id, $pdo::PARAM_INT);
        $query->execute();
        $book = $query->fetch($pdo::FETCH_ASSOC); // $pdo::FETCH_ASSOC Permet de retourner un tableau associatif

        $bookEntity = new Book();
        $bookEntity->setId($book['id']);
        $bookEntity->setTitle($book['title']);
        $bookEntity->setDescription($book['description']);

        return $bookEntity;
    }
}