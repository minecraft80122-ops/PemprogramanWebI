<?php
// data pesawat
include '../includes/data_pesawat.php';

// ambil kode dari tombol yang ditekan
if (isset($_GET['id'])) {
    $kode = $_GET['id'];
} else {
    $kode = 'jet-1';
}

// switch: 1 case = 1 tombol, isinya alamat file untuk href
switch ($kode) {
    case 'jet-1':
        $idPesawat = 'jet-1';
        $linkBeli = 'purchaseAircraft.php?id=jet-1';
        $linkSewa = 'loanAircraft.php?id=jet-1';
        break;
    case 'jet-2':
        $idPesawat = 'jet-2';
        $linkBeli = 'purchaseAircraft.php?id=jet-2';
        $linkSewa = 'loanAircraft.php?id=jet-2';
        break;
    case 'jet-3':
        $idPesawat = 'jet-3';
        $linkBeli = 'purchaseAircraft.php?id=jet-3';
        $linkSewa = 'loanAircraft.php?id=jet-3';
        break;
    case 'boeing-737':
        $idPesawat = 'boeing-737';
        $linkBeli = 'purchaseAircraft.php?id=boeing-737';
        $linkSewa = 'loanAircraft.php?id=boeing-737';
        break;
    case 'airbus-a320':
        $idPesawat = 'airbus-a320';
        $linkBeli = 'purchaseAircraft.php?id=airbus-a320';
        $linkSewa = 'loanAircraft.php?id=airbus-a320';
        break;
    case 'cirrus-vision':
        $idPesawat = 'cirrus-vision';
        $linkBeli = 'purchaseAircraft.php?id=cirrus-vision';
        $linkSewa = 'loanAircraft.php?id=cirrus-vision';
        break;
    case 'eclipse-550':
        $idPesawat = 'eclipse-550';
        $linkBeli = 'purchaseAircraft.php?id=eclipse-550';
        $linkSewa = 'loanAircraft.php?id=eclipse-550';
        break;
    case 'hondajet':
        $idPesawat = 'hondajet';
        $linkBeli = 'purchaseAircraft.php?id=hondajet';
        $linkSewa = 'loanAircraft.php?id=hondajet';
        break;
    case 'falcon-8x':
        $idPesawat = 'falcon-8x';
        $linkBeli = 'purchaseAircraft.php?id=falcon-8x';
        $linkSewa = 'loanAircraft.php?id=falcon-8x';
        break;
    case 'boeing-747':
        $idPesawat = 'boeing-747';
        $linkBeli = 'purchaseAircraft.php?id=boeing-747';
        $linkSewa = 'loanAircraft.php?id=boeing-747';
        break;
    case 'airbus-a380':
        $idPesawat = 'airbus-a380';
        $linkBeli = 'purchaseAircraft.php?id=airbus-a380';
        $linkSewa = 'loanAircraft.php?id=airbus-a380';
        break;
    default:
        $idPesawat = 'jet-1';
        $linkBeli = 'purchaseAircraft.php?id=jet-1';
        $linkSewa = 'loanAircraft.php?id=jet-1';
        break;
}

// ambil data pesawat sesuai case
$plane = $aircrafts[$idPesawat];

if (isset($plane['detail_img'])) {
    $imgSrc = $plane['detail_img'];
} else {
    $imgSrc = '../finalImages/Pesawat1.jpg';
}

if (isset($plane['short_desc'])) {
    $shortDesc = $plane['short_desc'];
} else {
    $shortDesc = '';
}

if (isset($plane['extra_info'])) {
    $extraInfo = $plane['extra_info'];
} else {
    $extraInfo = '';
}
?>
<!-- section judul pesawat -->
<h1 class="ms-5 mt-4 mb-1"><?php echo $plane['name']; ?></h1>
<p class="ms-5 text-muted mb-4"><?php echo $plane['type']; ?></p>

