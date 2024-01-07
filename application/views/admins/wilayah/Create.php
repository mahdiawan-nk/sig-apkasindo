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
                <form class="form-horizontal" method="POST" action="<?=base_url('admin/datawilayah/save')?>">
                    <div class="form-group row mb-3">
                        <label for="inputEmail3" class="col-3 col-form-label">Nama DPD Wilayah</label>
                        <div class="col-9">
                            <input type="text" class="form-control" name="nama_dpd" placeholder="nama wilayah" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="inputEmail3" class="col-3 col-form-label">Titik Lokasi</label>
                        <div class="col-9">
                            <input type="text" class="form-control" name="kordinat_wilayah" placeholder="nama wilayah" readonly required>
                            <div id="map"></div>
                        </div>
                    </div>
                    <div class="form-group mb-0 justify-content-end row">
                        <div class="col-9">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Simpan</button>
                            <a href="<?=base_url('admin/datawilayah')?>" class="btn btn-secondary waves-effect waves-light">Kembali</a>
                        </div>
                    </div>
                </form>
            </div> <!-- end card-body-->
        </div>
    </div>
</div>

<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiZGV2LWNvZGVycyIsImEiOiJja3l4YmM1YnQwZ3VrMndwOGFpcnhobGtpIn0.K-67FDARYgR7zEXLSbR4bg';
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/satellite-streets-v12',
        center: [101.45159911019914, 0.5262897773849602],
        zoom: 9,
    });
    const geocoder = new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        mapboxgl: mapboxgl
    });
    map.addControl(geocoder, 'top-right');
    var marker;
    map.on('click', function(e) {
        var coordinates = e.lngLat;
        if (marker) {
            marker.remove();
        }
        new mapboxgl.Popup()
            .setLngLat(coordinates)
            .setHTML(`<div class="alert alert-info" role="alert">
                ` + coordinates + ` 
                </div>`)
            .addTo(map);
        marker = new mapboxgl.Marker()
            .setLngLat([coordinates.lng, coordinates.lat])
            .addTo(map);
        $('[name="kordinat_wilayah"]').val(coordinates.lng+','+coordinates.lat)

    });
</script>