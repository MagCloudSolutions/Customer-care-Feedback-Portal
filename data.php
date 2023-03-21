<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include "connection.php";
    $search = $_POST['search'];
    $select = $_POST['select'];
    $sql = "SELECT * FROM data WHERE $select LIKE '{$search}%'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        echo "<table id='table' class='table  table-light table-bordered table-striped my-4'>";
        echo "<thead class='table-primary'>";
        echo "<tr>";
        echo "<th scope='col'>S_No</th>";
        echo "<th scope='col'>Name</th>";
        echo "<th scope='col'>Phone Number</th>";
        echo "<th scope='col'>Email</th>";
        echo "<th scope='col'>State</th>";
        echo "<th scope='col'>Gender</th>";
        echo "<th scope='col'>Age</th>";
        echo "<th scope='col'>Height</th>";
        echo "<th scope='col'>Weight</th>";
        echo "<th scope='col'>Looking For</th>";
        echo "<th scope='col'>Attended Demo Club</th>";
        echo "<th scope='col'>Expected Date Demo club</th>";
        echo "<th scope='col'>Attended MHF</th>";
        echo "<th scope='col'>Expected Date MHF</th>";
        echo "<th scope='col'>Current Status</th>";
        echo "<th scope='col'>Lead Date</th>";
        echo "<th scope='col'>Comments</th>";
        echo "<th scope='col'></th>";
        echo "</tr>";
        echo "</thead>";
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {

            echo "<tr>";
            echo "<th scope='row'>" . $i + 1 . "</th>";
            echo "<td colspan='1'>" . $row['name'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['state'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['age'] . '</td>';
            echo "<td>" . $row['height'] . '</td>';
            echo "<td>" . $row['weight'] . '</td>';
            echo "<td>" . $row['looking_for'] . '</td>';
            echo "<td>" . $row['attended_dc'] . '</td>';
            echo "<td>" . $row['exp_date_dc'] . '</td>';
            echo "<td>" . $row['attended_mhf'] . '</td>';
            echo "<td>" . $row['exp_date_mhf'] . '</td>';
            echo "<td>" . $row['current_status'] . '</td>';
            echo "<td>" . $row['lead_date'] . '</td>';
            echo "<td>" . $row['comments'] . '</td>';
            echo "<td>";
            echo '<div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Select
                </button>
                <ul class="dropdown-menu">
                  <li><form action="update.php" method="get"><input style="display:none" name="s_no" value=' . $row["s_no"] . '><button class="dropdown-item" type="submit" >Update</button></form></li>
                  <li><form action="delete.php" method="get"><input style="display:none" name="s_no" value=' . $row["s_no"] . '><button class="dropdown-item" type="submit" >Delete</button></form></li>
                  
                </ul>
              </div>';
            echo "</td>";
            $i++;

        }
    } else {
        echo "<script>alert('Data Not found')</script>";
    }
}








?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="homestyle.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data.php">Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Logout.php">Logout</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <div class="search">
        <form class="search" action="data.php" method="post">
            <input type="text" name="search" style="margin: 10px;padding:10px;border-radius:10px" required>
            <select name="select" class="form-select" aria-label="Default select example"
                style="margin: 10px;padding:10px;">

                <option value="looking_for">Looking For</option>
                <option value="attended_dc">Attended Demo Club</option>
                <option value="attended_mhf">Attended Mission Healthy Family</option>
            </select>
            <button type="submit" class="btn btn-danger" style="margin: 10px;padding:10px;">Search</button>
        </form>
    </div>

    <div class="container1">
        <?php include "connection.php";

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            $data = "SELECT * from data";

            $result_data = mysqli_query($conn, $data);
            $num = mysqli_num_rows($result_data);
            if ($num > 0) {
                echo "<table id='table' class='table  table-light table-bordered table-striped my-4'>";
                echo "<thead class='table-primary'>";
                echo "<tr>";
                echo "<th scope='col'>S_No</th>";
                echo "<th scope='col'>Name</th>";
                echo "<th scope='col'>Phone Number</th>";
                echo "<th scope='col'>Email</th>";
                echo "<th scope='col'>State</th>";
                echo "<th scope='col'>Gender</th>";
                echo "<th scope='col'>Age</th>";
                echo "<th scope='col'>Height</th>";
                echo "<th scope='col'>Weight</th>";
                echo "<th scope='col'>Looking For</th>";
                echo "<th scope='col'>Attended Demo Club</th>";
                echo "<th scope='col'>Expected Date Demo club</th>";
                echo "<th scope='col'>Attended MHF</th>";
                echo "<th scope='col'>Expected Date MHF</th>";
                echo "<th scope='col'>Current Status</th>";
                echo "<th scope='col'>Lead Date</th>";
                echo "<th scope='col'>Comments</th>";
                echo "<th scope='col'></th>";
                echo "</tr>";
                echo "</thead>";
                $i = 0;
                while ($row = mysqli_fetch_assoc($result_data)) {

                    echo "<tr>";
                    echo "<th scope='row'>" . $i + 1 . "</th>";
                    echo "<td colspan='1'>" . $row['name'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['state'] . "</td>";
                    echo "<td>" . $row['gender'] . "</td>";
                    echo "<td>" . $row['age'] . '</td>';
                    echo "<td>" . $row['height'] . '</td>';
                    echo "<td>" . $row['weight'] . '</td>';
                    echo "<td>" . $row['looking_for'] . '</td>';
                    echo "<td>" . $row['attended_dc'] . '</td>';
                    echo "<td>" . $row['exp_date_dc'] . '</td>';
                    echo "<td>" . $row['attended_mhf'] . '</td>';
                    echo "<td>" . $row['exp_date_mhf'] . '</td>';
                    echo "<td>" . $row['current_status'] . '</td>';
                    echo "<td>" . $row['lead_date'] . '</td>';
                    echo "<td>" . $row['comments'] . '</td>';
                    echo "<td>";
                    echo '<div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Select
                </button>
                <ul class="dropdown-menu">
                  <li><form action="update.php" method="get"><input style="display:none" name="s_no" value=' . $row["s_no"] . '><button class="dropdown-item" type="submit" >Update</button></form></li>
                  <li><form action="delete.php" method="get"><input style="display:none" name="s_no" value=' . $row["s_no"] . '><button class="dropdown-item" type="submit" >Delete</button></form></li>
                  
                </ul>
              </div>';
                    echo "</td>";
                    $i++;

                }
                echo "</table>";
            } else {
                echo "No Data Found";
            }
        } ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
    <script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="index.js"></script>
</body>

</html>