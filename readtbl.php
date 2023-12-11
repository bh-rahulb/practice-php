<?php

$conn = new mysqli($host = "localhost", $user = "root" , $password ="" , $database = "database");

$sql = "SELECT * FROM table1";

$table = $conn->query($sql);

if ($table->num_rows > 0){
    echo "<table border=1 cellpadding=10>";
    echo "<tr>
    <th>id </th>
    <th>name </th>
    <th>mobilenumber </th>
    <th>email </th>
    <th>gender </th>
    <th>dob </th>
    <th>role </th>
    <th>salery </th>
    </tr>
    ";
    while ($row = $table->fetch_assoc() ){

    echo "<tr>";
    echo "<td>" . $row["id"] ."</td>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["mobile_no"] . "</td>";
    echo "<td>" . $row["email"] . "</td>";
    echo "<td>" . $row["gender"].  "</td>";
    echo "<td>" . $row["date_of_birth"].  "</td>";
    echo "<td>" . $row["role"] . "</td>";
    echo "<td>" . $row["salary"].  "</td>";
    }
    echo "</table>";
    
}
$conn->close();


?>



