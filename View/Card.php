<?php

require_once('config.php');
require_once(BASE_PATH . '/Controller/logic.php');

$cards = getAllCards();

$total_rows = count($cards);


$total_per_page = 2;

if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}
$from = ($page-1) * $total_per_page;

$total = ceil($total_rows / $total_per_page);

if(isset($_GET['category']) && is_numeric($_GET['category'])){

    $cards = getAllCardsByLimit( $_GET['category'],$from,$total_per_page);

}else{

    $cards = getAllCardsByLimit(null,$from,$total_per_page);

}


?>
<?php foreach($cards as $card){
?>
<div class="col">
                <div class="card h-100">
                    <img src="<?=BASE_URL.'/assets/images/'.$card['image']?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?=$card['title']?></h5>
                        <p class="card-text"><?=$card['description']?></p>

                        <form action="<?=BASE_URL.'/View/deleteCard.php'?>" method="POST">
                            <input type="hidden" name="id-delete" value="<?=$card['pk']?>">
                            <input type="submit" class="btn btn-danger" name="delete" value="DELETE">
                            
                        </form>

                        <form action="<?=BASE_URL.'/View/updateCard.php'?>" method="POST">
                            <input type="hidden" name="id-update" value="<?=$card['pk']?>">
                            <input type="submit" class="btn btn-info" name="update" value="UPDATE">
                            
                        </form>
                    </div>
                </div>
            </div>
            <?php }?>
</div>


</section>

<nav aria-label="Page navigation example mt-5">
    <ul class="pagination justify-content-center mt-5">
        <li class="page-item disabled">
        </li>
        <?php
        for($i = 1; $i<= $total;$i++){

            echo "<li class='page-item'><a class='page-link' href='index.php?page=".$i."'>".$i."</a></li>";
            
        }
        ?>

        <li class="page-item">

        </li>
    </ul>
</nav>