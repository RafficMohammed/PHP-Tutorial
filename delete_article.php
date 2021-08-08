<?php
 require 'includes/connection.php';
 require 'includes/article.php';
 require 'includes/auth.php';

session_start();

if (! isLoggedIn()){
    header('Location: login.php');
}


 $conn=getDb();
 

if(isset($_GET['id']))
{

   
$op=getArticle($conn,$_GET['id']);

if($op)
{
    $id =$op['id'];
    $title = $op['title'];
    $content=$op['content'];
    $date=$op['published_at'];
}else
{
    die("Id not found");
}

}

else{
    $op=null;
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{

$sql = "DELETE FROM articles where id=$id";

$results = mysqli_query($conn,$sql);
 if($results === false)
 {
     echo mysqli_error($conn);
 }
 else{
     header("Location: index.php");
 }

}

?>
<?php require 'includes/header.php'?>
<h1>Delete Article</h1>

<p>Are You sure want to delete </p>
<form method="Post">
<button>Delete</button>
</form>
<?php require 'includes/footer.php'?>