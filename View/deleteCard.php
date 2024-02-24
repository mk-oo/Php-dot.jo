<?php
require_once('../config.php');
require_once(BASE_PATH.'/Controller/logic.php');



if(isset($_POST['id-delete'])){

    $id_delete = mysqli_real_escape_string(getConnection(),$_POST['id-delete']);

    deleteCard($id_delete);

    
    header('location: ../index.php');
}


?>