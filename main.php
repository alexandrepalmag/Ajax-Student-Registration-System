<?php

if(isset($_GET['search-name'])) {
    //database connection
    $server = 'localhost';
    $usuario = 'manager';
    $password = 'manager123456';
    $database = 'students';

$conn = new mysqli($server, $usuario, $password, $database) or die("connection error!");


//search in database
$name = $_GET['search-name'];

if(empty($name)) {
    $searchQuery = "SELECT * FROM student_data";
} else {
    $searchQuery = "SELECT * FROM student_data WHERE name LIKE '%$name%'";
}

$sql = $conn->query($searchQuery);

$rowCount = $sql->num_rows;

sleep(1.5);

if($rowCount > 0) {

//view

echo"
    <h3 class='display-8'>Results</h3>
    <hr>
   <table class='table table-bordered table-hover'>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Phone Number</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>"; 
while($row = $sql->fetch_array()){
        echo '<tr>';
            echo '<td>'.$row['id'].'</td>';
            echo '<td>'.$row['name'].'</td>';
            echo '<td>'.$row['email'].'</td>';
            echo '<td>'.$row['phone_contact'].'</td>';
            echo '<td>'.$row['address'].'</td>';
        echo '</tr>';
    }

    echo '</tbody>
    </table>';
} else { //end of if($rowCount)
    echo "
    <h4 class='display-8'>No record found!</h4>
    ";
}

}