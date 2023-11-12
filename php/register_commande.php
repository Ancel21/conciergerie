<?php
 $nom = $_POST['nom'];
 $prenom = $_POST['prenom'];
 if (empty($nom) || empty($prenom) ) {
  echo "Tous les champs doivent être remplis.";
  exit;
}
// Assume that $pdo is a PDO object connected to the database

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "conciergerie";

$buy = "to buy";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   

  
  // Get the customer ID from the name and surname
  $stmt = $conn->prepare("SELECT id_client FROM client WHERE nom = :nom AND prenom = :prenom");
  $stmt->bindParam(':nom', $nom);
  $stmt->bindParam(':prenom', $prenom);
  $stmt->execute();
  $customer_id = $stmt->fetchColumn();
  
  if ($customer_id) {
    // Insert a new order with the customer ID
    $stmt = $conn->prepare("INSERT INTO commande (date_com, status_c, id_client) VALUES (CURDATE(), 'to_buy', :id_client)");
    $stmt->bindParam(':id_client', $customer_id);
    $stmt->execute();

    // Get the ID of the new order
    $new_order_id = $conn->lastInsertId();

    echo "New order has been added with ID: " . $new_order_id;
  } else {
    echo "Client inexistant";
  }



}catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}

?>