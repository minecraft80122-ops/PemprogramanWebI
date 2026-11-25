<?php
$base = '../';
include '../includes/data_pesawat.php';

if (isset($_GET['id']) && isset($aircrafts[$_GET['id']])) {
    $selectedId = $_GET['id'];
    $plane = $aircrafts[$selectedId];
} else {
    $selectedId = 'jet-1';
    $plane = $aircrafts['jet-1'];
}

if (isset($plane['detail_img'])) {
    $sideImg = $plane['detail_img'];
} else {
    $sideImg = '../finalImages/Pesawat1.jpg';
}

if (isset($plane['extra_info'])) {
    $extraInfo = $plane['extra_info'];
} else {
    $extraInfo = 'Our team will confirm the aircraft configuration and availability for your flight.';
}

if (isset($_POST['step'])) {
    $step = (int) $_POST['step'];
} else {
    $step = 1;
}

if ($step < 1 || $step > 3) {
    $step = 1;
}

if (isset($_POST['tripType'])) {
    $tripType = $_POST['tripType'];
} else {
    $tripType = 'one_way';
}

if (isset($_POST['origin'])) {
    $origin = $_POST['origin'];
} else {
    $origin = '';
}

if (isset($_POST['destination'])) {
    $destination = $_POST['destination'];
} else {
    $destination = '';
}

if (isset($_POST['departureDate'])) {
    $departureDate = $_POST['departureDate'];
} else {
    $departureDate = '';
}

if (isset($_POST['departureTime'])) {
    $departureTime = $_POST['departureTime'];
} else {
    $departureTime = '';
}

if (isset($_POST['passengerInfo'])) {
    $passengerInfo = $_POST['passengerInfo'];
} else {
    $passengerInfo = '';
}

if (isset($_POST['travelNeeds'])) {
    $travelNeeds = $_POST['travelNeeds'];
} else {
    $travelNeeds = '';
}

if (isset($_POST['quoteName'])) {
    $quoteName = $_POST['quoteName'];
} else {
    $quoteName = '';
}

if (isset($_POST['quoteEmail'])) {
    $quoteEmail = $_POST['quoteEmail'];
} else {
    $quoteEmail = '';
}

if (isset($_POST['quotePhone'])) {
    $quotePhone = $_POST['quotePhone'];
} else {
    $quotePhone = '';
}

if (isset($_POST['pax1Name'])) {
    $pax1Name = $_POST['pax1Name'];
} else {
    $pax1Name = '';
}

if (isset($_POST['pax1Id'])) {
    $pax1Id = $_POST['pax1Id'];
} else {
    $pax1Id = '';
}

if (isset($_POST['pax1Seat'])) {
    $pax1Seat = $_POST['pax1Seat'];
} else {
    $pax1Seat = '';
}

if (isset($_POST['pax1Notes'])) {
    $pax1Notes = $_POST['pax1Notes'];
} else {
    $pax1Notes = '';
}

if (isset($_POST['pax2Name'])) {
    $pax2Name = $_POST['pax2Name'];
} else {
    $pax2Name = '';
}

if (isset($_POST['pax2Id'])) {
    $pax2Id = $_POST['pax2Id'];
} else {
    $pax2Id = '';
}

if (isset($_POST['pax2Seat'])) {
    $pax2Seat = $_POST['pax2Seat'];
} else {
    $pax2Seat = '';
}

if (isset($_POST['pax2Notes'])) {
    $pax2Notes = $_POST['pax2Notes'];
} else {
    $pax2Notes = '';
}

if ($tripType === 'return') {
    $tripLabel = 'Return flight';
} else {
    $tripLabel = 'One way flight';
}

$tab1Class = 'stepTab';
$tab2Class = 'stepTab';
$tab3Class = 'stepTab';

