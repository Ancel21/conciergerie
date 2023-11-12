<html>
  <head>
    <title>Liste de clients</title>
    <link rel="stylesheet"  href = "../css/styleaffichecli.css">
  </head>
  <body>

<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=conciergerie', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT id_com, date_com, status_c, id_client FROM commande";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll();

    echo "<table>";
    echo "<caption><h1>Liste des commandes</h1><br></caption>";
      
    echo "<tr><th>ID Commande</th><th>Date</th><th>Status</th><th>ID Client</th></tr>";
    foreach ($result as $row) {
        echo "<tr>";
        echo "<td>" . $row['id_com'] . "</td>";
        echo "<td>" . $row['date_com'] . "</td>";
        echo "<td>" . $row['status_c'] . "</td>";
        echo "<td>" . $row['id_client'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    echo "<br> <br> <a href = ''> exporter en pdf</a>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$pdo = null;
?>

</body>
</html>
