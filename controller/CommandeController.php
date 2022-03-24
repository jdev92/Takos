<?php

require_once 'model/Commande.php';
require_once 'core/Session.php';

class commandeController
{
    public Session $session;

    public function __construct()
    {
        $this->session = new Session();
        $this->commande = new Commande();
    }

    // ajouter une commande
    public function addCommande(array $infoCommande)
    {
        $this->session->setCommande($infoCommande);
        $this->session->setFlashMessage('success', 'La commande a bien été ajoutée');
    }

    public function commandeForm(array $fields)
    {
        $tabMessages = [];

        foreach ($fields as $field => $content) {
            if (empty($fields[$field])) {
                Session::setInputs($_POST);
                return [['red' => 'Veuillez remplir tous les champs']];
            }
        }
        if (count($tabMessages) == 0) {
            $this->commande->addOneCommande(
                $this->session->get_current_user(),
                intval($fields['order_car_id']),
                $fields
            );
            $this->addCommande($fields);
        }
    }

    //supprimer une commande
    public function deleteCommande(int $order_ref)
    {
        unset($_SESSION['commande'][$order_ref]);

        $this->commande->deleteCommande($order_ref);

        $this->session->setFlashMessage('warning', 'La commande a été supprimée ');
    }

    //modifier une commande
    public function updateCommande()
    {
        $this->session->setFlashMessage('warning', 'La commande a bien été modifiée');
        header('Location: index.php?route=reservation');
        exit();
    }
}
