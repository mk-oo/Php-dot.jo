<?php
require_once('../config.php');
require_once(BASE_PATH . '/Controller/logic.php');


if(isset($_POST['id-insert'])){

    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = '../assets/images'.$file_name;

    $title = mysqli_real_escape_string(getConnection(),$_POST['title']);
    $description = mysqli_real_escape_string(getConnection(),$_POST['description']);
    $category = $_POST['category'];
    insertCard($title,$description,$file_name,$category);

    if(move_uploaded_file($tempname,$folder) ){
        echo 'echo inserted ';

    }else{
        echo 'not inserted'.mysqli_error(getConnection());
    }
    header('location: ../index.php');


}
$catgeories = getAllCategories();

?>


<form action="insertCard.php" method="POST" enctype="multipart/form-data">

    <label for="title"> title: </label>
    <input type="text" name="title" id="title">

    <label for="description"> description: </label>
    <textarea type="text" name="description" required id="description"> </textarea>

    <label for="image"> image: </label>
    <input type="file" name= "image" required >



    <select class="form-select" aria-label="Default select example" name= "category">

        <option selected>Select Category</option>

        <?php
        foreach($catgeories as $cat){
        ?>
            <option value= "<?=$cat['PK']?>"><?=$cat['NAME']?> </option>
        <?php
        }?> 

    </select>

    <input type="submit" name="id-insert" value="Add blog">

</form>