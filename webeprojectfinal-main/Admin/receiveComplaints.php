<?php
       include '../innc/database.php';
       session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registr page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="receiveComplaints.css">
</head>
<body>
    <header>
        <img src="Taibah fitness logo 3-fotor-bg-remover-2023112445113.png" class="logo">
        <nav> <a href="http://localhost/webeprojectfinal-main/Admin/adminServices.php">AdminServices </a>
        </nav>
    </header>
    <div clas="container-fluid">
        <h4 class="mt-4">Users</h4>
        <div class="row">
            <div class="col-md12">
                <?php include('message.php'); ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Users complaints</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>UserID</th>
                                    <th>Complaints</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM complaint";

                                $query_run = mysqli_query($conn, $query);
                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $row) {
                                ?>
                                        <tr>
                                            <td><?= $row['fk_m_id']; ?></td>
                                            <td><?= $row['complaintDetails']; ?></td>
                                            <td>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="6">No Record Found</td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>