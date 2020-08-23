<?php

//database connection
$server = 'localhost';
$usuario = 'manager';
$password = 'manager123456';
$database = 'students';

$conn = new mysqli($server, $usuario, $password, $database) or die("connection error!");

if (isset($_GET['search-name'])) {

    //search in database
    $myname = $_GET['search-name'];

    if (empty($myname)) {
        $searchQuery = "SELECT * FROM student_data";
    } else {
        $searchQuery = "SELECT * FROM student_data WHERE nome LIKE '%$myname%'";
    }

    $sql = $conn->query($searchQuery);

    $rowCount = $sql->num_rows;

    sleep(1.5);

    if ($rowCount > 0) {

        //view

        echo "
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
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>";
        while ($row = $sql->fetch_array()) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['nome'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['phone_contact'] . '</td>';
            echo '<td>' . $row['address_inf'] . '</td>';
            echo '<td>' . '<a href="#" type="button" class="btn btn-danger" onclick="deleteStudent(' . $row['id'] . ')"><i class="fas fa-trash-alt"></i></a>'. '</td>';
            echo '</tr>';
        }

        echo '</tbody>
    </table>';
    } else { //end of if($rowCount)
        echo "
    <h4 class='display-8'>No record found!</h4>
    ";
    }
} elseif (

    isset($_GET['name']) and
    isset($_GET['address']) and
    isset($_GET['phone_contact']) and
    isset($_GET['email'])

) {
    $myname = $_GET['name'];
    $myaddress = $_GET['address'];
    $phone_contact = $_GET['phone_contact'];
    $email = $_GET['email'];

    $query = "INSERT INTO student_data(nome, email , phone_contact, address_inf) VALUES ('$myname', '$email', '$phone_contact', '$myaddress')";
    
    sleep(1);

    $sql = $conn->query($query);

   echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>The registration was successful!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
';
    
} elseif(isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $query = "DELETE FROM student_data WHERE ID = $id";
    
    sleep(1);

    $sql = $conn->query($query);

   echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Record deleted with success!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="searchData()">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
';

}


else {
    
    echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>An error occurred while registering the user. Try again!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
';
}