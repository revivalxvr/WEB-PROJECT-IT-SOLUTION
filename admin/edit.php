<?php
// include database connection file
include "header.php";
 
// Check if form is submitted for user update, then redirect to homepage after update
if( isset($_POST['update']))
{	
	$id = $_POST['id'];
	
    $nama = $_POST['nama'];
    $telpon = $_POST['notlp'];
    $alamat = $_POST['alamat'];
    $perangkat = $_POST['perangkat'];
    $os = $_POST['os'];
    $payment = $_POST['payment'];
    $kerusakan = $_POST['kerusakan'];
		
	// update user data
	$result = mysqli_query($conn, "UPDATE customers SET nama='$nama', telpon='$telpon', alamat='$alamat', perangkat='$perangkat', os='$os', payment='$payment', kerusakan='$kerusakan' WHERE id=$id");
	
	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM customers WHERE id=$id");
 
while($cust_data = mysqli_fetch_array($result))
{
	$nama = $cust_data['nama'];
	$telpon = $cust_data['telpon'];
	$alamat = $cust_data['alamat'];
	$perangkat = $cust_data['perangkat'];
	$os = $cust_data['os'];
	$payment = $cust_data['payment'];
	$kerusakan = $cust_data['kerusakan'];
}
?>
	<a href="index.php">Home</a>
	<form name="update_user" method="post" action="">
		<table border="0">
			<tr> 
				<td>Nama: </td>
				<td><input type="text" name="nama" value=<?php echo $nama;?>></td>
			</tr>
			<tr> 
				<td>No.tlp: </td>
				<td><input type="text" name="notlp" value=<?php echo $telpon;?>></td>
			</tr>
			<tr> 
				<td>Alamat: </td>
				<td><input type="text" name="alamat" value=<?php echo $alamat;?>></td>
			</tr>
			<tr> 
				<td>Perangkat: </td>
				<td><input type="text" name="perangkat" value=<?php echo $perangkat;?>></td>
			</tr>
			<tr> 
				<td>Sistem Operasi: </td>
				<td><input type="text" name="os" value=<?php echo $os;?>></td>
			</tr>
			<tr> 
				<td>Payment Method: </td>
				<td><input type="text" name="payment" value=<?php echo $payment;?>></td>
			</tr>
			<tr> 
				<td>Kerusakan</td>
				<td><input type="text" name="kerusakan" value=<?php echo $kerusakan;?>></input>
			</tr>
			<tr>
				<td><input type="hidden" name="id" placeholder=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>

<?php include "footer.php"; ?>