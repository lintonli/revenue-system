<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>REVENUE COLLECTION SYSTEM</title>
    <link rel="stylesheet" href="scss/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <style>
        html,
        body {
            height: 100%
        }
    </style>
</head>

<body>

    <div class="container h-100 d-flex align-items-center justify-content-center">
        <div class="row shadow-lg  w-40 p-3 mb-5 bg-white align-items-center justify-content-center   rounded">
            <div class=" panel-heading">
                <div class="panel-title text-center font-weight-bold text-capitalize">USHURU PAY  LOGIN</div>
            </div>
            <?php
            if(isset($_GET['err'])){
            ?> <div class="alert alert-danger" role="alert">
               <?php echo $_GET['err']; ?>
              </div>';
          <?php  } ?>

            <?php if(isset($_GET['info'])){ ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_GET['info']; ?>
            </div>
            <?php } ?>
            <form class="form" action="backend/auth.php" method="POST" role="form">
                <fieldset>
                    <div class="mb-3">
                        <input for="exampleFormControlInput1" type="text" class="form-control w-35" name="username"
                            value="" placeholder="Enter Username" required>
                    </div>
                    <div class="mb-3">
                        <input for="exampleFormControlInput1" type="password" class="form-control" name="password"
                            placeholder="Enter Password" required>
                    </div>
                    <div class="form-group">
                        <button id="btn-login" type="submit" name='login' class="btn btn-success form-control font-weight-bold">Login
                        </button>
                    </div>
                   
                </fieldset>
            </form>
        </div>
    </div>


</body>

</html>]