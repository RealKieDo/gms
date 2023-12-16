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
    
    if (isset($_POST['add_user'])) {
        $fullname = ($_POST['fullname']);
        $email = ($_POST['email']);
        $password = ($_POST['password']);

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        
        if (empty($fullname) || empty($email) || empty($password)) {
            $_SESSION['message'] = "All fields are required!";
            header('Location: addmemeber.php');
            exit(0);
        } 
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['message'] = "Invalid Email Format";
            header('Location: addmemeber.php');
            exit(0);
        } 
        if (strlen($password)<8 OR strlen($password)> 16) {
            $_SESSION['message'] = "Password must be between 8 and 16";
            header('Location: addmemeber.php');
            exit(0);
        } 
        if (isExisit($email)) {
            $_SESSION['message'] = "Email already exisit";
            header('Location: addmemeber.php');
            exit(0);
        }
          
        
        require_once "../innc/database.php";           
                $sql = "INSERT INTO members (fullname, Email, Password) VALUES ( ?, ?, ? )";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt,"sss",$fullname, $email, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    $_SESSION['message'] = "successfully added";
                    header('Location: addmemeber.php');
                    exit(0);
                }else{
                    $_SESSION['message'] = "add failed";
                    header('Location: addmemeber.php');
                }
               }
    

if (isset($_POST['user_delete'])) {
    $user_id = $_POST['user_delete'];

    $query1 = "DELETE FROM classes WHERE fk_m_id='$user_id' ";   
    $query2= "DELETE FROM package WHERE fk_m_id='$user_id' ";   
    $query3= "DELETE FROM complaint WHERE fk_m_id='$user_id' ";   

    $query4 = "DELETE FROM members WHERE id='$user_id' ";   

    mysqli_query($conn, $query1);
    mysqli_query($conn, $query2);
    mysqli_query($conn, $query3);

    $query_run = mysqli_query($conn, $query4);
    if ($query_run) {
        $_SESSION['message'] = "User Deleted Successfully";
        header('Location: deletemember.php');
        exit(0);

    } else {
        $_SESSION['message'] = "Something Went Wrong!";
        header('Location: deletemember.php');
        exit(0);
    }
}
