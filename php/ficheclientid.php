<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "conciergerie";
    try {
        // Récupération de l'ID du client à partir de l'URL
        $id_client = $_POST['id'];

        // Connexion à la base de données
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête pour récupérer les informations des commandes et des lignes de commandes pour un client spécifique
        $stmt = $conn->prepare("SELECT commande.id_com, commande.date_com, lignecommande.id_produit, lignecommande.qte FROM commande INNER JOIN lignecommande ON commande.id_com = lignecommande.id_com WHERE commande.id_client = :id_client");
        $stmt->bindParam(':id_client', $client_id);
        $stmt->execute();
        $commandes = $stmt->fetchAll();

        // Affichage des commandes
        echo "<table>";
        echo "<tr><th>ID Commande</th><th>Date</th><th>ID Produit</th><th>Quantité</th></tr>";
        foreach($commandes as $commande) {
        echo "<tr>";
        echo "<td>" . $commande['id_com'] . "</td>";
        echo "<td>" . $commande['date_com'] . "</td>";
        echo "<td>" . $commande['id_produit'] . "</td>";
        echo "<td>" . $commande['qte'] . "</td>";
        echo "</tr>";
        }
        echo "</table>";
        } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        }
        $conn = null;
        ?>
        
        