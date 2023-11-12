<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=conciergerie", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nom = $_POST['nom'];
    $prix_unitaire = $_POST['prix_unitaire'];
    $code_barre = $_POST['code_barre'];
    

    
    $sql = "INSERT INTO produit (nom, prix_unitaire, code_barre) VALUES (:nom, :prix_unitaire, :code_barre)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':nom', $nom);
    $stmt->bindValue(':prix_unitaire', $prix_unitaire);
    $stmt->bindValue(':code_barre', $code_barre);
    $stmt->execute();

    echo "New product created successfully";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$pdo = null;
?>
