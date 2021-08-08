

<?php
function getDb(){
    $db_host = "localhost";
    $db_user = "raffi";
    $db_pass = "2JhmqJNf4exXJP]P";
    $db_name = "blog";
    
    $conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
    
    if(mysqli_connect_error()){
        echo mysqli_connect_error();
        exit;
    }

    return $conn;
}


?>