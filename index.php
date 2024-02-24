<?php

require_once('config.php');
require_once(BASE_PATH . '/Controller/logic.php');

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title> Articles </title>
  </head>
  <body>


    <section class="container">

        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <h1> Articles </h1>
                
                <form>
                    <div class="row g-3 my-4">
                        <div class="col-auto">

                        <!-- Categories Component -->
                        <?php
            
                            require(BASE_PATH.'/View/Categories.php');
                        
                        ?>

                            <button class="btn btn-primary"><a style="text-decoration:none; color:white" href="<?=BASE_URL.'/View/insertCard.php'?>"> Add Blog</a></button> 

                        </div>
                        
                    </div>
                    
                </form>

                
            </div>
        </div>

        <!-- Card Component -->
        <div class="row row-cols-1 row-cols-md-3 g-4">
            
            <?php
            
                require(BASE_PATH.'/View/Card.php');
            
            ?>
 

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
