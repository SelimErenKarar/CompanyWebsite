<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo base_url(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?php echo $title; ?></title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="<?php echo base_url(); ?>../uploads/<?php echo $settings->favicon; ?>" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="<?php echo base_url(); ?>assets/js/plugin/webfont/webfont.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>

    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?php echo base_url(); ?>assets/css/fonts.min.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <script src="assets/js/core/jquery.3.2.1.min.js"></script>

    <script src="assets/js/sweetalert2.all.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/atlantis.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dropzone.css">
    <script src="assets/js/dropzone.js"></script>


    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/demo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/css/iziModal.min.css">

</head>
<body>


