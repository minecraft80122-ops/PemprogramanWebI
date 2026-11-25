<?php
if (isset($_GET['menu'])) {
    $menu = $_GET['menu'];
} else {
    $menu = 'home';
}

switch ($menu) {
    case 'home':
        $alamat = 'index.php';
        break;
    case 'business':
        $alamat = 'pages/businessJetsCatalog.php';
        break;
    case 'airliner':
        $alamat = 'pages/airlinersCatalog.php';
        break;
    case 'compare':
        $alamat = 'pages/compareSize.php';
        break;
    case 'booking':
        $alamat = 'pages/flightBooking.php';
        break;
    default:
        $alamat = 'index.php';
        break;
}

header('Location: ' . $alamat);
exit;
