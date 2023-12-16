<?php 
session_start();
include '../innc/database.php';
$User_id = $_SESSION['UserID'];
$sql = "SELECT * FROM classes WHERE fk_m_id='$User_id'";
$sql2 = "SELECT * FROM package WHERE fk_m_id='$User_id'";

$result = mysqli_query($conn,$sql);
$classes = mysqli_fetch_all($result, MYSQLI_ASSOC);

$result2 = mysqli_query($conn,$sql2);
$packages = mysqli_fetch_all($result2, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="userProfile2.css">
    <title>Document</title>
</head>
<body>
<header> 
<img src="../Admin/Taibah fitness logo 3-fotor-bg-remover-2023112445113.png" class="logo">
<nav>
            <a href=http://localhost/webeprojectfinal-main/Services/userServices.php>UserServices</a>
        </nav>
    </header>
    <section class="carsour">
    <table>
        <tr>
            <th>ClassInfo</th>
            <th>ClassDate</th>
        </tr>
        <?php foreach($classes as $class): ?>
        <tr>
            <td><?php echo $class['classInfo']?></td>
            <td><?php echo $class['classDate']?></td>
        </tr>
        <?php endforeach; ?>
     </table>

        <table>
        <tr>
            <th>Packages</th>
        </tr>
        <?php foreach($packages as $package): ?>
        <tr>
            <td><?php echo $package['packageType']?></td>
        </tr>
        <?php endforeach; ?>
        </table>

        </section>

    <script src="script.js"></script>
</body>

</html>