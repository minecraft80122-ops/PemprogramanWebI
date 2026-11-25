<?php
$base = '';
include 'includes/data_pesawat.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Aether Portal</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lunasima:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- css split -->
        <link href="assets/css/common.css" rel="stylesheet">
        <link href="assets/css/homepage.css" rel="stylesheet">
    </head>
    <body class="pageIndex">
        <div class="topHoverZone" id="topHoverZone"></div>
        <!-- header -->
        <?php include 'includes/header.php'; ?>

        <!-- section posterSection -->
        <section class="posterSection">
            <div class="posterContainer">
                <img src="pages/frontPagePoster.jpg" alt="Source:https://pixabay.com/photos/aircraft-pilatus-pc-24-corporate-jet-5611528/" class="poster">
                <div class="posterText">
                    <h2 class="posterTitle">FLY ON YOUR OWN TERMS</h2>
                    <hr class="hrAtas">
                    <p>Browse business jets and airliners, buy an aircraft or book a flight, and find the right plane for every route.</p>
                </div>
            </div>
        </section>

        <!-- section jetsPromo -->
        <section class="jetsPromo">
            <div class="container">
                <h1 class="text-center">Popular Jets</h1>
                <p class="text-muted text-center">Tiga business jet yang paling sering dipilih</p>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card">
                            <img src="finalImages/Pesawat1.jpg" alt="Aether Light" class="cardImg">
                            <h3>Aether Light</h3>
                            <div class="cardDesc">
                                <p>Light jet</p>
                                <hr class="hrKecil">
                                <div class="d-flex justify-content-between">
                                    <span>Capacity</span>
                                    <span>7 pass</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>Range</span>
                                    <span>3k km</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>Cruise Speed</span>
                                    <span>700 km/h</span>
                                </div>
                                <a href="pages/aircraftPortofolio.php?id=jet-1" class="btn rounded-0 d-block text-start m-2 btnDetail">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="finalImages/Pesawat2.jpg" alt="Aether Mid" class="cardImg">
                            <h3>Aether Mid</h3>
                            <div class="cardDesc">
                                <p>Midsize jet</p>
                                <hr class="hrKecil">
                                <div class="d-flex justify-content-between">
                                    <span>Capacity</span>
                                    <span>8 pass</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>Range</span>
                                    <span>4.5k km</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>Cruise Speed</span>
                                    <span>820 km/h</span>
                                </div>
                                <a href="pages/aircraftPortofolio.php?id=jet-2" class="btn rounded-0 d-block text-start m-2 btnDetail">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="finalImages/Pesawat3.jpg" alt="Aether Heavy" class="cardImg">
                            <h3>Aether Heavy</h3>
                            <div class="cardDesc">
                                <p>Heavy jet</p>
                                <hr class="hrKecil">
                                <div class="d-flex justify-content-between">
                                    <span>Capacity</span>
                                    <span>14 pass</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>Range</span>
                                    <span>8k km</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>Cruise Speed</span>
                                    <span>900 km/h</span>
                                </div>
                                <a href="pages/aircraftPortofolio.php?id=jet-3" class="btn rounded-0 d-block text-start m-2 btnDetail">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-muted mt-5 mb-5 text-center">Pilih jet sesuai kebutuhan perjalanan Anda</p>
            </div>
        </section>

        <!-- section map -->
        <section class="map">
            <img src="pages/TheMap.png" alt="map" class="poster">
            <svg class="mapRoute" viewBox="0 0 1080 625">
                <g id="routeGroup" class="d-none">
                    <line id="routeLine" class="routeLine" x1="0" y1="0" x2="0" y2="0"></line>
                    <circle id="dotAsal" class="routeDot" cx="0" cy="0" r="8"></circle>
                    <circle id="dotTujuan" class="routeDot" cx="0" cy="0" r="8"></circle>
                </g>
            </svg>
            <div class="mapText">
                <h1>DESTINATIONS</h1>
                <p>Pilih kota asal dan tujuan untuk melihat jarak</p>
            </div>
            <div class="mapPannel" id="mapPannel">
                <div class="panelHead">
                    <h5 class="headingFont mb-0">ROUTE PLANNER</h5>
                    <button type="button" id="togglePanelBtn" class="btn btn-sm rounded-0 btnDetail">Hide</button>
                </div>
                <div id="panelBody">
                <label for="originSelect" class="form-label">Origin</label>
                <select id="originSelect" class="form-select mb-3">
                    <option value="" selected disabled>Choose origin</option>
                    <option value="mondstadt">Mondstadt</option>
                    <option value="liyue">Liyue</option>
                    <option value="inazuma">Inazuma</option>
                    <option value="sumeru">Sumeru</option>
                    <option value="fontaine">Fontaine</option>
                    <option value="natlan">Natlan</option>
                    <option value="nod-krai">Nod-Krai</option>
                    <option value="snezhnaya">Snezhnaya</option>
                </select>
                <label for="destinationSelect" class="form-label">Destination</label>
                <select id="destinationSelect" class="form-select">
                    <option value="" selected disabled>Choose Destination</option>
                    <option value="mondstadt">Mondstadt</option>
                    <option value="liyue">Liyue</option>
                    <option value="inazuma">Inazuma</option>
                    <option value="sumeru">Sumeru</option>
                    <option value="fontaine">Fontaine</option>
                    <option value="natlan">Natlan</option>
                    <option value="nod-krai">Nod-Krai</option>
                    <option value="snezhnaya">Snezhnaya</option>
                </select>
                <div class="routeInfo mt-3">
                    <p id="distanceText">Distance: -</p>
                    <p id="recommendText">Pilih origin dan destination dulu</p>
                    <a id="recommendLink" href="#" class="btn rounded-0 btnDetail w-100 d-none">View aircraft</a>
                </div>

                <!-- data pesawat dari PHP (dipakai mapScript.js) -->
                <div id="dataPesawat" class="d-none">
                    <?php foreach ($aircrafts as $item) { ?>
                        <?php if ($item['category'] == 'business_jet') { ?>
                            <span data-id="<?php echo $item['id']; ?>" data-name="<?php echo $item['name']; ?>" data-type="<?php echo $item['type']; ?>" data-range="<?php echo $item['range_km']; ?>"></span>
                        <?php } ?>
                    <?php } ?>
                </div>
                </div>
            </div>
        </section>

        <!-- section aboutmePage -->
        <section class="aboutmePage">
            <h1 class="text-center mb-4">ABOUT ME</h1>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card">
                        <img src="pages/ProfilePicture.jpg" alt="portrait placeholder" class="cardImg">
                        <h3>CHRISTIAN GUNAWAN KUSNANDAR</h3>
                        <div class="cardDesc">
                            <p>NIM: 412025036</p>
                            <hr class="hrKecil">
                            <div class="d-flex justify-content-between">
                                <span>Fakultas</span>
                                <span>FTC</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>Prodi</span>
                                <span>Informatika</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>Angkatan</span>
                                <span>2025</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card p-4 cardKosong">
                        <h2>Mahasiswa Program Studi Informatika • NIM 412025036</h2>
                        <p style="white-space :pre-line;">Pengembang website Aether Portal, platform informasi dan layanan pesawat bisnis serta airliner yang dirancang untuk memudahkan pengguna dalam mencari, membandingkan, dan memesan pesawat.
                            
                            Institusi	Universitas Kristen Krida Wacana (UKRIDA)
                            Fakultas	Fakultas Teknologi Cerdas
                            Mata Kuliah	Pemrograman Web 1</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- footer -->
        <?php include 'includes/footer.php'; ?>

        <!-- script -->
        <script src="assets/mapScript.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="headerScript.js"></script>
    </body>
</html>
