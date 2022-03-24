<!-- MESSAGES ERROR FORM -->
<?php if (!empty($tabMessages)) : ?>
    <div class="p-3">
        <?php foreach ($tabMessages as $message) :  ?>
            <p style='color:<?= key($message) ?>'><?= $message[key($message)] ?></p>
        <?php endforeach ?>
    </div>
<?php endif ?>

<div class="form">
    <header class="headerCommand">

    </header>
    <form action="#" method="post">
        <div class="page">

            <h2>Réservez votre taxi</h2>
            <div class="departure">
                <label for="order_depart">Départ:</label>
                <input type="search" id="order_depart" name="order_depart" placeholder="Adresse de départ" autocomplete="off">
            </div>

            <div class="arrival">
                <label for="order_arrival">Arrivée:</label>
                <input type="search" id="order_arrival" name="order_arrival" placeholder="Adresse de destination" autocomplete="off">
            </div>

            <button class="nextCommande" type="button">Suivant</button>
        </div>
        <div class="page">
            <h2>Choix du véhicule :</h2>
            <div>
                <input type="radio" name="order_car_id" id="order_car_id1" value="1" checked>
                <label for="order_car_id1">Berline</label>
                <img src="img/berline.jpg" alt="véhicule berline">
            </div>

            <div>
                <input type="radio" name="order_car_id" id="order_car_id2" value="2">
                <label for="order_car_id2">Eco</label>
                <img src="img/eco.jpg" alt="véhicule écologique">
            </div>

            <div>
                <input type="radio" name="order_car_id" id="order_car_id3" value="3">
                <label for="order_car_id3">Van</label>
                <img src="img/van.jpg" alt="véhicule Van">
            </div>
            <br><br>

            <h2>Date de la réservation</h2>
            <p>Date: <input type="text" id="datepicker" name="datepicker">&#xA0;</p>


            <button class="previous" type="button">Précédent</button>
            <button class="nextCommande" id="nextCommande" type="button">Suivant</button>
        </div>

        <div class="page">
            <h1>Confirmation :</h1>

            <h2>Résumé de la réservation</h2>

            <ol>
                <li>Adresse de prise en charge :
                    <p id="p_adresse_start"></p>
                </li>
                <li>Adresse de destination :
                    <p id="p_adresse_arrival"></p>
                </li>
                <li>Votre véhicule :
                    <p id="p_car"></p>
                </li>
                <li>Date :
                    <p id="p_date"></p>
                </li>
            </ol>
            <?php if (array_key_exists('user', $_SESSION) == false) : ?>

                <p>Vous avez déjà un compte ? <a href="index.php?route=login">Connectez-vous</a></p>
                <p class="register">Vous n'avez pas encore de compte ? <a href="index.php?route=register">S'inscrire</a></p>

            <?php else : ?>
                <button class="previous" type="button">Précédent</button>
                <button type="submit">Commandez</button><br><br>
            <?php endif; ?>
        </div>
    </form>
</div>
<script src="js/commande.js"></script>