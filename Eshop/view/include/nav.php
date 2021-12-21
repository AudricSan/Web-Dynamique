<?php
?>

<div class="nav">
    <ul>
        <li> logo </li>
        <li> Category </li>
        <ul class="Category">
            <?php
            $cat = TakeAllCat();
            //var_dump($cat);

            foreach ($cat as $key => $value) {
                //var_dump($value);
                $value = $value['Type_Name'];
                echo "<li><a href='#$value'>$value</a></li>";
            }
            ?>
        </ul>

        <li> About </li>
        <li> Contact </li>
    </ul>
</div>

<div class="nav2">
    <ul>
        <li> Panier </li>
        <li> Login </li>
        <li> register </li>
    </ul>
</div>