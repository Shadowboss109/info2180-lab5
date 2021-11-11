<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';



$country= $_GET['country'];
$context= $_GET['context'];

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%';");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Cities for a specific country
$cities = $conn->query("SELECT cities.id, cities.name,cities.country_code, cities.district, cities.population FROM  countries JOIN cities ON cities.country_code=countries.code WHERE countries.name = '$country';");
$city = $cities->fetchAll(PDO::FETCH_ASSOC);


?>

<?php if(isset($context)):?>
  <table class="t1">
   <tr>
    <th class="look" >Name</th>
    <th class="look">District</th>
    <th class="look">Population</th>

  </tr> 
  </table> 
  <?php foreach ($city as $row): ?>
  <table class="t2">

 
  <tr>
    <td class="c"><?=$row['name']; ?></td>
    <td class="c"><?=$row['district']; ?></td>
    <td class="c"><?=$row['population']; ?></td>
  
  </tr> 
</table> 
<?php endforeach; ?>

  <?php else:?>
<table class="t3">
   <tr>
    <th class="look1" >Name</th>
    <th class="look1">Continent</th>
    <th class="look1">Independence</th>
    <th class="look1"> Head of State</th>
  </tr> 
  </table> 
 
<?php foreach ($results as $row): ?>
  <table class="t4">

 
  <tr>
    <td class="s"><?=$row['name']; ?></td>
    <td class="s"><?=$row['continent']; ?></td>
    <td class="s"><?=$row['independence_year']; ?></td>
    <td class="s"><?=$row['head_of_state']; ?></td>
    

  </tr> 
</table> 
<?php endforeach; ?>
<?php endif;?>