<!-- section gambar pesawat -->
<div class="posterWrap">
    <img src="<?php echo $imgSrc; ?>" alt="<?php echo $plane['name']; ?>" class="poster">
</div>

<div class="detailWrapper">
    <!-- section tombol beli dan sewa (href dari switch) -->
    <div class="row g-3 mb-4">
        <div class="col-md-6">
            <a href="<?php echo $linkBeli; ?>" class="btn rounded-0 d-flex justify-content-between align-items-center btnDetail">
                <span>Buy this aircraft</span>
                <span>&rarr;</span>
            </a>
        </div>
        <div class="col-md-6">
            <a href="<?php echo $linkSewa; ?>" class="btn rounded-0 d-flex justify-content-between align-items-center btnDetail">
                <span>Book this aircraft for a flight</span>
                <span>&rarr;</span>
            </a>
        </div>
    </div>
    <hr class="my-4">

    <!-- section overview + spesifikasi -->
    <div class="row g-5 my-3">
        <div class="col-md-5">
            <h4 class="sectionHeading mb-3">AIRCRAFT OVERVIEW</h4>
            <p class="text-muted"><?php echo $shortDesc; ?></p>
            <p class="text-muted small"><?php echo $extraInfo; ?></p>
        </div>
        <div class="col-md-7">
            <h4 class="sectionHeading mb-3">SPECIFICATIONS</h4>

            <div class="specRow">
                <span class="specLabel">Category</span>
                <span><?php echo $plane['category_label']; ?></span>
            </div>
            <div class="specRow">
                <span class="specLabel">Aircraft type</span>
                <span><?php echo $plane['type']; ?></span>
            </div>

            <?php if (isset($plane['capacity']) && isset($plane['range']) && isset($plane['cruise_speed'])) { ?>
                <div class="specRow">
                    <span class="specLabel">Capacity</span>
                    <span><?php echo $plane['capacity']; ?></span>
                </div>
                <div class="specRow">
                    <span class="specLabel">Range</span>
                    <span><?php echo $plane['range']; ?></span>
                </div>
                <div class="specRow">
                    <span class="specLabel">Cruise speed</span>
                    <span><?php echo $plane['cruise_speed']; ?></span>
                </div>
            <?php } else { ?>
                <div class="specRow">
                    <span class="specLabel">Configuration</span>
                    <span><?php echo $plane['aircraft_type']; ?></span>
                </div>
                <div class="specRow">
                    <span class="specLabel">Role</span>
                    <span><?php echo $plane['role']; ?></span>
                </div>
            <?php } ?>

            <?php if (isset($plane['spec_note'])) { ?>
                <p class="text-muted small mt-3"><?php echo $plane['spec_note']; ?></p>
            <?php } ?>
        </div>
    </div>
    <hr class="my-4">

    <!-- section cabin + konfigurasi -->
    <div class="row g-5 mt-2">
        <div class="col-md-5">
            <h4 class="sectionHeading mb-3">CABIN &amp; CONFIGURATION</h4>
            <p class="text-muted small">
                <?php if (isset($plane['capacity'])) { ?>
                    Cabin untuk <?php echo $plane['name']; ?>: up to <?php echo $plane['capacity']; ?>. Actual seating, cabin zone, etc may vary by aircraft.
                <?php } else { ?>
                    Seating and cabin zones of the <?php echo $plane['name']; ?> depend on the variant and the airline or operator configuration.
                <?php } ?>
            </p>
        </div>
        <div class="col-md-7">
            <h5 class="sectionHeading mb-3">Plan around your requirements</h5>
            <p class="text-muted small">
                For a purchase, discuss your intended operation and preferred cabin. For a flight, share your group size, route and any accessibility or other needs...
            </p>
            <p class="text-muted small mb-0">
                Our team will confirm the specific aircraft configuration and suitability when reviewing your inquiry.
            </p>
        </div>
    </div>
</div>
