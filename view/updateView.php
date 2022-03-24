<div class="form">
    <h1>Modifier ma commande<?php  ?></h1>
    <form method="post">
        <div class="page">
            <div class="departure">
                <label for="order_depart">Départ:</label>
                <input type="search" id="order_depart" name="order_depart" value="<?php echo $current_commande["order_depart"]; ?>" placeholder="Adresse de départ" autocomplete="off">
            </div>

            <div class="arrival">
                <label for="order_arrival">Arrivée:</label>
                <input type="search" id="order_arrival" name="order_arrival" value="<?php echo $current_commande["order_arrival"]; ?>" placeholder="Adresse de destination" autocomplete="off">
            </div>

            <div>
                <h2>Modifier le véhicule :</h2>
                <input type="radio" name="order_car_id" id="order_car_id1" value="1" <?php if ($current_commande['order_car_id'] == 1) echo 'checked'; ?>>
                <label for="order_car_id1">Berline</label>
            </div>

            <div>
                <input type="radio" name="order_car_id" id="order_car_id2" value="2" <?php if ($current_commande['order_car_id'] == 2) echo 'checked'; ?>>
                <label for="order_car_id2">Eco</label>
            </div>

            <div>
                <input type="radio" name="order_car_id" id="order_car_id3" value="3" <?php if ($current_commande['order_car_id'] == 3) echo 'checked'; ?>>
                <label for="order_car_id3">Van</label>
            </div>
            <div>
                <h2>Modifier la date de réservation</h2>
                <label for="datepicker">Date </label>
                <input type="text" id="datepicker" value="<?php echo $current_commande["datepicker"]; ?>" name="datepicker" />
            </div>

            <button type="submit">Modifiez</button>
        </div>
    </form>
</div>