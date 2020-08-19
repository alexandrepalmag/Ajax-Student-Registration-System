<?php

if(isset($_GET['search-name'])) {
    //datbase connection
    $server = 'localhost';
    $usuario = 'manager';
    $password = 'manager123456';
    $database = 'students';

$conn = new mysqli($server, $usuario, $password, $database) or die("connection error!");


//search in database
$name = $_GET['search-name'];

if(empty($name)) {
    $searchQuery = "SELECT * FROM students";
} else {
    $searchQuery = "SELECT * FROM students WHERE name LIKE '$name\%";
}

$sql = $conn->query($searchQuery);

while($line = $sql->fetch_array()){
    echo $line['id'];
    echo $line['name'];
    echo $line['email'];
    echo $line['phone_contact'];
    echo $line['endereco'];
}

}