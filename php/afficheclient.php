<html>
  <head>
    <title>Liste de clients</title>
    <link rel="stylesheet"  href = "../css/styleaffichecli.css">
  </head>
  <body>
    <table>
    <caption><h1>Liste des clients</h1><br></caption>
      <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Age</th>
        <th>Téléphone</th>
        <th>Facebook</th>
        <th>Instagram</th>
      </tr>
      <?php
        try {
            //Connexion à la base de données
            $conn = new PDO("mysql:host=localhost;dbname=conciergerie", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Requête pour récupérer les informations des clients
            $stmt = $conn->prepare("SELECT nom, prenom, mail, age, tel, facebook, insta FROM client");
            $stmt->execute();
            $client = $stmt->fetchAll();

            //Affichage des informations des clients dans un tableau
            foreach($client as $client) {
                echo "<tr>";
                echo "<td><a href ='ficheclientnom.php'>" . $client['nom'] . "</a></td>";
                echo "<td>" . $client['prenom'] . "</td>";
                echo "<td>" . $client['mail'] . "</td>";
                echo "<td>" . $client['age'] . "</td>";
                echo "<td>" . $client['tel'] . "</td>";
                echo "<td>" . $client['facebook'] . "</td>";
                echo "<td>" . $client['insta'] . "</td>";
                echo "</tr>";
            }
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
        ?>
        </table>
      </body>
    </html>
    

