<?php include 'header.php'; ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="backend/generate_report.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Account Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $sql = "SELECT * FROM users";
                                $result = mysqli_query($db, $sql);
                                $count = mysqli_num_rows($result);
                                echo $count;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Registered Users </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $sql = "SELECT * FROM citizens";
                                $result = mysqli_query($db, $sql);
                                $count = mysqli_num_rows($result);
                                echo $count;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                Total Paid Fee</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                //SUM AMOUNT PAID on  payments table
                                $sql = "SELECT SUM(amount) AS total FROM  payments WHERE status='Paid'";
                                $result = mysqli_query($db, $sql);
                            
                                $row = mysqli_fetch_assoc($result);
                                $sum = $row['total'];
                                if($sum == 0){
                                    echo "0";
                                }else{
                                    echo $sum;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                               Total Unpaid Paid</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $sql = "SELECT SUM(amount) AS total FROM  payments WHERE status=''";
                                $result = mysqli_query($db, $sql);
                                $row = mysqli_fetch_assoc($result);
                                $sum = $row['total'];
                                if($sum == 0){
                                    echo "0";
                                }else{
                                    echo $sum;
                                }

                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Content Row -->

   

<!-- /.container-fluid -->

<?php include 'footer.php'; ?>