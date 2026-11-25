<?php
$base = '../';
include '../includes/data_pesawat.php';

// kata pencarian dari form
if (isset($_GET['q'])) {
    $cari = trim($_GET['q']);
} else {
    $cari = '';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Business Jets</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lunasima:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- css -->
        <link href="../assets/css/common.css" rel="stylesheet">
        <link href="../assets/css/catalog.css" rel="stylesheet">
    </head>
    <body class="pageKatalog">
        <div class="topHoverZone" id="topHoverZone"></div>
        <!-- header -->
        <?php include '../includes/header.php'; ?>

        <!-- section topSection -->
        <section class="topSection">
            <div>
                <h1 class="text-center mt-4"><strong>BUSINESS JET CATALOG</strong></h1>
                <p class="text-center">Pesawat business jet yang tersedia pada katalog kami</p>
            </div>
            <div class="btnHolder mb-5">
                <a href="businessJetsCatalog.php" class="btn rounded-2 border active">Business Jets</a>
                <a href="airlinersCatalog.php" class="btn rounded-2 border">Airliners</a>
            </div>
        </section>

        <!-- section pencarian -->
        <section class="searchSection">
            <form action="businessJetsCatalog.php" method="GET" class="searchBox">
                <input type="text" name="q" class="form-control" placeholder="Cari pesawat..." value="<?php echo $cari; ?>">
                <button type="submit" class="btn btnDetail">Search</button>
                <?php if ($cari != '') { ?>
                    <a href="businessJetsCatalog.php" class="btn btnDetail">Reset</a>
                <?php } ?>
            </form>
        </section>

        <!-- section konten -->
        <section>
            <?php $no = 0; ?>
            <?php foreach ($aircrafts as $item) { ?>
                <?php if ($item['category'] == 'business_jet') { ?>
                    <?php $teks = $item['name'] . ' ' . $item['type']; ?>
                    <?php if ($cari == '' || stripos($teks, $cari) !== false) { ?>
                        <?php $no++; ?>
                        <div class="card rounded-0">
                            <div class="row g-4 align-items-center<?php if ($no % 2 == 0) { echo ' flex-md-row-reverse'; } ?>">
                                <div class="col-md-6">
                                    <img src="<?php echo $item['card_img']; ?>" alt="<?php echo $item['name']; ?>" class="aircraftImg">
                                </div>
                                <div class="col-md-6 p-5 cardDesc">
                                    <h3><?php echo $item['name']; ?></h3>
                                    <p><?php echo $item['type']; ?></p>
                                    <p><?php echo $item['short_desc']; ?></p>
                                    <hr class="my-2">
                                    <div class="d-flex justify-content-between">
                                        <span>Capacity</span>
                                        <span><?php echo $item['capacity']; ?></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Range</span>
                                        <span><?php echo $item['range']; ?></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Cruise Speed</span>
                                        <span><?php echo $item['cruise_speed']; ?></span>
                                    </div>
                                    <a href="aircraftPortofolio.php?id=<?php echo $item['id']; ?>" class="btn rounded-0 d-block text-start m-2 btnDetail">View Details</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>

            <?php if ($no == 0) { ?>
                <p class="text-center py-5">Tidak ada pesawat yang cocok dengan "<?php echo $cari; ?>".</p>
            <?php } ?>
        </section>

        <!-- footer -->
        <?php include '../includes/footer.php'; ?>

        <!-- script -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../headerScript.js"></script>
    </body>
</html>