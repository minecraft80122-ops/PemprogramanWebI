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
    $thumbImg = $plane['detail_img'];
} else {
    $thumbImg = '../finalImages/Pesawat1.jpg';
}

if (isset($plane['category_label'])) {
    $categoryLabel = $plane['category_label'];
} else {
    $categoryLabel = 'Aircraft';
}

$submitted = false;
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $submitted = true;
}

if (isset($_POST['buyerType'])) {
    $buyerType = $_POST['buyerType'];
} else {
    $buyerType = 'individual';
}

if ($buyerType === 'company') {
    $buyerTypeLabel = 'Company';
} else {
    $buyerTypeLabel = 'Individual';
}

if (isset($_POST['fullName'])) {
    $fullName = $_POST['fullName'];
} else {
    $fullName = '';
}

if (isset($_POST['companyName'])) {
    $companyName = $_POST['companyName'];
} else {
    $companyName = '';
}

if (isset($_POST['emailAddress'])) {
    $emailAddress = $_POST['emailAddress'];
} else {
    $emailAddress = '';
}

if (isset($_POST['phoneNumber'])) {
    $phoneNumber = $_POST['phoneNumber'];
} else {
    $phoneNumber = '';
}

if (isset($_POST['contactMethod'])) {
    $contactMethod = $_POST['contactMethod'];
} else {
    $contactMethod = '';
}

if (isset($_POST['intendedUse'])) {
    $intendedUse = $_POST['intendedUse'];
} else {
    $intendedUse = '';
}

if (isset($_POST['inspectionTime'])) {
    $inspectionTime = $_POST['inspectionTime'];
} else {
    $inspectionTime = '';
}

if (isset($_POST['questionsReq'])) {
    $questionsReq = $_POST['questionsReq'];
} else {
    $questionsReq = '';
}

