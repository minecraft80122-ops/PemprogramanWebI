<?php
$base = '../';
include '../includes/data_pesawat.php';

// pesawat yang aktif saat halaman dibuka
if (isset($_GET['id']) && isset($aircrafts[$_GET['id']])) {
    $idPilihan = $_GET['id'];
} else {
    $idPilihan = 'jet-1';
}
$plane = $aircrafts[$idPilihan];
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $plane['name']; ?></title>
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

        <!-- section header -->
        <?php include '../includes/header.php'; ?>

        <!-- section tombol pilih pesawat -->
        <div class="ms-5 mt-5 d-flex flex-wrap gap-2">
            <?php foreach ($aircrafts as $item) { ?>
                <button type="button" class="btn btnPilih<?php if ($item['id'] === $idPilihan) { echo ' active'; } ?>" data-id="<?php echo $item['id']; ?>">
                    <?php echo $item['name']; ?>
                </button>
            <?php } ?>
        </div>

        <!-- section konten pesawat (diganti lewat AJAX) -->
        <section id="kontenPesawat">
            <?php include 'ajax_portfolio.php'; ?>
        </section>

        <!-- section footer -->
        <?php include '../includes/footer.php'; ?>

        <!-- section script -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../headerScript.js"></script>
        <script>
            $(document).ready(function () {
                // klik tombol pesawat
                $('.btnPilih').on('click', function () {
                    var id = $(this).data('id');

                    // tombol aktif
                    $('.btnPilih').removeClass('active');
                    $(this).addClass('active');

                    // konten memudar dulu
                    $('#kontenPesawat').addClass('is-loading');

                    // kirim AJAX ke ajax_portfolio.php
                    $.ajax({
                        url: 'ajax_portfolio.php',
                        type: 'GET',
                        data: { id: id },
                        success: function (response) {
                            // tunggu fade selesai, ganti isi, lalu tampil lagi
                            setTimeout(function () {
                                $('#kontenPesawat').html(response);
                                $('#kontenPesawat').removeClass('is-loading');
                            }, 300);

                            // ubah alamat di browser tanpa reload
                            history.replaceState(null, '', '?id=' + id);
                        },
                        error: function () {
                            $('#kontenPesawat').html('Gagal memuat data.');
                            $('#kontenPesawat').removeClass('is-loading');
                        }
                    });
                });
            });
        </script>
    </body>
</html>
