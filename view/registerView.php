<h2>Créez votre compte</h2>
<div class="form">
    <form action="#" method="post">
        <!-- MESSAGES ERROR FORM -->
        <?php if (!empty($tabMessages)) : ?>
            <div class="p-3">
                <?php foreach ($tabMessages as $message) :  ?>
                    <p style='color:<?= key($message) ?>'><?= $message[key($message)] ?></p>
                <?php endforeach ?>
            </div>
        <?php endif ?>

        <div class="input">
            <input type="text" name="user_firstname" id="user_firstname" placeholder="Nom" <?= Session::getInput("user_firstname", 'Nom') ?>>
            <input type="text" name="user_lastname" id="user_lastname" placeholder="Prénom" <?= Session::getInput("user_lastname", 'Prénom') ?>>
            <input type="email" name="user_mail" id="user_mail" placeholder="E-mail" <?= Session::getInput("user_mail", 'E-mail') ?>>
            <input type="password" name="user_password" id="user_password" placeholder="Mot de passe">
            <input type="password" name="user_password2" id="user_password2" placeholder="Confirmer le mot de passe">

        </div>

        <div class="btn">
            <button type="submit" value="submit" name="submit">S'inscrire</button>
        </div>
    </form>
</div>