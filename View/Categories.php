<?php
require_once('config.php');
require_once(BASE_PATH . '/Controller/logic.php');

$catgeories = getAllCategories();
?>



</div>

<div class="col-auto">

    <form action="<?=BASE_URL.'Card.php'?>" method="POST">

        <select class="form-select" aria-label="Default select example" name= "category">

            <option selected>Select Category</option>

            <?php
            foreach($catgeories as $cat){
            ?>
                <option value= "<?=$cat['PK']?>"><?=$cat['NAME']?> </option>
            <?php
            }?> 

        </select>
        <input type="submit" class="btn btn-primary" value="Search"/>

    </form>