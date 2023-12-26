<?php

namespace App\Controller;

class Controller
{
    public function route():void
    {
        try{
            if (isset($_GET['controller'])) {
                switch ($_GET['controller']){
                    case 'page':
                        //charger controleur page
                        $pageController = new PageController();
                        $pageController->route();
                        break;
    
                    case 'book':
                        $bookController = new BookController();
                        $bookController->route();
                        break;
    
                    default:
                        throw new \Exception("Le controleur n'existe pas");
                        break;
                }
            } else {
                // Redirige vers la page d'accueil par défaut
                $pageController = new PageController();
                $pageController->home();
            }
        } catch (\Exception $e){
            $error = [
                'error' => $e->getMessage()
            ];

            $this->render('errors/default', $error);
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
            $error = [
                'error' => $e->getMessage()
            ];
            $this->render('errors/default', $error);
        }


    }
}