<?php
 require 'includes/connection.php';
 require 'includes/article.php';
 require 'includes/auth.php';

 session_start();
 
 if (! isLoggedIn()){
     header('Location: login.php');
 }
 
 $conn=getDb();
 

if(isset($_GET['id'])){

   
$op=getArticle($conn,$_GET['id']);

if($op){
    $id =$op['id'];
    $title = $op['title'];
    $content=$op['content'];
    $date=$op['published_at'];
}else{
    die("Id not found");
}

}

else{
    $op=null;
}



if($_SERVER["REQUEST_METHOD"]=="POST")
{
    

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
        $sql = "UPDATE articles SET 
        title = '".mysqli_escape_string($conn,$title)."',
        content = '".mysqli_escape_string($conn,$content)."',
        published_at ='".mysqli_escape_string($conn,$date)."'
        where id = $id ";
     $results = mysqli_query($conn,$sql);

     if($results === false)
     {
         echo mysqli_error($conn);
     }else{

       
        
         echo "New article are added :";
         header("Location: article.php?id=$id");
     }
    }
}

?>

<?php require 'includes/header.php'?>
<h1>Edit Article</h1>

<?php require 'includes/article_form.php'?>
<?php require 'includes/footer.php'?>