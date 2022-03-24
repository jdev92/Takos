<h1>Ma réservation</h1>

<h2>Détails de ma réservation</h2><br>
<table class="tableReservation">
    <thead>
        <tr>
            <th>Adresse de départ</th>
            <th>Adresse de destination</th>
            <th>Type de Véhicule</th>
            <th>Date de réservation</th>
            <th></th>
            <th></th>
        </tr>

    </thead>
    <tbody>
        <?php foreach ($commandes as $key => $commandes) : ?>
            <tr>
                <td>
                    <p><?= $commandes['order_depart'] ?></p>
                </td>
                <td>
                    <p><?= $commandes['order_arrival'] ?></p>
                </td>
                <td>
                    <p>
                        <?php if ($commandes['order_car_id']  == 1) {
                            echo "Berline";
                        }
                        if ($commandes['order_car_id']  == 2) {
                            echo "Eco";
                        }
                        if ($commandes['order_car_id']  == 3) {
                            echo "Van";
                        }
                        ?>
                    </p>
                </td>
                <td>
                    <p><?= $commandes['datepicker'] ?></p>
                </td>
                <td class="btn">
                    <a href="/takos/index.php?route=reservation&delete=<?= $commandes['order_ref'] ?>">Supprimer</a>
                </td>
                <td class="btn">
                    <a href="/takos/index.php?route=update&update=<?= $commandes['order_ref'] ?>">Modifier</a>
                </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>