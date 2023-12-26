<?php

namespace App\Controller;

class PageController extends Controller
{
    public function route():void
    {
        if (isset($_GET['action'])) {
            switch ($_GET['action']){
                case 'about':
                    //appeler la méthode about()
                    $this->about();
                    break;

                case 'home':
                    //appeler la méthode home
                    var_dump('On appelle la méthode home');
                    break;

                default:
                    //Erreur
                    break;
            }
        } else {
            //Charger la page d'accueil
        }
    }

    protected function about()
    {
        $params = [
            'test' => 'abc',
            'test2' => 'abc2'
        ];

        $this->render('page/about', $params);
    }
}