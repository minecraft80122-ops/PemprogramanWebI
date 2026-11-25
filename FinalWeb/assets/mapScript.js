document.addEventListener("DOMContentLoaded", function () {
    var originSelect = document.getElementById("originSelect");
    var destinationSelect = document.getElementById("destinationSelect");
    var distanceText = document.getElementById("distanceText");
    var recommendText = document.getElementById("recommendText");
    var recommendLink = document.getElementById("recommendLink");
    var routeGroup = document.getElementById("routeGroup");
    var routeLine = document.getElementById("routeLine");
    var dotAsal = document.getElementById("dotAsal");
    var dotTujuan = document.getElementById("dotTujuan");

    // tombol hide / show panel supaya peta tidak selalu tertutup
    var mapPannel = document.getElementById("mapPannel");
    var panelBody = document.getElementById("panelBody");
    var togglePanelBtn = document.getElementById("togglePanelBtn");

    if (togglePanelBtn && panelBody && mapPannel) {
        togglePanelBtn.addEventListener("click", function () {
            panelBody.classList.toggle("d-none");
            mapPannel.classList.toggle("ringkas");

            if (panelBody.classList.contains("d-none")) {
                togglePanelBtn.textContent = "Show";
            } else {
                togglePanelBtn.textContent = "Hide";
            }
        });
    }

    if (!originSelect || !destinationSelect || !distanceText || !recommendText) {
        return;
    }

    // [x, y] per kota, dalam piksel gambar Map.webp (1080 x 625)
    var coords = {
        mondstadt: [575, 95],
        liyue:     [690, 170],
        inazuma:   [925, 470],
        sumeru:    [520, 340],
        fontaine:  [360, 355],
        natlan:    [265, 410],
        "nod-krai": [300, 125],
        snezhnaya: [835, 200]
    };

    var skalaKm = 10;

    // sembunyikan garis dan tombol
    function sembunyikan() {
        routeGroup.classList.add("d-none");
        recommendLink.classList.add("d-none");
    }

    // cari pesawat dari data_pesawat (PHP): range paling pas untuk jarak ini
    function cariPesawat(jarakKm) {
        var daftar = document.querySelectorAll("#dataPesawat span");
        var pilihan = null;

        daftar.forEach(function (el) {
            var range = Number(el.dataset.range);

            if (range >= jarakKm) {
                if (pilihan === null || range < Number(pilihan.dataset.range)) {
                    pilihan = el;
                }
            }
        });

        return pilihan;
    }

    function updateRoute() {
        var asal = originSelect.value;
        var tujuan = destinationSelect.value;

        if (!asal || !tujuan) return;

        if (asal === tujuan) {
            distanceText.textContent = "Distance: 0 km";
            recommendText.textContent = "Rekomendasi: Tidak perlu penerbangan";
            sembunyikan();
            return;
        }

        var p1 = coords[asal];
        var p2 = coords[tujuan];

        if (!p1 || !p2) return;

        var jarakPx = Math.hypot(p2[0] - p1[0], p2[1] - p1[1]);
        var jarakKm = Math.round(jarakPx * skalaKm);

        distanceText.textContent = "Distance: " + jarakKm.toLocaleString("id-ID") + " km";

        // garis rute di peta
        routeLine.setAttribute("x1", p1[0]);
        routeLine.setAttribute("y1", p1[1]);
        routeLine.setAttribute("x2", p2[0]);
        routeLine.setAttribute("y2", p2[1]);
        dotAsal.setAttribute("cx", p1[0]);
        dotAsal.setAttribute("cy", p1[1]);
        dotTujuan.setAttribute("cx", p2[0]);
        dotTujuan.setAttribute("cy", p2[1]);
        routeGroup.classList.remove("d-none");

        // rekomendasi pesawat
        var pesawat = cariPesawat(jarakKm);

        if (pesawat === null) {
            recommendText.textContent = "Rekomendasi: belum ada pesawat dengan jangkauan sejauh ini";
            recommendLink.classList.add("d-none");
        } else {
            var range = Number(pesawat.dataset.range).toLocaleString("id-ID");
            recommendText.textContent = "Rekomendasi: " + pesawat.dataset.name + " (" + pesawat.dataset.type + "), jangkauan " + range + " km";
            recommendLink.href = "pages/aircraftPortofolio.php?id=" + pesawat.dataset.id;
            recommendLink.classList.remove("d-none");
        }
    }

    originSelect.addEventListener("change", updateRoute);
    destinationSelect.addEventListener("change", updateRoute);
});
