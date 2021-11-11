<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';


$country= $_GET['country'];

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%';");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<table style="width:100%;  border:1px solid black">
   <tr>
    <th style="text-align:center; " >Name</th>
    <th style="text-align:center;">Continent</th>
    <th style="text-align:center; ">Independence</th>
    <th style="text-align:center; "> Head of State</th>
  </tr> 
  </table> 
 
<?php foreach ($results as $row): ?>
  <table style="width:100%;  border:1px solid black">

 
  <tr>
    <td style=width:25%><?=$row['name']; ?></td>
    <td style=width:25%><?=$row['continent']; ?></td>
    <td style=width:25%><?=$row['independence_year']; ?></td>
    <td style=width:25%><?=$row['head_of_state']; ?></td>
    

  </tr> 
</table> 
<?php endforeach; ?>
