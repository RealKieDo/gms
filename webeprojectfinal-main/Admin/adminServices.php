<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager interface</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <img src="Taibah fitness logo 3-fotor-bg-remover-2023112445113.png" class="logo">
        <nav>
            <a href="http://localhost/webeprojectfinal-main/User/index.php">Logout<?php 
        ?></a>
        </nav>
    </header>
    <section class="services">
        <div class="container">
            <div class="card">
                <div>
                    <i class="fa-solid fa-user-plus"></i>
                </div>
                <h3>Create Member</h3>
                <p>Register new gym members. </p>   
                <button class="card-button" onclick="location.href='addmemeber.php'">Add Member</button>
            </div>

            <div class="card">
                <div>
                    <i class="fa-solid fa-user-xmark"></i>
                </div>
                <h3>Delete Memeber</h3>
                <p>View/Delete existing gym members.</p>
                <button class="card-button" onclick="location.href='deletemember.php'">Delete Member</button>
            </div>

              <div class="card">
                <div>
                    <i class="fa-solid fa-comments"></i>
            </div>
                <h3>Receive complaints</h3>
                <p>Check out the latest complaints.</p>
                <button class="card-button"onclick="location.href='receiveComplaints.php'">Review Complaints</button>
            </div>
        </div>
    </section>
    <script src="script.js"></script>
</body>

</html>