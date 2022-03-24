<?php

require_once 'core/Session.php';

class AuthController
{

    private User $user;

    public function __construct(User $user)
    {
        $this->userClass = $user;
    }

    public function registerForm(array $fields)
    {
        $tabMessages = [];

        foreach ($fields as $field => $content) {
            if (empty($fields[$field])) {
                Session::setInputs($_POST);
                return [['red' => 'Veuillez remplir tous les champs']];
            }
        }

        if (!filter_var($fields['user_mail'], FILTER_VALIDATE_EMAIL))
            $tabMessages[] = ['red' => 'Le mail n\'est pas valide'];

        if ($fields['user_password'] !== $fields['user_password2'])
            $tabMessages[] = ['red' => 'Les mots de passe ne sont pas indentique'];

        if ($this->userClass->getOneUser($fields['user_mail']) == true)
            $tabMessages[] = ['red' => 'Un utilisateur existe déjà avec cette adresse mail'];

        if ($tabMessages) {
            Session::setInputs($_POST);
            return $tabMessages;
        };

        $this->userClass->addOneUser($_POST);
        Session::resetSession('input');
        Session::setFlashMessage('success', 'Félicitation votre compte a bien été créé');

        header('location: index.php?route=login');
        exit();
    }

    public function loginForm(array $fields)
    {
        $tabMessages = [];

        foreach ($fields as $field => $content) {
            if (empty($fields[$field])) {
                return [['red' => 'Veuillez remplir tous les champs']];
            }
        }

        $user = $this->userClass->getOneUser($fields['user_mail']);

        if ($user == false)
            return [['red' => 'Cet utilisateur n\'existe pas']];

        if (password_verify($fields['user_password'], $user['user_password']) == false)
            return [['red' => 'Le mot de passe est incorrect']];

        Session::setUser($user);
        Session::setFlashMessage('success', 'Bonjour, vous êtes connecté ');
        header('location: index.php');
        exit();
    }
}
