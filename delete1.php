<?php 
include('server.php');
$id=$_GET['idth'];
$deletequery= "DELETE FROM candidate WHERE ID=$id";

$query = mysqli_query($db,$deletequery);

if($query)
    ?>
    <script>
        alert("Deleted successfully");
    </script>
    <?php
header('location: appliedjobs.php');

?>