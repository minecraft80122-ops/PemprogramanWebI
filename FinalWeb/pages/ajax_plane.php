<?php
include '../includes/data_pesawat.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = '';
}

if (isset($aircrafts[$id])) {
    $p = $aircrafts[$id];
    echo "<strong>" . $p['name'] . "</strong><br>";
    echo $p['type'] . "<br>";
    echo "<span class='text-muted small'>" . $p['short_desc'] . "</span>";
} else {
    echo "Aircraft not found.";
}
?>
