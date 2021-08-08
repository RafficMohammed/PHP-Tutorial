<?php

require 'includes/connection.php';
require 'includes/article.php';
require 'includes/auth.php';

session_start();

if (! isLoggedIn()){
    header('Location: login.php');
}


$title='';
$content='';
$date='';

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $conn = getDb();

    $title = $_POST['title'];
    $content=$_POST['content'];
    $date=$_POST['published_at'];
    
    
   $errors=getValidate($title,$content);

   
     

    if($date=='')
    {
        $date= null;
    }
    
    
    if(empty($errors))
    {

    $sql = "INSERT INTO articles (title,content,published_at) VALUES
    ('".mysqli_escape_string($conn,$_POST['title'])."',
    '".mysqli_escape_string($conn,$_POST['content'])."',
    '".mysqli_escape_string($conn,$_POST['published_at'])."')";
     $results = mysqli_query($conn,$sql);

     if($results === false)
     {
         echo mysqli_error($conn);
     }else{

        $id=mysqli_insert_id($conn);
        
         echo "New article are added :";
         header("Location: article.php?id=$id");
     }
}
}
?>

<?php require 'includes/header.php' ?>

<h2>New Article</h2>

<?php require 'includes/article_form.php' ?>
<?php require 'includes/footer.php' ?>