<?php 
function getArticle($conn,$id){

    $sql = "SELECT * FROM articles where id=".$_GET['id'];

    $results = mysqli_query($conn,$sql);

    if ($results===false){
        echo mysqli_error($conn);
    }else{
        
        return mysqli_fetch_array($results,MYSQLI_ASSOC);

    }


}


function getValidate($title,$content)
{
    $errors = [];

    if($_POST['title']==''){
        $errors[] = "Title is required";
    }

    if($_POST['content']==''){
        $errors[]= "Content is required";
    }

    return $errors;
}
?>
