<?php $a = "customers";
include "header.php"; 

require "../connection.php";

$result = mysqli_query($conn, "SELECT * FROM customers ORDER BY id DESC");

?>

  <div class="container">
    <div class="row">
        <div class="col-8 m-3">
            <h3>DAFTAR CUSTOMER</h3>
            <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Cari data customer" aria-label="Recipient's username" aria-describedby="button-addon2">
  <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
</div>
            <table class="table table-dark mt-3 table-striped">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">No. tlp</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php  
        $j = 1;
        while($cust_data = mysqli_fetch_array($result)) {
                echo "<tbody>";
                echo  "<tr>";
                echo  "<th>".$j."</th>";
                echo  "<td>".$cust_data['nama']."</td>";
                echo  "<td>".$cust_data['telpon']."</td>";
                echo  "<td><a href='show.php?id=$cust_data[id]'><button type='button' class='btn btn-success btn-sm'>Detail</button></a>
                    <a href='edit.php?id=$cust_data[id]'><button type='button' class='btn btn-warning btn-sm ms-2'>Edit</button></a>
                    <button type='button' class='btn btn-danger btn-sm ms-2'>Delete</button>
                    </td>   
                    </tr>
                </tbody>"; 
                $j++;
                } ?>
            </table>
        </div>
    </div>
  </div>

        <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?php while($cust_data = mysqli_fetch_array($result)) {
      echo "<div class='modal-body'>".$cust_data['nama']."</div>"; } ?> 
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


  <?php include "footer.php"; ?>
