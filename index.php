<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ajout produit</title>
</head>
<body>
    <div id="wrapper">
        <header>
            <figure>
                <img src="img/logo.jpg" alt="logo">
                <figcaption></figcaption>
            </figure>
            <h2>Business appli</h2>
            <ul>
                <li>
                    <a href="recap.php">Panier</a>
                </li>
                <p class="nombre">
                    <?php
                    session_start();
                    $totalQtt = 0;
    
                    if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
                        echo "0";
                    }
                    else {
                        foreach($_SESSION['products'] as $index => $product) {
                            $totalQtt+= $product['qtt'];
                        }
                        echo $totalQtt;
                    }
    
                    ?>
                </p>
            </ul>
        </header>
        <main>
            <div id="product">
                <h1>Ajouter un produit</h1>
                <form action="traitement.php" method="post">
                    <p class="produit">
                        <label>
                            Nom du produit :
                            <input type="text" name="name" style="margin-left: 10px;">
                        </label>
                    </p>
                    <p class="produit">
                        <label>
                            Prix du produit :
                            <input type="number" step="any" name="price" style="margin-left: 17px;">
                        </label>
                    </p>
                    <p class="produit">
                        <label>
                            Quantité désirée :
                            <input type="number" name="qtt" value="1">
                        </label>
                    </p>
                    <p class="produit">
                        <input type="submit" name="submit" value="Ajouter le produit" style="margin-left: 4px;">
                    </p>
                </form>
            </div>
            <?php

                if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
                    echo "<p>Ajoute des produits dans ton panier, j'ai besoin de thune !</p>";
                }
                else {
                    foreach($_SESSION['products'] as $index => $product) {
                        $totalQtt+= $product['qtt'];
                    }
                    echo "<p>T'as ".$totalQtt." produits dans ton panier, merci !</p>";
                }

            ?>
        </main>
        <footer>
            &copy; all rights reserved, don't copy pls !!
        </footer>
    </div>
</body>
</html>