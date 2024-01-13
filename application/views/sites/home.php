<style>
    #section-1 .content-slider .slider #top-banner-1 {
        background: url(<?= base_url('assets/sites/assets/images/sawit.jpg') ?>) no-repeat center center;
        background-size: cover;
    }

    #section-1 .content-slider .slider #top-banner-2 {
        background: url(<?= base_url('assets/sites/assets/images/bg-1.jpg') ?>) no-repeat center center;
        background-size: auto;
    }

    #section-1 .content-slider .slider #top-banner-3 {
        background: url(<?= base_url('assets/sites/assets/images/bg-2.jpg') ?>) no-repeat center center;
        background-size: auto;
    }

    #section-1 .content-slider .slider #top-banner-4 {
        background: url(<?= base_url('assets/sites/assets/images/bg-3.jpg') ?>) no-repeat center center;
        background-size: cover;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        /* Adjust the overlay color and opacity (rgba) */
    }

    .overlay-content {
        width: 100%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }
</style>
<!-- ***** Main Banner Area Start ***** -->
<section id="section-1">
    <div class="content-slider">
        <input type="radio" id="banner1" class="sec-1-input" name="banner" checked>
        <input type="radio" id="banner2" class="sec-1-input" name="banner">
        <input type="radio" id="banner3" class="sec-1-input" name="banner">
        <input type="radio" id="banner4" class="sec-1-input" name="banner">
        <div class="slider">
            <div id="top-banner-1" class="banner">
                <div class="overlay"></div>
                <div class="banner-inner-wrapper header-text overlay-content">
                    <div class="main-caption">
                        <h2>selamat Datang Di Sistem Pemetaan Apkasindo </h2>
                        <h1>Region Riau</h1>
                        <div class="border-button"><a href="<?= base_url('maps') ?>">Go Maps</a></div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="more-info">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-6 col-6">
                                            <i class="fa fa-user"></i>
                                            <h4><span>Anggota:</span><br><?= $jmlanggota ?></h4>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 col-6">
                                            <i class="fa fa-globe"></i>
                                            <h4><span>Wilayah:</span><br><?= $jmldpd ?></h4>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 col-12 d-flex justify-content-center">
                                            <i class="fa fa-users"></i>
                                            <h4><span>Pengurus:</span><br><?= $jmlstruktur ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="top-banner-2" class="banner">
                <div class="overlay"></div>
                <div class="banner-inner-wrapper header-text overlay-content">
                    <div class="main-caption">
                        <h2>selamat Datang Di Sistem Pemetaan Apkasindo </h2>
                        <h1>Region Riau</h1>
                        <div class="border-button"><a href="<?= base_url('maps') ?>">Go Maps</a></div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="more-info">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-6 col-6">
                                            <i class="fa fa-user"></i>
                                            <h4><span>Anggota:</span><br><?= $jmlanggota ?></h4>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 col-6">
                                            <i class="fa fa-globe"></i>
                                            <h4><span>Wilayah:</span><br><?= $jmldpd ?></h4>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 col-12 d-flex justify-content-center">
                                            <i class="fa fa-users"></i>
                                            <h4><span>Pengurus:</span><br><?= $jmlstruktur ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="top-banner-3" class="banner">
                <div class="overlay"></div>
                <div class="banner-inner-wrapper header-text overlay-content">
                    <div class="main-caption">
                        <h2>selamat Datang Di Sistem Pemetaan Apkasindo </h2>
                        <h1>Region Riau</h1>
                        <div class="border-button"><a href="<?= base_url('maps') ?>">Go Maps</a></div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="more-info">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-6 col-6">
                                            <i class="fa fa-user"></i>
                                            <h4><span>Anggota:</span><br><?= $jmlanggota ?></h4>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 col-6">
                                            <i class="fa fa-globe"></i>
                                            <h4><span>Wilayah:</span><br><?= $jmldpd ?></h4>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 col-12 d-flex justify-content-center">
                                            <i class="fa fa-users"></i>
                                            <h4><span>Pengurus:</span><br><?= $jmlstruktur ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="top-banner-4" class="banner">
                <div class="overlay"></div>
                <div class="banner-inner-wrapper header-text overlay-content">
                    <div class="main-caption">
                        <h2>selamat Datang Di Sistem Pemetaan Apkasindo </h2>
                        <h1>Region Riau</h1>
                        <div class="border-button"><a href="<?= base_url('maps') ?>">Go Maps</a></div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="more-info">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-6 col-6">
                                            <i class="fa fa-user"></i>
                                            <h4><span>Anggota:</span><br><?= $jmlanggota ?></h4>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 col-6">
                                            <i class="fa fa-globe"></i>
                                            <h4><span>Wilayah:</span><br><?= $jmldpd ?></h4>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 col-12 d-flex justify-content-center">
                                            <i class="fa fa-users"></i>
                                            <h4><span>Pengurus:</span><br><?= $jmlstruktur ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="controls">
                <label for="banner1"><span class="progressbar"><span class="progressbar-fill"></span></span><span class="text">1</span></label>
                <label for="banner2"><span class="progressbar"><span class="progressbar-fill"></span></span><span class="text">2</span></label>
                <label for="banner3"><span class="progressbar"><span class="progressbar-fill"></span></span><span class="text">3</span></label>
                <label for="banner4"><span class="progressbar"><span class="progressbar-fill"></span></span><span class="text">4</span></label>
            </div>
        </nav>
    </div>
</section>
<!-- ***** Main Banner Area End ***** -->
<!-- <section id="section-1">
    <div class="content-slider">
        <input type="radio" id="banner1" class="sec-1-input" name="banner" checked>
        <div class="slider">
            <div id="top-banner-1" class="banner">
                <div class="banner-inner-wrapper header-text">
                    <div class="main-caption">
                        <h2>selamat Datang Di Sistem Pemetaan Apkasindi </h2>
                        <h1>Region Riau</h1>
                        <div class="border-button"><a href="<?= base_url('maps') ?>">Go Maps</a></div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="more-info">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-6 col-6">
                                            <i class="fa fa-user"></i>
                                            <h4><span>Anggota:</span><br><?= $jmlanggota ?></h4>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 col-6">
                                            <i class="fa fa-globe"></i>
                                            <h4><span>Wilayah:</span><br><?= $jmldpd ?></h4>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 col-12 d-flex justify-content-center">
                                            <i class="fa fa-users"></i>
                                            <h4><span>Pengurus:</span><br><?= $jmlstruktur ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<div class="visit-country">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <?= $tentang ?>
                </div>
            </div>
        </div>
    </div>
</div>