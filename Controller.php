<?php 

require_once 'model/User.php';
require_once 'model/Commande.php';


abstract class Controller
{

    public function __construct()
    {

        $this->userModel = new User();
        $this->commandeModel = new Commande();
        
    }

    public function run(string $view, array $params = [])
    {
        
        // ${$key} -> créera des $variables pour chaque clés du tableau 
        foreach($params as $key => $value)
        {
            ${$key} = $value;
        } 

        require 'template/template.php';
        
    }
    
    public function redirect(string $path)
    {   
        header('Location: '.$path);
        exit;    
    }

}