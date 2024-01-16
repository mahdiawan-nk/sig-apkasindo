<style>
    .map-container {
        position: relative;
        height: 35em;
        width: 100%;
        border-top-left-radius: 23px;
        border-bottom-left-radius: 23px
    }

    .map {
        position: relative;
        height: inherit;
        width: inherit;
    }

    @media only screen and (max-width: 768px) {

        /* For mobile phones: */
        .map-container {
            position: relative;
            height: 15em;
            width: 100%;
            border-top-left-radius: 23px;
            border-bottom-left-radius: 23px
        }

        .map {
            position: relative;
            height: inherit;
            width: inherit;
        }

    }
</style>
<div class="reservation-form">
    <div class="container">
        <div class="row">
            <!-- <div class="col-lg-12">
                <div class="map-container">
                    <div id="map" class="map"></div>
                </div>
            </div> -->
            <div class="col-lg-12">
                <form id="reservation-form" name="gs" method="submit" role="search" action="#">
                    <?php foreach ($data as $maps) : ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Informasi DPD <?= $maps->nama_dpd ?></h4>
                            </div>
                            <div class="col-lg-12">
                                <div class="card">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">kordinat : <br>
                                            <?php $kordinat = explode(',', $maps->kordinat_wilayah); ?>
                                            Lat : <?= $kordinat[1] ?><br>
                                            Lng : <?= $kordinat[0] ?>
                                        </li>
                                        <?php foreach ($maps->struktural as $str) : ?>
                                            <li class="list-group-item" <?= $str->jenis == 'Ketua' ? '' : 'hidden' ?>>Ketua : <br><?= $str->nama ?> </li>
                                            <li class="list-group-item" <?= $str->jenis == 'Sekretaris' ? '' : 'hidden' ?>>Sekretaris : <br><?= $str->nama ?></li>
                                            <li class="list-group-item" <?= $str->jenis == 'Bendahara' ? '' : 'hidden' ?>>Bendahara : <br><?= $str->nama ?></li>
                                        <?php endforeach ?>
                                    </ul>
                                    <div class="card-footer">
                                        Jumlah Anggota : <?= $maps->jmlanggota ?> <br>
                                        Alamat : <?= $maps->alamat ?>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Tabel Informasi Lahan</h5>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2">#</th>
                                                    <th rowspan="2">Tahun</th>
                                                    <th colspan="3">Luas Areal</th>
                                                    <th rowspan="2">Total</th>
                                                </tr>
                                                <tr>
                                                    <th>TBM</th>
                                                    <th>TM</th>
                                                    <th>TTR</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($lahan as $index=>$lh): ?>
                                                <tr>
                                                    <th scope="row"><?=$index+1?></th>
                                                    <td><?=$lh->tahun?></td>
                                                    <td><?=$lh->tbm?></td>
                                                    <td><?=$lh->tm?></td>
                                                    <td><?=$lh->ttr?></td>
                                                    <td><?=$lh->luas_lahan?></td>
                                                </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php endforeach ?>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiZGV2LWNvZGVycyIsImEiOiJja3l4YmM1YnQwZ3VrMndwOGFpcnhobGtpIn0.K-67FDARYgR7zEXLSbR4bg';
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/satellite-streets-v12',
        center: [101.45159911019914, 0.5262897773849602],
        zoom: 7,
    });

    const geocoder = new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        mapboxgl: mapboxgl
    });
</script>