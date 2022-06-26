<?php
 
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['submit'])) {
		$nama = $_POST['nama'];
		$telpon = $_POST['notlp'];
		$alamat = $_POST['alamat'];
		$perangkat = $_POST['perangkat'];
		$os = $_POST['os'];
		$payment = $_POST['payment'];
		$kerusakan = $_POST['kerusakan'];
		
		// include database connection file
		include_once("../connection.php");
				
		// Insert user data into table
		$result = mysqli_query($conn, "INSERT INTO customers(id,nama,telpon,alamat,perangkat,os,payment,kerusakan) VALUES('','$nama','$telpon','$alamat','$perangkat','$os','$payment','$kerusakan')");
		// Show message when user added
        $sukses = true;
        // header("Refresh:0; url=index.php");
	}
	?>