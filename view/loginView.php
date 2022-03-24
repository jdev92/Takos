<form action="#" method="post">
    <h2>Se connecter</h2>
    <!-- MESSAGES ERROR FORM -->
    <?php if (!empty($tabMessages)) : ?>
        <div class="p-3">
            <?php foreach ($tabMessages as $message) :  ?>
                <p style='color:<?= key($message) ?>'><?= $message[key($message)] ?></p>
            <?php endforeach ?>
        </div>
    <?php endif ?>

    <div class="input">
        <input type="email" name="user_mail" id="user_mail" placeholder="E-mail" required>
        <input type="password" name="user_password" placeholder="Mot de passe" required>
    </div>

    <div class="btn">
        <button type="submit">Se connecter</button>
    </div>

    <p class="register">Vous n'avez pas encore de compte ? <a href="index.php?route=register">S'inscrire</a></p>

</form>