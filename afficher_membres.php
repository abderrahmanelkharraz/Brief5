<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Afficher Annonce</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
    }

    .navbar {
      overflow: hidden;
      background-color: #4CAF50; 
      position: fixed;
      top: 0;
      width: 100%;
      animation: colorChange 1s infinite alternate; 
    }

    .navbar a {
      float: left;
      display: block;
      color: #ffffff; 
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }
    .navbar a:hover {
      background-color: #ddd;
      color: black;
    }
    @keyframes colorChange {
      from {
        background-color: #ff0000;
      }
      to {
        background-color: #ff6666; 
      }
    }

    .content {
      padding: 60px 16px; 
    }
    table {
      width: 80%;
      margin: auto;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #4CAF50; 
      color: white;
    }

  </style>
</head>
<body>

  <div class="navbar">
    <a href="afficher_equipe.php">Afficher les equipes</a>
    <a href="#">Afficher les membres</a>
  </div>

  <div class="content">
    <h2>La list des Annonce.</h2>
   
    <table>
      <thead>
        <tr>
          <th scope="col">ID_membre</th>
          <th scope="col">nom_membre</th>
          <th scope="col">prenom_membre</th>
          <th scope="col">email</th>
          <th scope="col">telephone</th>
          <th scope="col">role</th>
          <th scope="col">status_membre</th>
          <th scope="col">ID_equipe</th>
        </tr>
      </thead>
      <tbody>
        <?php
            include('connection.php');
            
            $selectSql = "SELECT * FROM membre";
            $result = $conn->query($selectSql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id_membre"] . "</td>";
                    echo "<td>" . $row["nom_membre"] . "</td>";
                    echo "<td>" . $row["prenom_membre"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["telephone"] . "</td>";
                    echo "<td>" . $row["role"] . "</td>";
                    echo "<td>" . $row["status_membre"] . "</td>";
                    echo "<td>" . $row["id_equipe"] . "</td>";
                    echo "<td>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Aucune annonce trouvée</td></tr>";
            }
            

            // Close connection
            $conn->close();
            ?>
      </tbody>
    </table>
  </div>

</body>
</html>
