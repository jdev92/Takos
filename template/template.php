<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Takos</title>
    <!-- jquery ui datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://jqueryui.com/resources/demos/datepicker/i18n/datepicker-fr.js"></script>
    <!-- bootstap -->
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <!--font google-->
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">  
    <!-- style.css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <a href="index.php" class="title">TAKOS</a>
        <div class="container-nav">
            <nav>
                <ul>
                    <li><a href="index.php?route=home">Accueil</a></li>
                    <li><a href="index.php?route=services">Nos services</a></li>
                    <li><a href="index.php?route=info">Infos / Tarifs</a></li>
                        <?php if(array_key_exists('user',$_SESSION) == false): ?>
                    <li><a href="index.php?route=register">Créer un compte</a></li>
                    <li><a href="index.php?route=login">Se connecter</a></li>
                        <?php else:?>
                    <li><a href="index.php?route=reservation">Réservation</a></li>
                    <li><a href="index.php?route=logout">Se déconnecter (<?php echo $_SESSION['user']['user_firstname']; ?>)</a></li>                                            
                        <?php endif;?>
                </ul>
            </nav>
        </div>
    </header>

    <!-- MESSAGE FLASH  -->
    <?php if(!empty($_SESSION['flash-message'])) : ?>
    
    <?php foreach($_SESSION['flash-message'] as $key => $value) :  ?>
        <div class="alert alert-<?= $key ?>" role="alert">
          <?= $value ?>
        </div>
    <?php endforeach ?>

    <?php unset($_SESSION['flash-message']) ; endif; ?>

    <main class="container">
        <?php require $view ?>
    </main>

    <footer>
        <div class="row">
            <div class="liens">
                <h3>Liens utiles</h3>
                <p><a href="index.php?route=commande">Commander</a><br>
                    <a href="index.php?route=services">Véhicules</a><br>
                    <a href="index.php?route=contact">Contacts</a>
                </p>
            </div>

            <div class="contacts">
                <h3>Contacts</h3>
                <address>
                    <p><i class="fas fa-mobile-alt"></i>
                        "01 02 03 04 05"<br>
                        <i class="far fa-envelope"></i>
                        takos@takos.fr
                    </p>
                </address>
            </div>

            <div class="reseaux">
                <h3>Réseaux sociaux</h3>
                <ul>
                    <li>
                        <a href="https://www.facebook.com">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </li>

                    <li>
                        <a href="https://www.twitter.com">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>

                    <li>
                        <a href="https://www.instagram.com">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="app">
            <h3>Télécharger notre application</h3>
            <ul>
                <li>
                    <a href="https://play.google.com/store?hl=fr&gl=FR">
                        <img src="img/badge-google-play.png" alt=" image Google play">
                    </a>
                </li>

                <li>
                    <a href="https://www.apple.com/fr/app-store/">
                        <img src="img/badge-app-store.png" alt=" image Apple store">
                    </a>
                </li>
            </ul>
        </div><br>
    </footer>
    <script src="js/datepicker.js"></script>
    <script src="js/commande.js"></script>

</body>

</html>