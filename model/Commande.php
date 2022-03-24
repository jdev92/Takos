<?php

require_once 'core/Database.php';

class Commande extends Database 
{

    //fonction qui ajoute une commande
    public function addOneCommande( int $userID, int $carID, array $infoCommande) :void
    {
        $sql =  "INSERT INTO    
                    `commande`  (`order_user_id`, 
                                `order_car_id`, 
                                `order_depart`, 
                                `order_arrival`, 
                                `datepicker`) 
                VALUES 
                    (           :user_id, 
                                :car_id, 
                                :order_depart, 
                                :order_arrival, 
                                :datepicker)";
    
        $q = $this->pdo->prepare($sql);
        $q->bindValue(':user_id', htmlspecialchars($userID), PDO::PARAM_INT);
        $q->bindValue(':car_id', htmlspecialchars($carID), PDO::PARAM_INT);
        $q->bindValue(':order_depart', htmlspecialchars($infoCommande['order_depart']), PDO::PARAM_STR);
        $q->bindValue(':order_arrival', htmlspecialchars($infoCommande['order_arrival']), PDO::PARAM_STR);
        $q->bindValue(':datepicker', date("Y-m-d H:i:s", strtotime(str_replace('/', '-', htmlspecialchars($infoCommande['datepicker'])))), PDO::PARAM_STR);
        $q->execute();
    }

    // supprimer une commande
    public function deleteCommande($orderID): void
    {
        $sql = "DELETE FROM `commande` WHERE order_ref= ?";
        $q = $this->pdo->prepare($sql);
        $q->bindParam(1, $orderID, PDO::PARAM_INT);
        $q->execute();
    }

    // récupérer toutes les réservations
    public function get_reservation(int $userID){
        $sql = "SELECT * FROM commande WHERE order_user_id=?";
        $q = $this->pdo->prepare($sql);
        $q->bindParam(1, $userID, PDO::PARAM_INT);
        $q->execute();
        $result = $q->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function get_one_reservation(int $carID){
        $sql = "SELECT * FROM commande WHERE order_ref=?";
        $q = $this->pdo->prepare($sql);
        $q->bindParam(1, $carID, PDO::PARAM_INT);
        $q->execute();
        $result = $q->fetchAll();
        return $result[0];
    } 

    // modifier une Commande
    public function update_reservation(int $userID, int $carID, array $infoCommande): void
    {
        $sql = "UPDATE 
                    `commande` 
                SET 
                    `order_car_id` = :order_car_id,
                    `order_depart` = :order_depart,
                    `order_arrival` = :order_arrival,
                    `datepicker` = :datepicker
                WHERE 
                    `order_ref` = :car_id";

        $q = $this->pdo->prepare($sql);
        $q->bindValue(':order_car_id', htmlspecialchars($infoCommande['order_car_id']), PDO::PARAM_INT);
        $q->bindValue(':order_depart', htmlspecialchars($infoCommande['order_depart']), PDO::PARAM_STR);
        $q->bindValue(':order_arrival', htmlspecialchars($infoCommande['order_arrival']), PDO::PARAM_STR);
        $q->bindValue(':datepicker', date("Y-m-d H:i:s", strtotime(str_replace('/', '-', htmlspecialchars($infoCommande['datepicker'])))), PDO::PARAM_STR);
        $q->bindValue(':car_id', $carID, PDO::PARAM_INT);
        $q->execute();
        

    }

}