if (isset($_POST['agreeContact'])) {
    $agreeContact = true;
} else {
    $agreeContact = false;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Purchase Aircraft - <?php echo $plane['name']; ?></title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lunasima:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- css -->
        <link href="../assets/css/common.css" rel="stylesheet">
        <link href="../assets/css/catalog.css" rel="stylesheet">
    </head>
    <body class="pagePurchase">
        <div class="topHoverZone" id="topHoverZone"></div>
        <!-- header -->
        <?php include '../includes/header.php'; ?>

        <!-- section purchaseWrapper -->
        <section class="purchaseWrapper">
            <a href="aircraftPortofolio.php?id=<?php echo $plane['id']; ?>" class="backLink">&larr; Back to <?php echo $plane['name']; ?></a>
            <div class="row g-5 align-items-start">
                <div class="col-lg-5">
                    <h1 class="headingFont mb-4">PURCHASE THIS AIRCRAFT</h1>
                    <img src="<?php echo $thumbImg; ?>" alt="<?php echo $plane['name']; ?>" class="aircraftThumb mb-3">
                    <h3 class="headingFont mb-1"><?php echo $plane['name']; ?></h3>
                    <p class="text-muted mb-1">Price on request</p>
                    <p class="text-muted small mb-4"><?php echo $categoryLabel; ?> / <?php echo $plane['name']; ?></p>
                    <hr class="my-4">
                    <h6 class="text-uppercase small fw-semibold mb-4">WHAT HAPPENS NEXT</h6>
                    <div class="d-flex align-items-start mb-3">
                        <span class="stepNum">01</span>
                        <div>
                            <div class="fw-medium">Discuss requirements</div>
                            <div class="text-muted small">Clarify your operation, cabin needs and timing.</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-start mb-3">
                        <span class="stepNum">02</span>
                        <div>
                            <div class="fw-medium">Review aircraft details</div>
                            <div class="text-muted small">Review suitable aircraft information and pricing.</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-start">
                        <span class="stepNum">03</span>
                        <div>
                            <div class="fw-medium">Arrange inspection</div>
                            <div class="text-muted small">Agree on a suitable inspection when ready.</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <?php if ($submitted) { ?>
                        <div class="summaryCard">
                            <h3 class="headingFont mb-1">PURCHASE INQUIRY SUMMARY</h3>
                            <p class="text-muted small mb-3">Your request details received via POST.</p>
                            <hr class="my-3">
                            <div class="row g-2 small">
                                <div class="col-sm-4 text-muted">Aircraft</div>
                                <div class="col-sm-8"><?php echo $plane['name']; ?></div>

                                <div class="col-sm-4 text-muted">Buyer type</div>
                                <div class="col-sm-8"><?php echo $buyerTypeLabel; ?></div>

                                <div class="col-sm-4 text-muted">Full name</div>
                                <div class="col-sm-8"><?php echo $fullName; ?></div>

                                <div class="col-sm-4 text-muted">Company</div>
                                <div class="col-sm-8"><?php echo $companyName; ?></div>

                                <div class="col-sm-4 text-muted">Email address</div>
                                <div class="col-sm-8"><?php echo $emailAddress; ?></div>

                                <div class="col-sm-4 text-muted">Phone number</div>
                                <div class="col-sm-8"><?php echo $phoneNumber; ?></div>

                                <div class="col-sm-4 text-muted">Preferred contact</div>
                                <div class="col-sm-8"><?php echo $contactMethod; ?></div>

                                <div class="col-sm-4 text-muted">Intended use</div>
                                <div class="col-sm-8"><?php echo $intendedUse; ?></div>

                                <div class="col-sm-4 text-muted">Preferred inspection</div>
                                <div class="col-sm-8"><?php echo $inspectionTime; ?></div>

                                <div class="col-sm-4 text-muted">Questions &amp; requirement</div>
                                <div class="col-sm-8"><?php echo $questionsReq; ?></div>

                                <div class="col-sm-4 text-muted">Contact agreement</div>
                                <div class="col-sm-8">
                                    <?php if ($agreeContact) { ?>
                                        Agreed to be contacted about this purchase
                                    <?php } else { ?>
                                        Not checked
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="inquiryCard">
                        <h2 class="headingFont mb-1">YOUR PURCHASE INQUIRY</h2>
                        <p class="text-muted small mb-4">Required unless marked optional.</p>
                        <hr class="my-4">
                        <form id="purchaseForm" action="purchaseAircraft.php?id=<?php echo $plane['id']; ?>" method="POST">
                            <input type="hidden" name="aircraftId" value="<?php echo $plane['id']; ?>">
                            <h6 class="text-uppercase small fw-semibold mb-3">01 BUYER DETAILS</h6>
                            <input type="hidden" name="buyerType" id="buyerTypeInput" value="<?php echo $buyerType; ?>">
                            <div class="d-flex w-100 mb-4" role="group" aria-label="Buyer type">
                                <button type="button" class="btn buyerTypeBtn <?php if ($buyerType === 'individual') { echo 'active'; } ?>" data-type="individual">Individual</button>
                                <button type="button" class="btn buyerTypeBtn <?php if ($buyerType === 'company') { echo 'active'; } ?>" data-type="company">Company</button>
                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="fullName" class="form-label small text-muted">Full name</label>
                                    <input type="text" class="form-control" id="fullName" name="fullName" value="<?php echo $fullName; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="companyName" class="form-label small text-muted">Company</label>
                                    <input type="text" class="form-control" id="companyName" name="companyName" value="<?php echo $companyName; ?>">
                                </div>
                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="emailAddress" class="form-label small text-muted">Email address</label>
                                    <input type="email" class="form-control" id="emailAddress" name="emailAddress" value="<?php echo $emailAddress; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="phoneNumber" class="form-label small text-muted">Phone number</label>
                                    <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" value="<?php echo $phoneNumber; ?>">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="contactMethod" class="form-label small text-muted">Prefered contact method</label>
                                <input type="text" class="form-control" id="contactMethod" name="contactMethod" value="<?php echo $contactMethod; ?>">
                            </div>
                            <hr class="my-4">
                            <h6 class="text-uppercase small fw-semibold mb-3">02 YOUR REQUIREMENTS</h6>
                            <div class="mb-3">
                                <label for="intendedUse" class="form-label small text-muted">Intended use</label>
                                <input type="text" class="form-control" id="intendedUse" name="intendedUse" value="<?php echo $intendedUse; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="inspectionTime" class="form-label small text-muted">Preferred inspection time</label>
                                <input type="text" class="form-control" id="inspectionTime" name="inspectionTime" value="<?php echo $inspectionTime; ?>">
                            </div>
                            <div class="mb-4">
                                <label for="questionsReq" class="form-label small text-muted">Questions &amp; requirement</label>
                                <textarea class="form-control" id="questionsReq" name="questionsReq" rows="4"><?php echo $questionsReq; ?></textarea>
                            </div>
                            <hr class="my-4">
                            <div class="form-check mb-4">
                                <input class="form-check-input rounded-0" type="checkbox" id="agreeContact" name="agreeContact" <?php if ($agreeContact) { echo 'checked'; } ?>>
                                <label class="form-check-label small text-muted" for="agreeContact">
                                    I agree to be contacted about this purchase
                                </label>
                            </div>
                            <button type="submit" class="btn btnSubmit w-100 d-flex justify-content-between align-items-center">
                                <span>Send Request</span>
                                <span>&rarr;</span>
                            </button>
                        </form>
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
            var buyerButtons = document.querySelectorAll('.buyerTypeBtn');
            var buyerTypeInput = document.getElementById('buyerTypeInput');

            buyerButtons.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    buyerButtons.forEach(function (item) {
                        item.classList.remove('active');
                    });
                    btn.classList.add('active');
                    buyerTypeInput.value = btn.getAttribute('data-type');
                });
            });
        </script>
    </body>
</html>