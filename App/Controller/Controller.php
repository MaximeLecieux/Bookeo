<?php

namespace App\Controller;

class Controller
{
    public function route():void
    {
        if (isset($_GET['controller'])) {
            switch ($_GET['controller']){
                case 'page':
                    //charger controleur page
                    $pageController = new PageController();
                    $pageController->route();
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

    protected function render(string $path, array $params = []):void
    {
        $filePath = _ROOTPATH_.'/templates/'.$path.'.php';

        //Redirige l'utilisateur sur la page demandé ou affiche un message d'erreur si page non trouvé
        try{
            if(!file_exists($filePath)){
                throw new \Exception ("Fichier non trouve : ".$filePath);
            } else {
                extract($params); //Permet de convertir le tableau en variables
                require_once $filePath;
            }
        } catch(\Exception $e){
            echo $e->getMessage();
        }


    }
}