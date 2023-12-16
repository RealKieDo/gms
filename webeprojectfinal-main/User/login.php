
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="regstyle2.css">
</head>
<body>
<header> 
<img src="../Admin/Taibah fitness logo 3-fotor-bg-remover-2023112445113.png" class="logo">
    <nav> <a href="http://localhost/webeprojectfinal-main/User/index.php">Home </a> 
    </nav>
    </header>
    <section class="carsour">
        <div>    
        </div>
    </nav>
    </header>
    <div class="container">
        <?php
        
    include '../innc/database.php';
    session_start();

        $sql2 = 'SELECT * FROM admin';
        $result2 = mysqli_query($conn,$sql2);
        $adms = mysqli_fetch_all($result2, MYSQLI_ASSOC);

        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
           
        
           if (empty($email) || empty($password)) {
            $_SESSION['message'] = "All fields are required!";
            header('Location: login.php');
            exit(0);
        } 
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['message'] = "Invalid Email Format";
            header('Location: login.php');
            exit(0);
        } 

        require_once "../innc/database.php";  

        $sql = "SELECT * FROM members WHERE Email = '$email'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if ($user) {
            if (password_verify($password, $user["Password"])) {
                session_start();
                $idQuery = "SELECT id,fullname FROM members WHERE Email='$email'";
                $result1 = mysqli_query($conn, $idQuery);
                $r = mysqli_fetch_assoc($result1);
                $_SESSION['UserID'] = $r['id'];
                $_SESSION['UserName'] =$r['fullname'];
                header('Location: http://localhost/webeprojectfinal-main/Services/userServices.php');
                exit(0);
            }
        }

          foreach( $adms as $admin ) {
           if( $admin["email"] === $email AND $admin["password"] === $password ) {
                  header('Location: http://localhost/webeprojectfinal-main/Admin/adminServices.php');
                  exit(0);
    } 
}   
        $_SESSION['message'] = "password or email is not correct";
        header('Location: login.php');
        exit(0);

}          
        ?>
      <form action="login.php" method="post">
        <div class="form-group">
        <?php include('message.php'); ?>
        <label for="InputEmail" class="form-label"><h4>Email: </h4></label>
            <input type="email" placeholder="Enter Email:" name="email"value ="<?php echo $email?>"  class="form-control">
        </div>
        <div class="form-group">
        <label for="InputPassword" class="form-label"><h4>Password:  </h4></label>
            <input type="password" placeholder="Enter Password:" name="password"value ="<?php echo $password?>"  class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn btn-primary">
        </div>
      </form>
     <div><p>Not registered yet <a href="registration.php">Register Here</a></p></div>
    </div>
</body>
</html>