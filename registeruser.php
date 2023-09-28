<?php include 'header.php'; ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">All Registered User</h1>


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Users</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Full Names</th>
              <th>Phone Number</th>
              <th>ID Number</th>
              <th>DOB</th>
            </tr>
          </thead>
          <tbody>
           <?php
           //get citizens
           $getCitezen = mysqli_query($db, "SELECT * FROM citizens ORDER BY id DESC");
           if(mysqli_num_rows($getCitezen) > 0){
            $count = 1;
            while($row = mysqli_fetch_array($getCitezen)){
              $fullnames = $row['fullnames'];
              $phone = $row['phonenumber'];
              $idnumber = $row['idnumber'];
              $dob = $row['dob'];
              ?>
              <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $fullnames; ?></td>
                <td><?php echo $phone; ?></td>
                <td><?php echo $idnumber; ?></td>
                <td><?php echo $dob; ?></td>
              </tr>
              <?php
              $count++;
            }
            }
           ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
<?php include 'footer.php'; ?>