<?php
$mysqli = require __DIR__ . "/database.php";

$messageStatus = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // SAFE INPUT
    $contactName = mysqli_real_escape_string($mysqli, $_POST['contactName']);
    $contactEmail = mysqli_real_escape_string($mysqli, $_POST['contactEmail']);
    $contactMessage = mysqli_real_escape_string($mysqli, $_POST['contactMessage']);

    // CHECK DUPLICATE
    $checkQuery = "SELECT * FROM contact 
                   WHERE contactEmail = '$contactEmail' 
                   AND contactMessage = '$contactMessage'";

    $result = $mysqli->query($checkQuery);

    if (!$result) {
        die("Query Error: " . $mysqli->error);
    }

    if ($result->num_rows == 0) {

        // INSERT DATA
        $sql = "INSERT INTO contact (contactName, contactEmail, contactMessage)
                VALUES ('$contactName', '$contactEmail', '$contactMessage')";

        if ($mysqli->query($sql) === TRUE) {
            $messageStatus = "success";
        } else {
            $messageStatus = "error";
        }

    } else {
        $messageStatus = "duplicate";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Erika's Portfolio</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="icon" href="img/logo1.png" sizes="16x16" type="image/png">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
</head>


<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small>Sto. Tomas Batangas</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small>Consultation | Mon - Sat : 08:00 AM - 06:00 PM</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small>+63 9053138528</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square bg-white text-primary me-1" href="https://www.facebook.com/eri.seiji.017"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href="https://www.linkedin.com/in/erika-joyce-baybay-1b4a9a367/"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-0" href="https://www.instagram.com/_eri.joyce/"><i class="fab fa-instagram"></i></a>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-code me-3"></i>Erika Joyce</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="#about" class="nav-item nav-link">About</a>
                <a href="#services" class="nav-item nav-link">Services</a>
            </div>
            <a href="contact.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Contact Me<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->


<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-primary text-uppercase">// Contact ME //</h6>
            <h1 class="mb-5">Send Your Message or Inquiries</h1>
        </div>
        <div class="row g-4">
            <div class="col-12">
                <div class="row gy-4">
                    <div class="col-md-4">
                     
                    </div>
                </div>
            </div>
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                <iframe class="position-relative rounded w-100 h-100"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3865.786062330664!2d121.30391810855377!3d14.070715911004033!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397a6c004c632db%3A0x6e589c4f890d2d03!2sLatitude%20and%20Longitude!5e0!3m2!1sen!2sph!4v1632729993833!5m2!1sen!2sph"
                    frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
            </div>
            <div class="col-md-6">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <p class="mb-4">Message me for inquiries so I can respond quickly and guide you with reliable, high-quality, and efficient commission-based project solutions tailored specifically to your needs.</p>
                    <form action="contact.php" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="contactkName" name="contactName" placeholder="Your Name" required>
                                    <label for="contactName">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="contactEmail" name="contactEmail" placeholder="Your Email" required>
                                    <label for="contactEmail">Your Email</label>
                                </div>
                            </div>
                          

                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="contactMessage" name="contactMessage" style="height: 100px" required></textarea>
                                    <label for="contactMessage">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->



    <!-- Footer Start -->
  <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('img/secslider.png') center center / cover no-repeat;">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Sto. Tomas, Batangas</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+63 9053138528</p>
                    <p class="mb-2">
    <i class="fa fa-envelope me-3"></i>
    <a href="mailto:baybayerikajoyce@gmail.com" class="text-white text-decoration-none">
        baybayerikajoyce@gmail.com
    </a>
</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/eri.seiji.017"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://www.linkedin.com/in/erika-joyce-baybay-1b4a9a367/"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://www.instagram.com/_eri.joyce/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Consultation Hours</h4>
                    <h6 class="text-light">Monday - Saturday:</h6>
                    <p class="mb-4">08:00 AM - 06:00 PM</p>
                    
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Services</h4>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-cogs me-2"></i>
                        <span>Commission-Based Services</span>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-wrench me-2"></i>
                        <span>Web Development</span>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-circle me-2"></i>
                        <span>Thesis Editing</span>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-oil-can me-2"></i>
                        <span>Data Entry</span>
                    </div>
                </div>
                
                
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Copyright</h4>
                    <p>&copy; Erika's Portfolio. All rights reserved. Admin Eri</p>
                </div>
                
    <!-- Footer End -->

    



    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>

