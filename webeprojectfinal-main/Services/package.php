<?php
include("../innc/database.php");
if (isset($_POST["submit"])) {
    session_start();
    $fkID = $_SESSION["UserID"];
    $package = $_POST["package"];
    $query = "INSERT INTO package(fk_m_id,packageType) VALUES('$fkID','$package')";
    $query2 = "UPDATE members SET package='$package' WHERE id='$fkID'";
    mysqli_query($conn, $query);
    mysqli_query($conn, $query2);
    echo "
    <script>alert('package insert Succesfully');</script>
    ";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../Admin/style.css">
    <link rel="stylesheet" href="class.css">
</head>
<body>
    <header>
        <img src="../Admin/Taibah fitness logo 3-fotor-bg-remover-2023112445113.png" class="logo">
        <nav>
            <a href="http://localhost/webeprojectfinal-main/Services/userServices.php">UserServices</a>
        </nav>
    </header>
    <Section class="services">
        <div class="container">
            <div class="card">
                <form action="" method="post">
                    <div>
                        <i class="fa-solid fa-box-archive"></i>
                    </div>
                    <h3>Subscribe in a Package</h3>
                    <select name="package" class="form-control" required>
                        <option value="" hidden selected>--Select Package--</option>
                        <option value="basic">Basic</option>
                        <option value="pro">Pro</option>
                        <option value="ultra">Ultra</option>
                    </select>
                    <button type="submit" name="submit" class="card-button">Book</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>