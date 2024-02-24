<?php
require_once('../config.php');
require_once(BASE_PATH . '/Controller/logic.php');


if(isset($_POST['id-insert'])){

    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = '../assets/images'.$file_name;

    $title = mysqli_real_escape_string(getConnection(),$_POST['title']);
    $description = mysqli_real_escape_string(getConnection(),$_POST['description']);
 
    insertCard($title,$description,$file_name);

    if(move_uploaded_file($tempname,$folder) ){
        echo 'echo inserted ';

    }else{
        echo 'not inserted'.mysqli_error(getConnection());
    }
    header('location: ../index.php');


}
?>


<form action="insertCard.php" method="POST" enctype="multipart/form-data">

    <label for="title"> title: </label>
    <input type="text" name="title" id="title">

    <label for="description"> description: </label>
    <textarea type="text" name="description" required id="description"> </textarea>

    <label for="image"> image: </label>
    <input type="file" name= "image" required >

    <input type="submit" name="id-insert" value="Add blog">

</form>