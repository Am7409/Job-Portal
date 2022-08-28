<?php 
include('server.php');
$id=$_GET['idth'];
$deletequery= "DELETE FROM jobs WHERE id=$id";

$query = mysqli_query($db,$deletequery);

if($query)
    ?>
    <script>
        alert("Deleted successfully");
    </script>
    <?php
header('location: index.php');

?>