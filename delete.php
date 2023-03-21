<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include "connection.php";
    $s_no = $_GET['s_no'];
    $sql = "DELETE from data WHERE s_no = '$s_no'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location:data.php');
    } else {
        echo "<script>
alert('Error')
</script>";
    }
} else {
    echo "<script>
alert('connection Error')
</script>";
}


?>