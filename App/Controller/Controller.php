<?php

namespace App\Controller;

class Controller
{
    public function route():void
    {
        if($_GET['controller']) {
            switch ($_GET['controller']){
                case 'page':
                    //charger controleur page
                    var_dump('On charge la page controlleur');
                    break;

                case 'book':
                    //charger controleur book
                    var_dump('On charge la page book');
                    break;

                default:
                    //Erreur
                    break;
            }
        } else {
            //Charger la page d'accueil
        }
    }
}