<?php include 'header.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Check System Payment</h1>


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Payment Confirmation</h6>
    </div>
    <div class="card-body">
      <form action="" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Enter Stall Number</label>
          <input type="text" class="form-control" name="transid" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Stall NO">
        </div>
        <button type="submit" name="check" class="btn btn-primary">Check</button>
      </form>
      <br>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Phone</th>
              <th>Amount</th>
              <th>Stall Number</th>
              <th>Transaction ID</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
            //get citizens
            if (isset($_POST['check'])) {
              $transid = $_POST['transid'];
              $getCitezen = mysqli_query($db, "SELECT * FROM  payments WHERE account_reference = '$transid' ORDER BY ID DESC");
              if (mysqli_num_rows($getCitezen) > 0) {
                $count = 1;
                while ($row = mysqli_fetch_array($getCitezen)) {
                  $phone = $row['phone'];
                  $amount = $row['amount'];
                  $sn = $row['account_reference'];
                  $ref = $row['TransactionID'];
                  $status = $row['status'];
            ?>
                  <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $phone; ?></td>
                    <td><?php echo $amount; ?></td>
                    <td><?php echo $sn; ?></td>
                    <td><?php echo $ref; ?></td>
                    <td><?php
                        if ($status == 'Paid') {
                        ?>
                        <span class="badge badge-success">Paid</span>
                      <?php
                        } else {
                      ?>
                        <span class="badge badge-danger">Not Paid</span>
                      <?php } ?>
                    </td>
                  </tr>
            <?php
                  $count++;
                }
              } else {
                echo "<script>alert('The Stall No does not exit')</script>";
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>