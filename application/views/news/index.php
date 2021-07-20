<!--<h2><?php /*echo $title;*/ ?></h2>-->





<?php foreach ($space as $space_item): ?>

        <h3><?php echo $space_item['dolzina']."x"; echo $space_item['sirina']." "; echo ucfirst(str_replace("_", " ", $space_item['opis_k'])); echo " $".$space_item['cena']." /month"; ?></h3>
        <div class="main">
                <?php echo $space_item['mesto'].","." ".$space_item['drzava']; ?>
                <?php if($space_item['lokacija'] != 'none') { echo $space_item['lokacija']; } ?>
        </div>
        <p><a href="<?php echo site_url('news/view/'.$space_item['id']); ?>">View article</a></p>

<?php endforeach; ?>

