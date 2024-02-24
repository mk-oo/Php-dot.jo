<?php
require_once('../config.php');
require_once(BASE_PATH . '/Controller/logic.php');


if(isset($_POST['id-update'])){

    var_dump($_POST['id-update']);

    $pk = mysqli_real_escape_string(getConnection(),$_POST['id-update']);

    $card_to_be_updated = getCard($pk);

    var_dump($card_to_be_updated);

}
if(isset($_POST['id-updateCard'])){


    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = '../assets/images'.$file_name;

    $pk = $_POST['pk'];
    $title = mysqli_real_escape_string(getConnection(),$_POST['title']);
    $description = mysqli_real_escape_string(getConnection(),$_POST['description']);
    $category = mysqli_real_escape_string(getConnection(),$_POST['category']); 

    updateCard($pk,$title,$description,$file_name,$category);

    if(move_uploaded_file($tempname,$folder) ){
        echo 'echo inserted ';

    }else{
        echo 'not inserted'.mysqli_error(getConnection());
    }
    header('location: ../index.php');
}

$catgeories = getAllCategories();

?>


<form action="updateCard.php" method="POST" enctype="multipart/form-data">

    <input type="hidden" name = "pk" value ="<?=$card_to_be_updated['pk']?>">

    <label for="title"> title: </label>
    <input type="text" name="title" id="title" value="<?=$card_to_be_updated['title']?>">

    <label for="description"> description: </label>
    <textarea type="text" name="description" required id="description"><?=$card_to_be_updated['description']?></textarea>

    <label for="image"> image: </label>
    <input type="file" name= "image" required value="<?=$card_to_be_updated['image']?>" >



    <select class="form-select" aria-label="Default select example" name= "category">

        <option selected>Select Category</option>

        <?php
        foreach($catgeories as $cat){
        ?>
            <option value= "<?=$cat['PK']?>"><?=$cat['NAME']?> </option>
        <?php
        }?> 

    </select>

    <input type="submit" name="id-updateCard" value="Update blog">

</form>
