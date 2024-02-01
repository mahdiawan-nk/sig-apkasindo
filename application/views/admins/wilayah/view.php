<style>
    #map {
        position: relative;
        top: 0;
        bottom: 0;
        width: 100%;
        height: 400px;
    }
</style>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <a href="<?= base_url('admin/datawilayah/create') ?>" class="btn btn-primary waves-effect waves-light">Tambah Data</a>
                <hr>
                <div class="table-responsive">
                    <table class="table mb-0" id="data-table">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Nama DPD</th>
                                <th>Kordinat</th>
                                <th>Aalamat</th>
                                <th>ACT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $index => $item) : ?>
                                <tr>
                                    <th scope="row"><?= $index + 1 ?></th>
                                    <td><?= $item->nama_dpd ?></td>
                                    <td>
                                        <?php $kordinat = explode(',', $item->kordinat_wilayah) ?>
                                        Lat :<?= $kordinat[0] ?><br>
                                        Lng : <?= $kordinat[1] ?>
                                    </td>
                                    <td><?= $item->alamat ?></td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                            <button type="button" class="btn btn-dark waves-effect waves-light" onclick="previewMaps('<?= $item->nama_dpd ?>','<?= $item->kordinat_wilayah ?>')">Lihat</button>
                                            <a href="<?= base_url('admin/datawilayah/edit/' . $item->id_dpd) ?>" class="btn btn-warning waves-effect waves-light">Edit</a>
                                            <button class="btn btn-danger waves-effect waves-light" onclick="deleted('<?= base_url('admin/datawilayah/delete/' . $item->id_dpd) ?>')">Hapus</button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- end card-body-->
        </div>
        <!-- end card -->

    </div>
    <!-- end col -->
</div>
<div class="modal fade bd-example-modal-xl" id="preview-maps" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="myExtraLargeModalLabel">Preview Maps Lokasi DPD <span id="text-name"></span></h5>
                <button type="button" class="close waves-effect waves-light close-map" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="map"></div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#data-table').DataTable();

    function deleted(args) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then(function(result) {
            if (result.value) {
                window.location.href = args
            }
        });
    }
</script>
<script>
    var map, nameDpd, titik, marker;

    function previewMaps(name, kordinats) {
        nameDpd = name
        kordinats = kordinats.split(',')
        titik = kordinats
        $('#text-name').text(name)
        $('.bd-example-modal-xl').modal('show')
    }
    $('.bd-example-modal-xl').on('shown.bs.modal', function() {
        mapboxgl.accessToken = 'pk.eyJ1IjoiZGV2LWNvZGVycyIsImEiOiJja3l4YmM1YnQwZ3VrMndwOGFpcnhobGtpIn0.K-67FDARYgR7zEXLSbR4bg';
        map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/satellite-streets-v12',
            center: [parseFloat(titik[0]), parseFloat(titik[1])],
            zoom: 9,
        });
        const geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl
        });
        map.addControl(geocoder, 'top-right');
        marker = new mapboxgl.Marker()
            .setLngLat([parseFloat(titik[0]), parseFloat(titik[1])])
            .addTo(map);
        map.resize();

    })

    $('.bd-example-modal-xl').on('hidden.bs.modal', function(e) {
        map.remove()
    })
</script>