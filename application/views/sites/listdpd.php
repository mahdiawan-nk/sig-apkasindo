<style>
    .map-container {
        position: relative;
        height: 100%;
        width: 100%;
        border-top-left-radius: 23px;
        border-bottom-left-radius: 23px
    }

    .map {
        position: relative;
        height: inherit;
        width: inherit;
    }
</style>
<div class="amazing-deals">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading text-center">
                    <h2>Daftar DPD Apkasindo Riau</h2>
                </div>
            </div>
            <?php foreach ($data as $item) : ?>
                <?php $item = (object)$item ?>
                <div class="col-lg-6 col-sm-6">
                    <div class="item">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="map-container image">
                                    <div id="map<?= $item->kode_wilayah ?>" class="map"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 align-self-center">
                                <div class="content">
                                    <h4><?= $item->nama_dpd ?></h4>
                                    <div class="row">
                                        <div class="col-12 d-flex flex-row">
                                            <i class="fa fa-location-dot p-2"></i>
                                            <span class="list fs-6 ">
                                                <?php $kordinat = explode(',', $item->kordinat_wilayah) ?>
                                                Lat :<?= $kordinat[0] ?><br>
                                                Lng : <?= $kordinat[1] ?>
                                            </span>
                                        </div>
                                        <div class="col-12 d-flex flex-row mt-2 mb-2">
                                            <i class="fa fa-map p-2"></i>
                                            <span class="list fs-6 ">
                                                <?= $item->alamat ?>
                                            </span>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="main-button">
                                        <a href="<?= base_url('maps?kode=' . $item->kode_wilayah) ?>">Lihat Map dan Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

<script>
    var titik, kordinat
    mapboxgl.accessToken = 'pk.eyJ1IjoiZGV2LWNvZGVycyIsImEiOiJja3l4YmM1YnQwZ3VrMndwOGFpcnhobGtpIn0.K-67FDARYgR7zEXLSbR4bg';
    <?php foreach ($data as $maps) : ?>
        <?php $maps = (object)$maps ?>
        titik = '<?= $maps->kordinat_wilayah ?>'
        titik = titik.split(',')
        let map<?= $maps->kode_wilayah ?> = new mapboxgl.Map({
            container: 'map<?= $maps->kode_wilayah ?>',
            style: 'mapbox://styles/mapbox/satellite-streets-v12',
            center: [parseFloat(titik[0]), parseFloat(titik[1])],
            zoom: 7,
        });

        new mapboxgl.Marker()
            .setLngLat([parseFloat(titik[0]), parseFloat(titik[1])])
            .addTo(map<?= $maps->kode_wilayah ?>);
    <?php endforeach ?>
</script>