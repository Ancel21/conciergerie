<?php
  // Récupération des données du formulaire
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $adresse = $_POST['adresse'];
  $mail = $_POST['mail'];
  $tel = $_POST['tel'];
  $age = $_POST['age'];
  $facebook = $_POST['facebook'];
  $insta = $_POST['insta'];

  // Validation des données
  if (empty($nom) || empty($prenom) || empty($adresse) || empty($mail) || empty($tel) || empty($age) || empty($facebook) || empty($insta)) {
    echo "Tous les champs doivent être remplis.";
    exit;
  }

  // Validation des données
  if (empty($nom) || empty($prenom) || empty($adresse) || empty($mail) || empty($tel) || empty($age) || empty($facebook) || empty($insta)) {
    echo "Tous les champs doivent être remplis.";
    exit;
  }

  // Vérification de l'unicité de l'adresse email
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "conciergerie";
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT mail FROM client WHERE mail = :mail");
    $stmt->bindParam(':mail', $mail);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result){
      echo "L'adresse email est déjà utilisée.";
      exit;
    }
  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
  }

  // Préparation de la requête d'insertion
  $stmt = $conn->prepare("INSERT INTO client (nom, prenom, adresse, mail, tel, age, facebook, insta) VALUES (:nom, :prenom, :adresse, :mail, :tel, :age, :facebook, :insta)");
  $stmt->bindParam(':nom', $nom);
  $stmt->bindParam(':prenom', $prenom);
  $stmt->bindParam(':adresse', $adresse);
  $stmt->bindParam(':mail', $mail);
  $stmt->bindParam(':tel', $tel);
  $stmt->bindParam(':age', $age);
  $stmt->bindParam(':facebook', $facebook);
  $stmt->bindParam(':insta', $insta);

// Exécution de la requête
  if ($stmt->execute()) {
    echo
"Inscription réussie.";
} else {
echo "Erreur lors de l'inscription : " . $stmt->error;
}
$conn = null;
?>