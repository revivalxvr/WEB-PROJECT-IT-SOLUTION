<?php
$conn = mysqli_connect("localhost", "root", "", "it_solution");

if ($conn->connect_error){
    die("Connection failed" . $conn->connect_error);
}