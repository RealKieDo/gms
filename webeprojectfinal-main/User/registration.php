
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registr page</title>
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
            function isExisit($email) {
        
                $conn = mysqli_connect("localhost","root","root","gms");
                $sql = 'SELECT * FROM members';
                $result = mysqli_query($conn,$sql);
                $customers = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    foreach($customers as $customer) {
                        if($customer['Email'] === $email) {
                            return true;
                        }
                    }
                    return false;
                }

            
            if (isset($_POST['submit'])) {
                $fullname = ($_POST['fullName']);
                $email = ($_POST['email']);
                $password = ($_POST['password']);
                $repeatpassword = ($_POST['passwordRepeat']);
            
              
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                               
                if (empty($fullname) || empty($email) || empty($password) || empty($repeatpassword)) {
                    $_SESSION['message'] = "All fields are required!";
                    header('Location: registration.php');
                    exit(0);
                } 
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $_SESSION['message'] = "Invalid Email Format";
                    header('Location: registration.php');
                    exit(0);
                } 
                if (strlen($password)<8 OR strlen($password)> 16) {
                    $_SESSION['message'] = "Password must be between 8 and 16";
                    header('Location: registration.php');
                    exit(0);
                } 
                if (isExisit($email)) {
                    $_SESSION['message'] = "Email already exisit";
                    header('Location: registration.php');
                    exit(0);
                } 
                if ($password!==$repeatpassword) {
                    $_SESSION['message'] = "password does not match";
                    header('Location: registration.php');
                    exit(0);
                } 
                
                require_once "../innc/database.php";           
                $sql = "INSERT INTO members (fullname, Email, Password) VALUES ( ? , ? , ?)";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt,"sss",$fullname, $email, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    $_SESSION['message'] = "successfully registered";
                    header('Location: registration.php');
                    exit(0);
                }else{
                    $_SESSION['message'] = "Registration failed";
                    header('Location: registration.php');
                }
               }
            
            
        ?>
        <form action="registration.php" method = "post">
            <div class="form-group">    
            <?php include('message.php'); ?>
                <label for="InputFullName" class="form-label"><h4>Full Name: </h4></label>
                <input type="text" class="form-control" name="fullName"id="fullName"value ="<?php echo $fullName?>" placeholder="Full Name:"> <br>
            </div>
            <div class="form-group">
            <label for="InputEmail" class="form-label"><h4>Email: </h4></label>
                <input type="text" class="form-control" name="email"id="email"value ="<?php echo $email?>" placeholder="Email:">
            </div>
            <div class="form-group">
            <label for="inputPassword" class="form-label"><h4>Password: </h4></label>
                <input type="password" class="form-control" name="password"id="password"value ="<?php echo $password?>" placeholder="Password:">
            </div>
            <div class="form-group">
            <label for="InputRepeatPassword" class="form-label"><h4>Repeat password: </h4></label>
                <input type="password" class="form-control" name="passwordRepeat"id="passwordRepeat"value ="<?php echo $passwordRepeat?>" placeholder="Repeat Password:">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary"  name="submit" value="Register" >
            </div>
        </form>
        <div>
        <div><p>Already Registered <a href="login.php">Login Here</a></p></div>
      </div>
    </div>
</body>
</html>