<?php
 require 'includes/connection.php';
 require 'includes/article.php';

if(isset($_GET['id']) && is_numeric($_GET['id'])){


$conn=getDb();
$op=getArticle($conn,$_GET['id']);

}

else{
    $op=null;
}

?>
<?php require 'includes/header.php'?>
<?php if($op === null): ?>
<p>No Records Found</p>
<?php else: ?>


<output>
<h3><?= $op['title']; ?></h3>
<p><?= $op['content']; ?></p>
</output>
<a href="edit_article.php?id=<?= $op['id'];?>">Edit</a>

<a href="delete_article.php?id=<?= $op['id'];?>">Delete</a>


<?php endif; ?>
<?php require 'includes/footer.php'?>