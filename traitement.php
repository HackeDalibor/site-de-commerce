<?php
    session_start();

    if(isset($_POST['submit'])){

        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
        $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

        if($name && $price && $qtt){

            $product = [
                "name"  => $name,
                "price" => $price,
                "qtt"   => $qtt,
                "total" => $price*$qtt
            ];

            $_SESSION['products'][] = $product;
            
            header("Location:index.php");
        }
        echo "<p>Qu'est-ce que tu fous ici ?!",
                "<br> <br>",
                "Vas y, retourne à l'accueil et donne-moi de l'argent !</p>";

        header("Refresh:3;URL=index.php");
    }
?>
    