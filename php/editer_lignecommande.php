<?php
// Connexion à la base de données
$db = new PDO('mysql:host=localhost;dbname=conciergerie', 'root', '');

// Récupération de l'ID de commande donné
$id_com = $_POST['id_com'];

// Requête pour récupérer les informations de produit, la quantité et le prix total de chaque ligne de commande en utilisant des jointures
$query = $db->prepare("SELECT p.nom, p.prix_unitaire, lc.qte, (p.prix_unitaire * lc.qte) as prix_total
FROM lignecommande lc
JOIN produit p ON lc.id_produit = p.id_produit
JOIN commande c ON lc.id_com = c.id_com
WHERE c.id_com = :id_com");
$query->bindParam(':id_com', $id_com);
$query->execute();

// Affichage des résultats
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    echo "<div>Nom du produit : " . $row['nom'] . "</div>";
    echo "<div>Quantité : " . $row['qte'] . "</div>";
    echo "<div>Prix unitaire : " . $row['prix_unitaire'] . "</div>";
    echo "<div>Prix total : " . $row['prix_total'] . "</div>";
}


// Formulaire pour ajouter un nouveau produit à la commande
echo "<br>";
echo "<h2> Détails de la commande</h2>";
echo "<form method='post' action='register_lignecommande.php'>";
echo "<input type='hidden' name='id_com' value='" . $id_com . "'>";
echo "<input type='text' name='nom_produit' placeholder='Nom du produit'>";
echo "<br>";
echo "<input type='number' name='qte' placeholder='quantite'>";
echo "<input type='submit' value='Ajouter'>";
echo "</form>";

echo "<form method='post' action='../paiement.html'>";
echo "<input type='submit' value='Terminer et payer'>";
echo "</form>"
?>
