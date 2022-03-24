<?php

require_once 'core/Session.php';
require_once 'core/Controller.php';
require_once 'controller/AuthController.php';
require_once 'controller/CommandeController.php';

class AppController extends Controller{

    //fonction pour passer une commande
    public function home()
    {
        if($_POST):
            $commandeController = new CommandeController();
        endif;

        $this->run('view/homeView.php',['title' =>  'Accueil', 
                                                    'tabMessages' => $_POST ? $commandeController->commandeForm($_POST) : array()]);                                       
    }

    public function services()
    {
        $this->run('view/servicesView.php',['title' => 'Nos services']);
    }
    
    public function info()
    {
        $this->run('view/infoView.php',['title' => 'Infos / Tarifs']);
    }

    public function reservation()
    {
        $commande = new Commande;
        $session = new Session();

        if(isset($_GET["delete"])){
            $commandeController = new CommandeController();
            $commandeController->deleteCommande (htmlspecialchars($_GET["delete"]));
        }
        $commandes = $commande->get_reservation($session->get_current_user());

        $this->run('view/reservationView.php',['title' =>   'Réservation', 
                                                            'commandes' => $commandes]);
    }

    public function update()
    {
        $session = new Session();

        if(isset($_GET["update"])){
            $commande = new Commande;

            if($_POST){
                $commande->update_reservation($session->get_current_user(), htmlspecialchars($_GET["update"]), $_POST);
                $commandeController = new CommandeController();
                $commandeController->updateCommande ();
            }
            $commandeOne = isset($_GET['update']) ? $commande->get_one_reservation(htmlspecialchars($_GET["update"])) : Array();
        }
        
        $this->run('view/updateView.php',['title' =>    'modifier',
                                                        'current_commande' => $commandeOne  ]);
        
    }

    // fonction qui enregistre un nouvel utilisateur
    public function register()
    {
        if($_POST):
            $auth = new AuthController(new User);
            $tabMessages = $auth->registerForm($_POST);
        endif;

        $this->run('view/registerView.php',[ 'title' => 'Créer un compte',
                                                        'tabMessages' => $_POST ? $auth->registerForm($_POST) : array()]);
    }
    
    // fonction pour se connecter à une session
    public function login()
    {
        if($_POST):
            $auth = new AuthController(new User);
            $tabMessages = $auth->loginForm($_POST);
        endif;
        
        $this->run('view/loginView.php',['title' => 'Se connecter',
                                                    'tabMessages' => $_POST ? $auth->loginForm($_POST) : array()]);  
    }

    // fonction qui déconnecte une Session
    public function logout()
    {

        $userID = $_SESSION['user']['user_id'];

        Session::resetSession('user');
        Session::setFlashMessage('success','Au revoir et à bientôt');
        
        header('Location: index.php');
        exit;
    }
    

}