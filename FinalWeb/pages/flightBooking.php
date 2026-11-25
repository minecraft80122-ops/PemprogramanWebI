<?php
$base = '../';
include '../includes/data_pesawat.php';

$plane = null;
$selectedId = '';

if (isset($_GET['id']) && isset($aircrafts[$_GET['id']])) {
    $selectedId = $_GET['id'];
    $plane = $aircrafts[$selectedId];
}

if ($plane !== null) {
    if (isset($plane['detail_img'])) {
        $sideImg = $plane['detail_img'];
    } else {
        $sideImg = '../finalImages/Pesawat1.jpg';
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Flight Booking</title>
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

        <!-- section bookingWrapper -->
        <section class="bookingWrapper">
            <h1 class="headingFont mb-1">FLIGHT BOOKING</h1>
            <p class="text-muted mb-4">Choose an aircraft, then plan your route.</p>

            <div class="row g-0 mb-4">
                <div class="col-md-4">
                    <div class="stepTab active">
                        <span class="stepTabNum">01</span>
                        <div>
                            <span>Trip details</span>
                            <span class="stepTabSub">CURRENT STEP</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stepTab">
                        <span class="stepTabNum">02</span>
                        <span>Passenger details</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stepTab">
                        <span class="stepTabNum">03</span>
                        <span>summary</span>
                    </div>
                </div>
            </div>

            <div class="row g-4 align-items-start">
                <div class="col-lg-8">
                    <div class="bookingCard">
                        <form id="bookingForm" action="#" method="POST">
                            <input type="hidden" name="aircraftId" value="<?php echo $selectedId; ?>">
                            <input type="hidden" name="tripType" id="tripTypeInput" value="one_way">

                            <h5 class="headingFont mb-3">TRIP DETAILS</h5>
                            <div class="mb-3">
                                <label class="form-label small text-muted d-block">Trip type</label>
                                <div class="d-flex gap-2" role="group" aria-label="Trip type">
                                    <button type="button" class="btn tripTypeBtn active" data-trip="one_way" data-label="One way flight">One way</button>
                                    <button type="button" class="btn tripTypeBtn" data-trip="return" data-label="Return flight">Return</button>
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="origin" class="form-label small text-muted">Origin</label>
                                    <input type="text" class="form-control" id="origin" name="origin">
                                </div>
                                <div class="col-md-6">
                                    <label for="destination" class="form-label small text-muted">Destination</label>
                                    <input type="text" class="form-control" id="destination" name="destination">
                                </div>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label for="departureDate" class="form-label small text-muted">Departure date</label>
                                    <input type="text" class="form-control" id="departureDate" name="departureDate">
                                </div>
                                <div class="col-md-6">
                                    <label for="departureTime" class="form-label small text-muted">Preferred departure time</label>
                                    <input type="text" class="form-control" id="departureTime" name="departureTime">
                                </div>
                            </div>

                            <hr class="my-4">
                            <h6 class="text-uppercase small fw-semibold mb-3">WHO IS TRAVELLING?</h6>

                            <div class="mb-3">
                                <label for="passengerInfo" class="form-label small text-muted">Brief passenger's info</label>
                                <input type="text" class="form-control" id="passengerInfo" name="passengerInfo">
                            </div>

                            <div class="mb-4">
                                <label for="travelNeeds" class="form-label small text-muted">Travel needs</label>
                                <textarea class="form-control" id="travelNeeds" name="travelNeeds" rows="4"></textarea>
                            </div>

                            <hr class="my-4">
                            <h6 class="text-uppercase small fw-semibold mb-3">WHERE SHOULD WE SEND YOUR QUOTE?</h6>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="quoteName" class="form-label small text-muted">Full name</label>
                                    <input type="text" class="form-control" id="quoteName" name="quoteName">
                                </div>
                                <div class="col-md-6">
                                    <label for="quoteEmail" class="form-label small text-muted">Email address</label>
                                    <input type="email" class="form-control" id="quoteEmail" name="quoteEmail">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="quotePhone" class="form-label small text-muted">Phone number</label>
                                <input type="tel" class="form-control" id="quotePhone" name="quotePhone">
                            </div>

                            <button type="submit" class="btn btnNext w-100 d-flex justify-content-between align-items-center">
                                <span>Next step</span>
                                <span>&rarr;</span>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sideCard mb-4">
                        <?php if ($plane !== null) { ?>
                            <img src="<?php echo $sideImg; ?>" alt="<?php echo $plane['name']; ?>" class="sideThumb">
                            <div class="p-4">
                                <div class="text-muted small text-uppercase mb-1">SELECTED AIRCRAFT</div>
                                <h3 class="headingFont mb-3"><?php echo $plane['name']; ?></h3>
                                <hr class="my-3">
                                <div class="text-muted mb-1"><?php echo $plane['type']; ?></div>
                                <p class="text-muted small mb-3"><?php echo $plane['short_desc']; ?></p>
                            </div>
                        <?php } else { ?>
                            <div class="emptyAircraft">
                                <div class="text-muted small text-uppercase mb-1">SELECTED AIRCRAFT</div>
                                <h3 class="headingFont mb-2">No aircraft selected</h3>
                                <p class="text-muted small mb-0">Pick one from the list below to see it here.</p>
                            </div>
                        <?php } ?>
                        <div class="p-4 border-top">
                            <form action="flightBooking.php" method="GET">
                                <label for="aircraftSelect" class="form-label small text-muted">Select aircraft</label>
                                <select class="form-select aircraftSelect mb-3" id="aircraftSelect" name="id">
                                    <option value="">Choose an aircraft</option>
                                    <?php foreach ($aircrafts as $item) { ?>
                                        <option value="<?php echo $item['id']; ?>"<?php if ($item['id'] === $selectedId) { echo ' selected'; } ?>>
                                            <?php echo $item['name']; ?> (<?php echo $item['category_label']; ?>)
                                        </option>
                                    <?php } ?>
                                </select>
                                <button type="submit" class="btn btnNext w-100">Select aircraft</button>
                            </form>
                            <div id="ajaxInfo" class="mt-3 small text-muted"></div>
                        </div>
                    </div>

                    <div class="routeBox">
                        <h6 class="text-uppercase small fw-semibold mb-2">YOUR ROUTE</h6>
                        <div class="text-muted small pb-2 mb-2 border-bottom" id="routeTripLabel">One way flight</div>
                        <p class="text-muted small mb-0">
                            Choose your route and dates to outline your request. Passenger details and the final summary follow.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- footer -->
        <?php include '../includes/footer.php'; ?>

        <!-- script -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../headerScript.js"></script>
        <script>
            // jQuery + AJAX: load aircraft short info when select changes
            $(document).ready(function () {
                $('#aircraftSelect').on('change', function () {
                    var id = $(this).val();
                    if (id !== '') {
                        $.ajax({
                            url: 'ajax_plane.php',
                            type: 'GET',
                            data: { id: id },
                            success: function (response) {
                                $('#ajaxInfo').html(response);
                            },
                            error: function () {
                                $('#ajaxInfo').html('Gagal memuat data.');
                            }
                        });
                    } else {
                        $('#ajaxInfo').html('');
                    }
                });
            });

            var tripButtons = document.querySelectorAll('.tripTypeBtn');
            var tripTypeInput = document.getElementById('tripTypeInput');
            var routeTripLabel = document.getElementById('routeTripLabel');

            tripButtons.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    tripButtons.forEach(function (item) {
                        item.classList.remove('active');
                    });
                    btn.classList.add('active');
                    tripTypeInput.value = btn.getAttribute('data-trip');
                    if (routeTripLabel) {
                        routeTripLabel.textContent = btn.getAttribute('data-label');
                    }
                });
            });
        </script>
    </body>
</html>