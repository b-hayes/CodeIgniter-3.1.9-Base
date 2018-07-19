<?php
/**
 * Created by PhpStorm.
 * User: Brad
 * Date: 19/07/2018
 * Time: 6:58 AM
 */?>
<h2><?php echo $title; ?></h2>

<?php foreach ($test as $test_item): ?>
    
    <h3><?php echo $test_item['title']; ?></h3>
    <div class="main">
        <?php echo $test_item['text']; ?>
    </div>
    <p><a href="<?php echo site_url('test/'.$test_item['slug']); ?>">View article</a></p>

<?php endforeach; ?>
