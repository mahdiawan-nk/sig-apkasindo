<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>GIS APKASINDO</title>
    <?php $this->load->view('template/sites/styles'); ?>

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <!-- <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div> -->
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <?php $this->load->view('template/sites/header'); ?>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <?php $this->load->view($halaman);?>
    <!-- ***** Main Banner Area End ***** -->


    <?php $this->load->view('template/sites/footer'); ?>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <?php $this->load->view('template/sites/javascript'); ?>

</body>

</html>