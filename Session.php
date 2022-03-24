<?php

class Session 
{
    // fonction qui affiche les messages
    public static function setFlashMessage(string $type, string $message)
    {  
        $_SESSION['flash-message'] = [ $type => $message ]; 
    }
     
    // fonction qui récupere dans la session tous les champs du formulaire qui ne sont  pas validé
    public static function getInput(string $inputName ,string $placeholder) :string {
        
        
        if(!empty($_SESSION['input'][$inputName])) 
        {
            return  'value="'.$_SESSION['input'][$inputName].'"';
        }
        
        return  'placeholder="'.$placeholder.'"';
    
    }
    
     /*
     fonction qui récupere les valeurs du formulaire non validé 
     fonction qui sera appelé dans chaque input du formulaire
     */

    public static function setInputs(array $fields) :void
    {
        
        foreach($fields as $key => $value)
        {
            $_SESSION['input'][$key] = $value;
        }  

    }
    
    // fonction qui affiche l'utilisateur
    public static function setUser(array $fields) :void
    {
        foreach($fields as $key => $value)
        {
            if (is_numeric($value)):
                $value = intval($value);
            else:
                $value = htmlspecialchars($value);
            endif;
            
            $_SESSION['user'][$key] = $value;

        }        
    }

    // fonction qui affiche la commande
    public static function setCommande(array $commande)
    {
        $_SESSION['commande'][] = $commande;
    }

    public static function get_current_user() 
    {
        return $_SESSION['user']['user_id'];
    }

    // fonction qui déconnecte la session
    public static function resetSession(string $tabSession):void
    {
        unset($_SESSION[$tabSession]);
    }


}