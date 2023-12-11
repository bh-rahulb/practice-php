<style>
    table,th,td{
        border:1px solid;
        border-collapse:collapse;
        padding:5px 10px;
    }
    th{
        text-align:center;
    }
</style>
<?php

$conn = new mysqli("localhost" ,"root","","database");

if($conn->connect_error){
 echo "connection error";
}
$sql= "SELECT * FROM `reg_table`";
$table= $conn->query($sql);

if ($table->num_rows > 0) {
    
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>User Name</th><th>Mobile No</th><th>Password</th><th>Category</th><th>Gender</th><th>Security Question</th><th>Security Answer</th><th>Date of Birth</th></tr>";
    while ($row = $table->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["user_name"] . "</td>";
        echo "<td>" . $row["mobile_no"] . "</td>";
        echo "<td>" . $row["password"] . "</td>";
        echo "<td>" . $row["category"] . "</td>";
        echo "<td>" . $row["gender"] . "</td>";
        echo "<td>" . $row["s_question"] . "</td>";
        echo "<td>" . $row["s_answer"] . "</td>";
        echo "<td>" . $row["date_of_birth"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    $conn->close();
} else {
    echo "No results found.";
    $conn->close();
}

?>