<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Récapitulatif des produits</title>
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
                <li><a href="index.php">Retour aux achats</a></li>
            </ul>
        </header>
        <main>
            <div id="product">
                <?php
                    if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
                        echo "<p>Aucun produit en session...</p>";
                    }
                    else{
                        echo "<h2>Votre commande :</h2>",
                                "<table>",
                                    "<thead>",
                                        "<tr>",
                                            "<th>#</th>",
                                            "<th>Nom</th>",
                                            "<th>Prix</th>",
                                            "<th>Quantité</th>",
                                            "<th>Total</th>",
                                        "</tr>",
                                    "</thead>",
                                    "<tbody>";
                        $totalGeneral = 0;
                        $totalQtt = 0;
                        foreach($_SESSION['products'] as $index => $product){
                            echo        "<tr>",
                                            "<td>".$index."</td>",
                                            "<td>".$product['name']."</td>,",
                                            "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>,",
                                            "<td>".$product['qtt']."</td>,",
                                            "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>,",
                                        "</tr>";
                            $totalGeneral+= $product['total'];
                            $totalQtt+= $product['qtt'];
                        }
                        echo            "<tr>",
                                            "<td colspan=3>Total général : </td>",
                                            "<td>".$totalQtt."</td>",
                                            "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                                        "</tr>",
                                    "</tbody>",
                                "</table>";
                        echo "<p class='produit'>T'as ".$totalQtt." produits de valeur de ".$totalGeneral." €</p>";
                    }

                ?>
            </div>
        </main>
        <footer>
            &copy;Dalibor ANDJELKOVIC
        </footer>
    </div>
</body>
</html>