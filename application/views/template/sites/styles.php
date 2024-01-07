<!-- Bootstrap core CSS -->
<link href="<?= base_url('assets/sites/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Additional CSS Files -->
<link rel="stylesheet" href="<?= base_url('assets/sites/') ?>assets/css/fontawesome.css">
<link rel="stylesheet" href="<?= base_url('assets/sites/') ?>assets/css/templatemo-woox-travel.css">
<link rel="stylesheet" href="<?= base_url('assets/sites/') ?>assets/css/owl.css">
<link rel="stylesheet" href="<?= base_url('assets/sites/') ?>assets/css/animate.css">
<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
<link href="https://api.mapbox.com/mapbox-assembly/v1.3.0/assembly.min.css" rel="stylesheet" />
<link href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css" type="text/css" />
<script src="https://js.sentry-cdn.com/9c5feb5b248b49f79a585804c259febc.min.js" crossorigin="anonymous"></script>

<style>
    .color-main {
        background-color: #22c17f;
    }

    .background-header {
        background-color: #22c17f !important;
        height: 70px !important;
        position: fixed !important;
        top: 0 !important;
        left: 0;
        right: 0;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.15) !important;
        -webkit-transition: all .5s ease 0s;
        -moz-transition: all .5s ease 0s;
        -o-transition: all .5s ease 0s;
        transition: all .5s ease 0s;
    }

    .search-form #search-form {
        background-color: #22b3c1;
        border-bottom-left-radius: 2px;
        border-bottom-right-radius: 2px;
        padding: 15px 15px;
    }

    .mapboxgl-popup-content {
        position: relative;
        background: #ffff;
        border-radius: 3px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.10);
        padding: 10px 10px 15px;
        pointer-events: auto;
    }

    @media (max-width: 992px) {
        .header-area .main-nav .logo {
            position: absolute;
            left: -62px;
            top: 15px;
        }
    }
</style>

<script src="<?= base_url('assets/sites/') ?>vendor/jquery/jquery.min.js"></script>