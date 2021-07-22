
<div class="container py-3">
<div id="profile">
    <?php
    echo "Hello <b id='welcome'><i>" .$username. "</i> !</b>";
    echo "<br/>";
    echo "<br/>";
    echo "Welcome to Admin Page";
    echo "<br/>";
    echo "<br/>";
    echo "Your Username is " .  $username;
    echo "<br/>";
    echo "Your Email is " . $email;
    echo "<br/>";

    echo "<h2>Your reservation</h2>";
    ?>
    <b id="logout"><a href="logout">Logout</a></b>
        <?php foreach ($user_reservation as $user_reservation_item): ?>

        <h3><?php echo $user_reservation_item['opis_k']." in ".$user_reservation_item['mesto']; ?></h3>
        <div class="main">
                <?php echo "Status: ".$user_reservation_item['status']; ?>
        </div>
        <p><a href="<?php echo site_url('news/view/'.$user_reservation_item['id']); ?>">Modify reservation</a></p>
        <p><a href="<?php echo site_url('news/view/'.$user_reservation_item['id']); ?>">Delete reservation</a></p>

        <?php endforeach; ?>

        <h2>User that reserved your spaces</h2>
        <?php foreach ($other_reservation as $other_reservation_item): ?>

        <h3><?php echo $other_reservation_item['ime']." reserved ".$other_reservation_item['opis_k']." in ".$other_reservation_item['mesto']." ".$other_reservation_item['naslov']; ?></h3>
        <div class="main">
                <?php echo "Status: ".$other_reservation_item['status']; ?>
        </div>
        <p><a href="<?php echo site_url('news/view/'.$other_reservation_item['id']); ?>">Accept reservation</a></p>
        <p><a href="<?php echo site_url('news/view/'.$other_reservation_item['id']); ?>">Decline reservation</a></p>

        <?php endforeach; ?>


        <h2>Your lised spaces</h2>
        <?php foreach ($user_space as $user_space): ?>

        <h3><?php echo $user_space['opis_k']; ?></h3>
        <div class="main">
                <?php echo "Status: ".$user_space['opis_k']; ?>
        </div>
        <p><a href="<?php echo site_url('news/view/'.$user_space['id']); ?>">Modify</a></p>
        <p><a href="<?php echo site_url('news/view/'.$user_space['id']); ?>">Delete</a></p>

        <?php endforeach; ?>

    
</div>
</div>
