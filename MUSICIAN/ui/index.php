<?php session_start(); /* Starts the session */
/* Check Login form submitted */
if(isset($_POST['Submit'])){
/* Define username and associated password array */
$logins = array('Alex' => '123456','admin' => 'admin','123' => '123');

/* Check and assign submitted Username and Password to new variable */
$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
$Password = isset($_POST['Password']) ? $_POST['Password'] : '';

/* Check Username and Password existence in defined array */
if (isset($logins[$Username]) && $logins[$Username] == $Password){
/* Success: Set session variables and redirect to Protected page  */
$_SESSION['UserData']['Username']=$logins[$Username];
header("location:dashboard.php");
exit;
} else {
/*Unsuccessful attempt: Set error message */
$msg="<span style='color:red'>Invalid Login Details</span>";
}
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-8">
                            <h1>Please Login First</h1>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <section class="content">

                <div class="row">
                    <!-- left column -->
                    <div class="col-md-8">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Album Management System</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->




                            <form role="form" action="" method="post" name="Login_Form">
                                <table width="400" border="0" align="center" cellpadding="5" cellspacing="1"
                                    class="Table">
                                    <?php if(isset($msg)){?>
                                    <tr>
                                        <td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
                                    </tr>
                                    <?php } ?>
                                </table>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input name="Username" type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input name="Password" type="password" class="form-control"
                                            id="exampleInputPassword1" placeholder="Password">
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button name="Submit" type="submit" value="Login" class="btn btn-info">Log
                                        in</button>
                                    <button type="Submit" class="btn btn-default float-right">Cancel</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>