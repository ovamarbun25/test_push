<?php
session_start();
error_reporting(0);
include("includes/config.php");
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $ret=mysqli_query($con,"SELECT * FROM admin WHERE UsernameAdmin='$username' and PasswordAdmin='$password'");
    $num=mysqli_fetch_array($ret);
    if($num>0)
    {
        $_SESSION['alogin']=$_POST['username'];
        $_SESSION['id']=$num['IdAdmin'];
        header("location:admin/template.php");
        exit();
    }
    else
    {
        $ret2=mysqli_query($con,"SELECT * FROm penyelenggara WHERE UsernamePenyelenggara='$username' and PasswordPenyelenggara='$password'");
        $num=mysqli_fetch_array($ret2);
        if($num>0)
        {
            $_SESSION['alogin']=$_POST['username'];
            $_SESSION['id']=$num['IdPenyelenggara'];
            header("location:penyelenggara/template.php");
            exit();
        }
        else
        {
            $_SESSION['errmsg']="Invalid username or password";
            header("location:index.php");
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="admin/images/favicon.ico" type="image/ico" />

    <title>E-Sertifikat </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
<div>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form class="form-vertical" method="post">
                    <h1>Login Form</h1>
                    <span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
                    <div>
                        <input type="text" name="username" class="form-control" placeholder="Username" required="" />
                    </div>
                    <div>
                        <input type="password" name="password" class="form-control" placeholder="Password" required="" />
                    </div>
                    <button type="submit" class="btn btn-primary btn" name="submit">Login</button>

                </form>
            </section>
        </div>

    </div>
</div>
</body>
</html>
