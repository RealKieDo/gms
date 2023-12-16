<?php
include("../innc/database.php");
if (isset($_POST["send"])) {
    session_start();
    $fkID = $_SESSION["UserID"];
    $complaint = $_POST["complaint"];
    $query = "INSERT INTO complaint (fk_m_id,complaintDetails) VALUES('$fkID','$complaint')";
    mysqli_query($conn, $query);
    echo "
<script> alert('Data Insert succsfully); </script>
";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../Admin/style.css">
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
                    <i class="fa-solid fa-circle-exclamation"></i>
                    </div>
                    <h3>File a Complaint</h3>
                    <textarea type="text" name="complaint" id="complaint"></textarea>
                    <button type="submit" name="send" class="card-button">Send</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>