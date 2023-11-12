<?php
$id_com = $_POST['id_com'];
$nom_produit = $_POST['nom_produit'];
$qte = $_POST['qte'];

// Connexion à la base de données
$db = new PDO('mysql:host=localhost;dbname=conciergerie', 'root', '');

// Récupération de l'ID du produit à partir du nom
$stmt = $db->prepare("SELECT id_produit FROM produit WHERE nom = ?");
$stmt->execute([$nom_produit]);
$id_produit = $stmt->fetchColumn();

// Ajout de la nouvelle ligne de commande
$stmt = $db->prepare("INSERT INTO lignecommande (id_com, id_produit, qte) VALUES (?, ?, ?)");
if($stmt->execute([$id_com, $id_produit, $qte]))
{
    echo "article ajouté avec succès";
} else {
    echo "Erreur lors de l'inscription : " . $stmt->error;
    }
$db = null;
?>
