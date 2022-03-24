<?php

require_once 'core/Database.php';

class User extends Database 
{ 

    // fonction qui ajoute un utilsateur
    public function addOneUser (array $infoUser) :void 
    {

        $password_crypted = password_hash($infoUser['user_password'], PASSWORD_DEFAULT);

        $sql= "INSERT INTO 
                    `user`( `user_firstname`,
                            `user_lastname`,
                            `user_mail`,
                            `user_password`) 
                VALUES     
                    (       :user_firstname,
                            :user_lastname,
                            :user_mail,
                            :user_password)";

        $q = $this->pdo->prepare($sql);
        $q->bindValue(':user_firstname', htmlspecialchars($infoUser['user_firstname']) , PDO::PARAM_STR);
        $q->bindValue(':user_lastname', htmlspecialchars($infoUser['user_lastname']) , PDO::PARAM_STR);
        $q->bindValue(':user_mail', htmlspecialchars($infoUser['user_mail']) , PDO::PARAM_STR);
        $q->bindValue(':user_password', htmlspecialchars($password_crypted) , PDO::PARAM_STR);
        $q->execute();
          
    }

    // fonction qui récupère un utilsateur
    public function getOneUser(string $mail) :array
    {

        $sql = "SELECT
                    `user_id`,
                    `user_firstname`,
                    `user_lastname`,
                    `user_mail`,
                    `user_password`,
                    `user_date_creation`
                FROM
                    `user` 
                WHERE 
                    `user_mail` = :user_mail";
        $q = $this->pdo->prepare($sql);
        $q->bindValue(':user_mail', htmlspecialchars($mail) , PDO::PARAM_STR);
        $q->execute(); 
        
        return ($q->fetch(PDO::FETCH_ASSOC)) ?:  [];

    }

    // fonction qui récupère tous les utilsateurs
    function getAllUser() :array 
    {
        
        $sql =  "SELECT 
                    `user_id`,
                    `user_firstname`,
                    `user_lastname`,
                    `user_mail`,
                    `user_password`,
                    `user_date_creation` 
                FROM 
                    `user` 
                ORDER BY 
                    `user`.`user_id` ASC";
        $q = $this->pdo->prepare($sql);
        $q->execute(); 
        
        return $q->fetchAll(PDO::FETCH_ASSOC);
     
    }
}