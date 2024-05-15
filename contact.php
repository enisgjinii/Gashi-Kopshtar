<!DOCTYPE html>
<html lang="en">

</html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>Gashi Kopshtar</title>
    <!-- Favicon -->
    <link rel="icon" href="img/fav-icons/favicon.ico">
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <!-- Sweet Alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="img/core-img/leaf.png" alt="">
        </div>
    </div>
    <?php include("navbar.php"); ?>
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg);">
            <h2>Na kontaktoni</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"> Shtëpia</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kontakti</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->
    <!-- ##### Contact Area Info Start ##### -->
    <div class="contact-area-info section-padding-0-100">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <!-- Contact Thumbnail -->
                <div class="col-12 col-md-6">
                    <div class="contact--thumbnail">
                        <img src="img/23.jpg" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>NA KONTAKTONI</h2>
                        <p>Ne po përmirësojmë shërbimet tona për t'ju shërbyer më mirë.</p>
                    </div>
                    <!-- Contact Information -->
                    <div class="contact-information">
                        <p><span>Adresë:</span> Suharekë</p>
                        <p><span>Telefoni:</span> +383 (0) 49 310 145 </p>
                        <p><span>Email-i:</span> gashikopshtar@gmail.com</p>
                        <p><span>Orari i punës:</span> E hënë - E shtunë: 9:00 AM  -  5:00 PM</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Contact Area Info End ##### -->
    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-lg-5">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>KONTAKTONI</h2>
                        <p>Na dërgoni një mesazh, ne do të telefonojmë më vonë</p>
                    </div>
                    <!-- Contact Form Area -->
                    <div class="contact-form-area mb-100">
                        <form id="contactForm" method="post">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="contact-name" name="name" placeholder="Emri juaj" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <input type="tel" class="form-control" id="contact-phone" name="phone" placeholder="Numri i telefonit (+383)" pattern="(049|045|044|048) [0-9]{3} [0-9]{3}" required>
                                        <small class="form-text text-muted">Formati: 049 XXX XXX</small>
                                    </div>


                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="contact-subject" name="subject" placeholder="Subjekti" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Mesazhi" required></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn alazea-btn mt-15">Dërgoni mesazh</button>
                                </div>
                            </div>
                        </form>

                        <!-- Include jQuery -->
                        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                        <!-- Include SweetAlert2 JS -->
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                        <script>
                            $(document).ready(function() {
                                var phoneInput = document.getElementById('contact-phone');

                                phoneInput.addEventListener('input', function() {
                                    var formattedPhoneNumber = phoneInput.value.replace(/\D/g, '');
                                    if (formattedPhoneNumber.length > 0) {
                                        formattedPhoneNumber = formattedPhoneNumber.match(/.{1,3}/g).join(' ').trim();
                                    }
                                    phoneInput.value = formattedPhoneNumber;
                                });
                                $('#contactForm').submit(function(e) {
                                    e.preventDefault(); // Parandalon dërgimin e formës
                                    // Shprehjet regjullore për validim
                                    // Validimi
                                    var name = $('#contact-name').val();
                                    var subject = $('#contact-subject').val();
                                    var message = $('#message').val();
                                    if (name.trim() === '' || subject.trim() === '' || message.trim() === '') {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Gabim!',
                                            text: 'Ju lutemi plotësoni të gjitha fushat.',
                                            footer: '<a href="#">Kërkoni ndihmë?</a>'
                                        });
                                        return;
                                    }

                                    // Dërgimi i formës përmes AJAX-it
                                    $.ajax({
                                        type: 'POST',
                                        url: 'submit.php',
                                        data: $(this).serialize(),
                                        success: function(response) {
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Sukses!',
                                                text: 'Ju falënderojm për mesazhin tuaj. Ne do të kthehemi tek ju së shpejti.',
                                                showConfirmButton: false,
                                                timer: 5000,
                                                timerProgressBar: true,
                                                toast: true,
                                                position: 'top-end',
                                                showCloseButton: true,
                                                onClose: () => {
                                                    $('#contactForm')[0].reset();
                                                }
                                            });
                                        },
                                        error: function(xhr, status, error) {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Gabim!',
                                                text: 'Oops... Diçka shkoi keq. Ju lutemi provoni përsëri më vonë.',
                                                footer: '<a href="#">Kërkoni ndihmë?</a>'
                                            });
                                        }
                                    });
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <!-- Google Maps -->
                    <div class="map-area mb-100">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22236.40558254599!2d-118.25292394686001!3d34.057682914027104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2z4Kay4Ka4IOCmj-CmnuCnjeCmnOCnh-CmsuCnh-CmuCwg4KaV4KeN4Kav4Ka-4Kay4Ka_4Kar4KeL4Kaw4KeN4Kao4Ka_4Kav4Ka84Ka-LCDgpq7gpr7gprDgp43gppXgpr_gpqgg4Kav4KeB4KaV4KeN4Kak4Kaw4Ka-4Ka34KeN4Kaf4KeN4Kaw!5e0!3m2!1sbn!2sbd!4v1532328708137" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->
    <?php include("footer.php"); ?>
    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>