switch ($step) {
    case 1:
        $tab1Class = 'stepTab active';
        break;
    case 2:
        $tab2Class = 'stepTab active';
        break;
    case 3:
        $tab3Class = 'stepTab active';
        break;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Book This Aircraft For A Flight - <?php echo $plane['name']; ?></title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lunasima:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- css -->
        <link href="../assets/css/common.css" rel="stylesheet">
        <link href="../assets/css/catalog.css" rel="stylesheet">
    </head>
    <body class="pageLoan">
        <div class="topHoverZone" id="topHoverZone"></div>
        <!-- header -->
        <?php include '../includes/header.php'; ?>

        <!-- section bookingWrapper -->
        <section class="bookingWrapper">
            <h1 class="headingFont mb-1">BOOK THIS AIRCRAFT FOR A FLIGHT</h1>
            <p class="text-muted mb-4">Plan your route with your prefered Aircraft.</p>

            <div class="row g-0 mb-4">
                <div class="col-md-4">
                    <div class="<?php echo $tab1Class; ?>">
                        <span class="stepTabNum">01</span>
                        <div>
                            <span>Trip details</span>
                            <?php if ($step === 1) { ?>
                                <span class="stepTabSub">CURRENT STEP</span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="<?php echo $tab2Class; ?>">
                        <span class="stepTabNum">02</span>
                        <div>
                            <span>Passenger details</span>
                            <?php if ($step === 2) { ?>
                                <span class="stepTabSub">CURRENT STEP</span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="<?php echo $tab3Class; ?>">
                        <span class="stepTabNum">03</span>
                        <div>
                            <span>summary</span>
                            <?php if ($step === 3) { ?>
                                <span class="stepTabSub">CURRENT STEP</span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 align-items-start">
                <div class="col-lg-8">
                    <div class="bookingCard">
                        <?php
                        switch ($step) {
                            case 1:
                        ?>
                                <form action="loanAircraft.php?id=<?php echo $plane['id']; ?>" method="POST">
                                    <input type="hidden" name="step" value="2">
                                    <input type="hidden" name="tripType" id="tripTypeInput" value="<?php echo $tripType; ?>">

                                    <h5 class="headingFont mb-3">TRIP DETAILS</h5>
                                    <div class="mb-3">
                                        <label class="form-label small text-muted d-block">Trip type</label>
                                        <div class="d-flex gap-2" role="group" aria-label="Trip type">
                                            <button type="button" class="btn tripTypeBtn <?php if ($tripType === 'one_way') { echo 'active'; } ?>" data-trip="one_way" data-label="One way flight">One way</button>
                                            <button type="button" class="btn tripTypeBtn <?php if ($tripType === 'return') { echo 'active'; } ?>" data-trip="return" data-label="Return flight">Return</button>
                                        </div>
                                    </div>

                                    <div class="row g-3 mb-3">
                                        <div class="col-md-6">
                                            <label for="origin" class="form-label small text-muted">Origin</label>
                                            <input type="text" class="form-control" id="origin" name="origin" value="<?php echo $origin; ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="destination" class="form-label small text-muted">Destination</label>
                                            <input type="text" class="form-control" id="destination" name="destination" value="<?php echo $destination; ?>">
                                        </div>
                                    </div>

                                    <div class="row g-3 mb-4">
                                        <div class="col-md-6">
                                            <label for="departureDate" class="form-label small text-muted">Departure date</label>
                                            <input type="text" class="form-control" id="departureDate" name="departureDate" value="<?php echo $departureDate; ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="departureTime" class="form-label small text-muted">Preferred departure time</label>
                                            <input type="text" class="form-control" id="departureTime" name="departureTime" value="<?php echo $departureTime; ?>">
                                        </div>
                                    </div>

                                    <hr class="my-4">
                                    <h6 class="text-uppercase small fw-semibold mb-3">WHO IS TRAVELLING?</h6>

                                    <div class="mb-3">
                                        <label for="passengerInfo" class="form-label small text-muted">Brief passenger's info</label>
                                        <input type="text" class="form-control" id="passengerInfo" name="passengerInfo" value="<?php echo $passengerInfo; ?>">
                                    </div>

                                    <div class="mb-4">
                                        <label for="travelNeeds" class="form-label small text-muted">Travel needs</label>
                                        <textarea class="form-control" id="travelNeeds" name="travelNeeds" rows="4"><?php echo $travelNeeds; ?></textarea>
                                    </div>

                                    <hr class="my-4">
                                    <h6 class="text-uppercase small fw-semibold mb-3">WHERE SHOULD WE SEND YOUR QUOTE?</h6>

                                    <div class="row g-3 mb-3">
                                        <div class="col-md-6">
                                            <label for="quoteName" class="form-label small text-muted">Full name</label>
                                            <input type="text" class="form-control" id="quoteName" name="quoteName" value="<?php echo $quoteName; ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="quoteEmail" class="form-label small text-muted">Email address</label>
                                            <input type="email" class="form-control" id="quoteEmail" name="quoteEmail" value="<?php echo $quoteEmail; ?>">
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="quotePhone" class="form-label small text-muted">Phone number</label>
                                        <input type="tel" class="form-control" id="quotePhone" name="quotePhone" value="<?php echo $quotePhone; ?>">
                                    </div>

                                    <button type="submit" class="btn btnNext w-100 d-flex justify-content-between align-items-center">
                                        <span>Next step</span>
                                        <span>&rarr;</span>
                                    </button>
                                </form>
                        <?php
                                break;

                            case 2:
                        ?>
                                <form action="loanAircraft.php?id=<?php echo $plane['id']; ?>" method="POST">
                                    <input type="hidden" name="step" value="3">
                                    <input type="hidden" name="tripType" value="<?php echo $tripType; ?>">
                                    <input type="hidden" name="origin" value="<?php echo $origin; ?>">
                                    <input type="hidden" name="destination" value="<?php echo $destination; ?>">
                                    <input type="hidden" name="departureDate" value="<?php echo $departureDate; ?>">
                                    <input type="hidden" name="departureTime" value="<?php echo $departureTime; ?>">
                                    <input type="hidden" name="passengerInfo" value="<?php echo $passengerInfo; ?>">
                                    <input type="hidden" name="travelNeeds" value="<?php echo $travelNeeds; ?>">
                                    <input type="hidden" name="quoteName" value="<?php echo $quoteName; ?>">
                                    <input type="hidden" name="quoteEmail" value="<?php echo $quoteEmail; ?>">
                                    <input type="hidden" name="quotePhone" value="<?php echo $quotePhone; ?>">

                                    <h5 class="headingFont mb-3">PASSENGER DETAILS</h5>
                                    <p class="text-muted small mb-4">Fill in detailed passenger profiles in the two boxes below.</p>

                                    <!-- Box 1 -->
                                    <div class="paxBox">
                                        <h6 class="text-uppercase small fw-semibold mb-3">PASSENGER BOX 01 — PRIMARY PASSENGER</h6>
                                        <div class="row g-3 mb-3">
                                            <div class="col-md-6">
                                                <label for="pax1Name" class="form-label small text-muted">Passenger full name</label>
                                                <input type="text" class="form-control" id="pax1Name" name="pax1Name" value="<?php echo $pax1Name; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="pax1Id" class="form-label small text-muted">Passport / ID number</label>
                                                <input type="text" class="form-control" id="pax1Id" name="pax1Id" value="<?php echo $pax1Id; ?>">
                                            </div>
                                        </div>
                                        <div class="row g-3 mb-3">
                                            <div class="col-md-6">
                                                <label for="pax1Seat" class="form-label small text-muted">Seat / Cabin preference</label>
                                                <input type="text" class="form-control" id="pax1Seat" name="pax1Seat" value="<?php echo $pax1Seat; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="pax1Notes" class="form-label small text-muted">Meal / Special assistance</label>
                                                <input type="text" class="form-control" id="pax1Notes" name="pax1Notes" value="<?php echo $pax1Notes; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Box 2 -->
                                    <div class="paxBox">
                                        <h6 class="text-uppercase small fw-semibold mb-3">PASSENGER BOX 02 — COMPANION / GROUP DETAILS</h6>
                                        <div class="row g-3 mb-3">
                                            <div class="col-md-6">
                                                <label for="pax2Name" class="form-label small text-muted">Companion / Lead guest name</label>
                                                <input type="text" class="form-control" id="pax2Name" name="pax2Name" value="<?php echo $pax2Name; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="pax2Id" class="form-label small text-muted">Passport / ID or headcount</label>
                                                <input type="text" class="form-control" id="pax2Id" name="pax2Id" value="<?php echo $pax2Id; ?>">
                                            </div>
                                        </div>
                                        <div class="row g-3 mb-3">
                                            <div class="col-md-6">
                                                <label for="pax2Seat" class="form-label small text-muted">Seat / Cabin preference</label>
                                                <input type="text" class="form-control" id="pax2Seat" name="pax2Seat" value="<?php echo $pax2Seat; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="pax2Notes" class="form-label small text-muted">Luggage / Special notes</label>
                                                <input type="text" class="form-control" id="pax2Notes" name="pax2Notes" value="<?php echo $pax2Notes; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex gap-2">
                                        <button type="submit" name="step" value="1" class="btn btnBackStep">
                                            &larr; Back to step 01
                                        </button>
                                        <button type="submit" class="btn btnNext flex-grow-1 d-flex justify-content-between align-items-center">
                                            <span>Continue to summary</span>
                                            <span>&rarr;</span>
                                        </button>
                                    </div>
                                </form>
                        <?php
                                break;

                            case 3:
                        ?>
                                <h5 class="headingFont mb-1">BOOKING SUMMARY</h5>
                                <p class="text-muted small mb-4">Review all submitted details from your request.</p>

                                <div class="summaryBox">
                                    <h6 class="text-uppercase small fw-semibold mb-3">SELECTED AIRCRAFT &amp; TRIP DETAILS</h6>
                                    <div class="row g-2 small">
                                        <div class="col-sm-4 text-muted">Aircraft</div>
                                        <div class="col-sm-8"><?php echo $plane['name']; ?></div>

                                        <div class="col-sm-4 text-muted">Trip type</div>
                                        <div class="col-sm-8"><?php echo $tripLabel; ?></div>

                                        <div class="col-sm-4 text-muted">Origin</div>
                                        <div class="col-sm-8"><?php echo $origin; ?></div>

                                        <div class="col-sm-4 text-muted">Destination</div>
                                        <div class="col-sm-8"><?php echo $destination; ?></div>

                                        <div class="col-sm-4 text-muted">Departure date</div>
                                        <div class="col-sm-8"><?php echo $departureDate; ?></div>

                                        <div class="col-sm-4 text-muted">Departure time</div>
                                        <div class="col-sm-8"><?php echo $departureTime; ?></div>

                                        <div class="col-sm-4 text-muted">Brief passenger's info</div>
                                        <div class="col-sm-8"><?php echo $passengerInfo; ?></div>

                                        <div class="col-sm-4 text-muted">Travel needs</div>
                                        <div class="col-sm-8"><?php echo $travelNeeds; ?></div>
                                    </div>
                                </div>

                                <div class="summaryBox">
                                    <h6 class="text-uppercase small fw-semibold mb-3">QUOTE CONTACT</h6>
                                    <div class="row g-2 small">
                                        <div class="col-sm-4 text-muted">Full name</div>
                                        <div class="col-sm-8"><?php echo $quoteName; ?></div>

                                        <div class="col-sm-4 text-muted">Email address</div>
                                        <div class="col-sm-8"><?php echo $quoteEmail; ?></div>

                                        <div class="col-sm-4 text-muted">Phone number</div>
                                        <div class="col-sm-8"><?php echo $quotePhone; ?></div>
                                    </div>
                                </div>

                                <div class="summaryBox">
                                    <h6 class="text-uppercase small fw-semibold mb-3">PASSENGER DETAILS (BOX 01 &amp; BOX 02)</h6>
                                    <div class="row g-3 small">
                                        <div class="col-md-6">
                                            <div class="fw-semibold mb-1">Box 01 — Primary Passenger</div>
                                            <div><span class="text-muted">Name:</span> <?php echo $pax1Name; ?></div>
                                            <div><span class="text-muted">ID / Passport:</span> <?php echo $pax1Id; ?></div>
                                            <div><span class="text-muted">Seat / Cabin:</span> <?php echo $pax1Seat; ?></div>
                                            <div><span class="text-muted">Notes:</span> <?php echo $pax1Notes; ?></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="fw-semibold mb-1">Box 02 — Companion / Group</div>
                                            <div><span class="text-muted">Name:</span> <?php echo $pax2Name; ?></div>
                                            <div><span class="text-muted">ID / Passport:</span> <?php echo $pax2Id; ?></div>
                                            <div><span class="text-muted">Seat / Cabin:</span> <?php echo $pax2Seat; ?></div>
                                            <div><span class="text-muted">Notes:</span> <?php echo $pax2Notes; ?></div>
                                        </div>
                                    </div>
                                </div>

                                <form action="loanAircraft.php?id=<?php echo $plane['id']; ?>" method="POST">
                                    <input type="hidden" name="tripType" value="<?php echo $tripType; ?>">
                                    <input type="hidden" name="origin" value="<?php echo $origin; ?>">
                                    <input type="hidden" name="destination" value="<?php echo $destination; ?>">
                                    <input type="hidden" name="departureDate" value="<?php echo $departureDate; ?>">
                                    <input type="hidden" name="departureTime" value="<?php echo $departureTime; ?>">
                                    <input type="hidden" name="passengerInfo" value="<?php echo $passengerInfo; ?>">
                                    <input type="hidden" name="travelNeeds" value="<?php echo $travelNeeds; ?>">
                                    <input type="hidden" name="quoteName" value="<?php echo $quoteName; ?>">
                                    <input type="hidden" name="quoteEmail" value="<?php echo $quoteEmail; ?>">
                                    <input type="hidden" name="quotePhone" value="<?php echo $quotePhone; ?>">
                                    <input type="hidden" name="pax1Name" value="<?php echo $pax1Name; ?>">
                                    <input type="hidden" name="pax1Id" value="<?php echo $pax1Id; ?>">
                                    <input type="hidden" name="pax1Seat" value="<?php echo $pax1Seat; ?>">
                                    <input type="hidden" name="pax1Notes" value="<?php echo $pax1Notes; ?>">
                                    <input type="hidden" name="pax2Name" value="<?php echo $pax2Name; ?>">
                                    <input type="hidden" name="pax2Id" value="<?php echo $pax2Id; ?>">
                                    <input type="hidden" name="pax2Seat" value="<?php echo $pax2Seat; ?>">
                                    <input type="hidden" name="pax2Notes" value="<?php echo $pax2Notes; ?>">

                                    <div class="d-flex gap-2">
                                        <button type="submit" name="step" value="2" class="btn btnBackStep">
                                            &larr; Back to step 02
                                        </button>
                                        <a href="loanAircraft.php?id=<?php echo $plane['id']; ?>" class="btn btnNext flex-grow-1 text-center text-decoration-none">
                                            Start new booking
                                        </a>
                                    </div>
                                </form>
                        <?php
                                break;
                        }
                        ?>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sideCard mb-4">
                        <img src="<?php echo $sideImg; ?>" alt="<?php echo $plane['name']; ?>" class="sideThumb">
                        <div class="p-4">
                            <div class="text-muted small text-uppercase mb-1">SELECTED AIRCRAFT</div>
                            <h3 class="headingFont mb-3"><?php echo $plane['name']; ?></h3>
                            <hr class="my-3">
                            <div class="text-muted mb-1">Deskripsi tambahan</div>
                            <p class="text-muted small mb-3"><?php echo $extraInfo; ?></p>
                            <a href="aircraftPortofolio.php?id=<?php echo $plane['id']; ?>" class="backLink">&larr; Back to <?php echo $plane['name']; ?></a>
                        </div>
                    </div>

                    <div class="routeBox">
                        <h6 class="text-uppercase small fw-semibold mb-2">YOUR ROUTE</h6>
                        <div class="text-muted small pb-2 mb-2 border-bottom" id="routeTripLabel"><?php echo $tripLabel; ?></div>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../headerScript.js"></script>
        <script>
            var tripButtons = document.querySelectorAll('.tripTypeBtn');
            var tripTypeInput = document.getElementById('tripTypeInput');
            var routeTripLabel = document.getElementById('routeTripLabel');

            tripButtons.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    tripButtons.forEach(function (item) {
                        item.classList.remove('active');
                    });
                    btn.classList.add('active');
                    if (tripTypeInput) {
                        tripTypeInput.value = btn.getAttribute('data-trip');
                    }
                    if (routeTripLabel) {
                        routeTripLabel.textContent = btn.getAttribute('data-label');
                    }
                });
            });
        </script>
    </body>
</html>