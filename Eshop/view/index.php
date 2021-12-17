<?php
    session_start();
        var_dump($_SESSION);

    // if($_SESSION['login']){

    // } else{

    // }

    include ('include/head.php');
    include ('include/nav.php');


    include ('../model/function.php');
    include ('../model/read.php');
    include ('../model/insert.php');
?>


<div>
    <div class="vintage">
        <h2> Vintage </h2>
        
        <div class="Gallery"></div>
    </div>

    <div class="hoodies">
        <h2> Hoodies </h2>
        
        <div class="Gallery"></div>
    </div>

    <div class="T-shirt">
        <h2> T-shirt </h2>

        <div class="Gallery">
            <?php
            $tshirtlist = TakeAllInCat('Hoodies');
            foreach ($tshirtlist as $key => $value){
                var_dump($key);
                var_dump($value);
            }

            ?>
        </div>
    </div>
</div>

<a href="../controller/coucou.php"> Coucou </a>

<?php
    include ('include/footer.php');
?>