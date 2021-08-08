
<?php if(!empty($errors)): ?>
    <ul>
        <?php foreach($errors as $error):?>
        <li><?= $error;?></li>
        <?php endforeach; ?>
    </ul>
<?php endif;?>
<form method="post">
<div>
<label>Title:<input type="text" name="title" id="title" value="<?php echo $title ?>"></label>
</div>
<div>
<label>Content:<textarea name="content" id="content" rows="4" cols="40"><?= $content?></textarea></label>
</div>
<div>
<label>Date on Published<input type="datetime-local" name="published_at" id="published_at" value="<?= htmlspecialchars($date);?>"></label>
</div>
<button>save</button>
</form>
