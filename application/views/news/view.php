<!--<h2><?php /*echo $title;*/ ?></h2>-->

        <h3><?php echo $news_item['title']; ?></h3>
        <div class="main">
                <?php echo $news_item['text']; ?>
        </div>
        <p><a href="<?php echo site_url('news/edit/'.$news_item['slug']); ?>">Edit article</a></p>
        <p><a onclick="return confirm('Are you sure you want to delete?');" href="<?php echo site_url('news/delete/'.$news_item['slug']); ?>">Delete article</a></p>

