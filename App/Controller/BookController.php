<?php

namespace App\Controller;

use App\Repository\BookRepository;

class BookController extends Controller
{
    public function route():void
    {
        try{
            if (isset($_GET['action'])) {
                switch ($_GET['action']){
                    case 'show':
                        //appeler la méthode show()
                        $this->show();
                        break;
    
                    case 'list':
                        //appeler la méthode list
                        $this->list();
                        break;

                    case 'edit':
                        //appeler la méthode edit
                        $this->edit();
                        break;

                    case 'add':
                        //appeler la méthode add
                        $this->add();
                        break;

                    case 'delete':
                        //appeler la méthode delete
                        $this->delete();
                        break;
    
                    default:
                        throw new \Exception("Cette action n'existe pas");
                        break;
                }
            } else {
                throw new \Exception("Aucune action détectée");
            }    
        } catch(\Exception $e){
            $error = [
                'error' => $e->getMessage()
            ];

            $this->render('errors/default', $error);
        }
    }

    protected function show()
    {
        try{
            if(isset($_GET['id'])){

                $id = (int)$_GET['id'];
                // Charger un livre par appel au repository
                $bookRepository = new BookRepository();
                $book = $bookRepository->getById($id);

                $this->render('book/show', [
                    'book' => $book
                ]);
            } else {
                throw new \Exception("L'id est manquant en paramètre");
            }
        } catch(\Exception $e){
            $error = [
                'error' => $e->getMessage()
            ];

            $this->render('errors/default', $error);
        }
    }

}