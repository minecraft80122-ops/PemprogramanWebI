<?php
$base = '../';
include '../includes/data_pesawat.php';

// ukuran asli (meter): length = panjang, height = tinggi, wingspan = lebar sayap
$sizeElements = [
    'person' => [
        'id' => 'person',
        'label' => 'Person',
        'length' => 0.77,
        'height' => 1.70,
        'wingspan' => 0,
        'kind' => 'person'
    ]
];

foreach ($aircrafts as $key => $item) {
    $sizeElements[$key] = [
        'id' => $item['id'],
        'label' => $item['name'],
        'length' => $item['length_m'],
        'height' => $item['height_m'],
        'wingspan' => $item['wingspan_m'],
        'kind' => 'aircraft'
    ];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Aircraft Size Comparison - Aether Portal</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lunasima:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- css -->
        <link href="../assets/css/common.css" rel="stylesheet">
        <link href="../assets/css/catalog.css" rel="stylesheet">
    </head>
    <body>
        <div class="topHoverZone" id="topHoverZone"></div>
        <!-- header -->
        <?php include '../includes/header.php'; ?>

        <!-- section compareSection -->
        <section class="compareSection">
            <div class="row g-4 align-items-start">
                <div class="col-md-3">
                    <div class="spawnPanel">
                        <h4>Spawn Elements</h4>
                        <select id="spawnSelect" class="form-select mb-3">
                            <option value="" selected disabled>Choose Elements</option>
                            <?php foreach ($sizeElements as $el) { ?>
                                <option value="<?php echo $el['id']; ?>">
                                    <?php echo $el['label']; ?> (<?php if ($el['kind'] == 'person') { echo number_format($el['height'], 2) . ' m tall'; } else { echo number_format($el['length'], 2) . ' m long'; } ?>)
                                </option>
                            <?php } ?>
                        </select>
                        <p class="text-muted small mb-3">Ini untuk memvisualisasikan ukuran bodi pesawat</p>
                        <button type="button" id="clearSpawnBtn" class="btn btn-sm btn-outline-secondary rounded-2">Clear Stage</button>
                    </div>
                </div>

                <div class="col-md-9">
                    <div id="spawnStage" class="spawnStage"></div>
                    <p id="scaleInfo" class="text-muted small mt-2"></p>
                </div>
            </div>
        </section>

        <!-- footer -->
        <?php include '../includes/footer.php'; ?>

        <!-- script -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../headerScript.js"></script>
        <script>
            var elementCatalog = {
<?php
$first = true;
foreach ($sizeElements as $key => $el) {
    if (!$first) {
        echo ",\n";
    }
    $first = false;
    echo "                '" . $key . "': {\n";
    echo "                    id: '" . $el['id'] . "',\n";
    echo "                    label: '" . $el['label'] . "',\n";
    echo "                    length: " . $el['length'] . ",\n";
    echo "                    height: " . $el['height'] . ",\n";
    echo "                    wingspan: " . $el['wingspan'] . ",\n";
    echo "                    kind: '" . $el['kind'] . "'\n";
    echo "                }";
}
echo "\n";
?>
            };
            var spawnSelect = document.getElementById('spawnSelect');
            var spawnStage = document.getElementById('spawnStage');
            var clearSpawnBtn = document.getElementById('clearSpawnBtn');
            var scaleInfo = document.getElementById('scaleInfo');

            // daftar id elemen yang sedang tampil di panggung
            var onStage = [];

            // bikin 1 elemen (orang / pesawat) dengan skala px per meter
            function createSpawnNode(data, skala, index) {
                var wrapper = document.createElement('div');
                wrapper.className = 'spawnItem';

                // label ukuran asli, klik untuk menghapus
                var tag = document.createElement('div');
                tag.className = 'sizeTag';
                tag.title = 'Klik label untuk menghapus';
                if (data.kind === 'person') {
                    tag.innerHTML = '<div>' + data.label + '</div><div>Height ' + data.height.toFixed(2) + ' m</div>';
                } else {
                    tag.innerHTML = '<div>' + data.label + '</div>' +
                        '<div>Length ' + data.length.toFixed(2) + ' m</div>' +
                        '<div>Height ' + data.height.toFixed(2) + ' m</div>' +
                        '<div>Wingspan ' + data.wingspan.toFixed(2) + ' m</div>';
                }
                tag.addEventListener('click', function () {
                    onStage.splice(index, 1);
                    renderStage();
                });
                wrapper.appendChild(tag);

                var tinggiPx = data.height * skala;

                if (data.kind === 'person') {
                    var person = document.createElement('div');
                    person.className = 'personShape';
                    person.style.height = Math.round(tinggiPx) + 'px';
                    person.style.width = Math.round(tinggiPx * 0.45) + 'px';
                    person.innerHTML =
                        '<div class="personHead"></div>' +
                        '<div class="personTorso"></div>' +
                        '<div class="personLegs"><div class="personLeg"></div><div class="personLeg"></div></div>';
                    wrapper.appendChild(person);
                } else {
                    // siluet pesawat tampak samping: badan + sirip ekor
                    var panjangPx = data.length * skala;
                    var kaki = tinggiPx * 0.08;       // jarak badan ke tanah
                    var tinggiBadan = tinggiPx * 0.30;  // tebal badan
                    var tinggiSirip = tinggiPx - kaki - tinggiBadan / 2;
                    var geserSirip = tinggiSirip * 0.45; // sirip miring ke belakang

                    var plane = document.createElement('div');
                    plane.className = 'planeShape';
                    plane.style.width = panjangPx + 'px';
                    plane.style.height = tinggiPx + 'px';

                    var badan = document.createElement('div');
                    badan.className = 'planeBody';
                    badan.style.height = tinggiBadan + 'px';
                    badan.style.bottom = kaki + 'px';

                    var sirip = document.createElement('div');
                    sirip.className = 'planeTail';
                    sirip.style.height = tinggiSirip + 'px';
                    sirip.style.width = (panjangPx * 0.12) + 'px';
                    sirip.style.bottom = (kaki + tinggiBadan / 2) + 'px';
                    sirip.style.right = geserSirip + 'px';

                    plane.appendChild(sirip);
                    plane.appendChild(badan);
                    wrapper.appendChild(plane);
                }

                return wrapper;
            }

            // gambar ulang semua elemen; skala dihitung supaya semuanya muat
            function renderStage() {
                spawnStage.innerHTML = '';

                if (onStage.length === 0) {
                    scaleInfo.textContent = '';
                    return;
                }

                var gap = 32;
                var padding = 48;
                var totalPanjang = 0;
                var tertinggi = 0;

                for (var i = 0; i < onStage.length; i++) {
                    var d = elementCatalog[onStage[i]];
                    if (d.kind === 'person') {
                        totalPanjang += d.height * 0.45;
                    } else {
                        totalPanjang += d.length;
                    }
                    if (d.height > tertinggi) {
                        tertinggi = d.height;
                    }
                }

                var lebarTersedia = spawnStage.clientWidth - padding - gap * (onStage.length - 1);
                var skala = lebarTersedia / totalPanjang;

                // jangan sampai terlalu tinggi, terlalu besar, atau terlalu kecil
                if (skala > 380 / tertinggi) {
                    skala = 380 / tertinggi;
                }
                if (skala > 60) {
                    skala = 60;
                }
                if (skala < 6) {
                    skala = 6;
                }

                for (var i = 0; i < onStage.length; i++) {
                    spawnStage.appendChild(createSpawnNode(elementCatalog[onStage[i]], skala, i));
                }

                scaleInfo.textContent = 'Skala: 1 m = ' + skala.toFixed(1) + ' px (semua objek memakai skala yang sama, jadi ukurannya sebanding)';
            }

            // Contoh bawaan awal biar panggung nggak kosong pas pertama dibuka
            onStage.push('person');
            if (elementCatalog['jet-1']) {
                onStage.push('jet-1');
            }
            renderStage();

            spawnSelect.addEventListener('change', function () {
                var chosenId = spawnSelect.value;
                if (chosenId && elementCatalog[chosenId]) {
                    onStage.push(chosenId);
                    renderStage();
                    spawnSelect.value = '';
                }
            });

            clearSpawnBtn.addEventListener('click', function () {
                onStage = [];
                renderStage();
            });

            // skala dihitung ulang kalau ukuran jendela berubah
            window.addEventListener('resize', renderStage);
        </script>
    </body>
</html>