<?php
 
 require 'includes/connection.php';
 require 'includes/auth.php';

 session_start();
 
 if (! isLoggedIn()){
     header('Location: login.php');
 }
 
 $conn=getDb();
$sql = "SELECT * FROM articles ORDER BY published_at;";

$results = mysqli_query($conn,$sql);

if($results === false)
{
    echo mysqli_error(conn);
}else{
  $op = mysqli_fetch_all($results,MYSQLI_ASSOC);
}

?>
<?php require 'includes/header.php' ?>
<a href="new_article.php">New Article</a>
<?php if(empty($op)): ?>
<p>No Records Found</p>
<?php else: ?>
<ul>
  <?php if($_SESSION['is_logged_in'] && $_SESSION['is_logged_in']): ?>
    <p>You Logged In</p>
<form method="post" action="logout.php">
<button>Logout</button>
<?php endif;?>
</form>
<?php foreach($op as $out): ?>
<li>
<output>
<h3><a href="article.php?id=<?=$out['id']; ?>"><?= $out["title"]; ?></a></h3>
<p><?= $out['content']; ?></p>
</output>
</li>
<?php endforeach; ?>
</ul>
<?php endif; ?>

<?php require 'includes/footer.php' ?>
