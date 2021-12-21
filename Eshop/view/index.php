<?php
session_start();
var_dump($_SESSION);

// if($_SESSION['login']){

// } else{

// }

include('../model/function.php');
include('../model/read.php');
include('../model/insert.php');

include('include/head.php');
include('include/nav.php');

$cat = TakeAllCat();
?>


<div>
    <?php

    foreach ($cat as $key => $value) {
        $value = $value['Type_Name'];

        echo "<div id='$value'>";
        echo "<h2>$value</h2>";
        echo "<div class='Gallery'>";

        $tshirtlist = TakeAllInCat($value);
        foreach ($tshirtlist as $key => $value) {
            //var_dump($value);
            echo "<p class='desc'>" . $value['Tshirt_Description'] . "</p>";
            echo "<p class='prix'>" . $value['Tshirt_Prise'] . "</p>";
            echo "<img class='img' src=" . $value['Tshirt_IMG'] . ">";
        }
        echo '</div> </div>';
    }
    ?>

    
    <?php
        echo "<div class='all'>";
        echo "<h2> All </h2> ";        
        echo "<div class='Gallery'>";

        $tshirtList = TakeAll();
        var_dump($tshirtlist);

        exit;

        foreach ($tshirtlist as $key => $value) {
            var_dump($value);
            echo "<p class='desc'>" . $value['Tshirt_Description'] . "</p>";
            echo "<p class='prix'>" . $value['Tshirt_Prise'] . "</p>";
            echo "<img class='img' src=" . $value['Tshirt_IMG'] . ">";
        }
        echo '</div> </div>';
    ?>
</div>

<a href="../controller/coucou.php" class="coucou"> Coucou </a>

<?php
include('include/footer.php');
?>