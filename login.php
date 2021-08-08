<?php 
session_start();

if($_SERVER['REQUEST_METHOD']=="POST")
{
    if($_POST['username']=='raffi' && $_POST['password']=='raffi')
    {
        session_regenerate_id(true);
        $_SESSION["is_logged_in"] = true;
        header('Location: index.php');
    }
    else{
        $errors = "Login incorrect";
    }
    
}
?>

<?php require 'includes/header.php'?>
<h1>Login</h1>
<?php if(!empty($errors)):?>
<?= $errors; ?>
<?php endif; ?>
<form method="Post">
<div>
    <label>Username :<input type="text" name="username" id="username"></label>
</div>
<div>
    <label>Password :<input type="password" name="password" id="password"></label>
</div>
<button>Add</button>
</form>
<?php require 'includes/footer.php'?>