<style>
    #map {
        position: absolute;
        top: 0;
        bottom: 0;
        width: 100%;
    }

    #map {
        position: fixed;
        width: 80%;
        top: 9%;
    }

    #features {
        width: 20%;
        margin-left: 80%;
        font-family: sans-serif;
        overflow-y: scroll;
        background-color: #fafafa;
        max-height: 75vh;
    }

    #features-search {
        width: 20%;
        margin-left: 80%;
        font-family: sans-serif;
        background-color: #fafafa;
    }

    div.listed {
        padding: 25px 5px;
        line-height: 25px;
        border-bottom: 1px solid #ddd;
        opacity: 0.25;
        font-size: 13px;
    }

    div.active {
        opacity: 1;
    }

    div.listed:last-child {
        border-bottom: none;
        margin-bottom: 350px;
    }

    #menu {
        position: fixed;
        background: #efefef;
        padding: 5px;
        font-family: 'Open Sans', sans-serif;
        z-index: 999;
        top: 4.4rem;
    }

    .marker {
        background-image: url('<?= base_url('assets/location.png') ?>');
        background-size: cover;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        cursor: pointer;
    }

    @media only screen and (max-width: 768px) {

        /* For mobile phones: */
        #map {
            position: fixed;
            width: 100%;
            top: 18%;
        }

        #menu {
            width: 100%;
            position: fixed;
            background: #efefef;
            padding: 5px;
            font-family: 'Open Sans', sans-serif;
            z-index: 1;
            top: 14%;
        }

        #features {
            display: none;
        }

        #features-search {
            display: none;
        }
    }
</style>
<div class="page-heading" style="background-image:none;padding: 0px 0px 70px 0px;">
</div>
<div class="search-form" id="features-search">
    <div>
        <form id="search-form" name="gs" method="submit" role="search" action="#">
            <div class="row">
                <div class="col-lg-12">
                    <label for="">Filter By</label>
                </div>
                <div class="col-lg-12">

                    <select name="Location" class="form-select" aria-label="Default select example" id="dpd-wilayah">
                        <option selected="" value="">Wilayah DPD</option>
                        <?php foreach ($data as $dpd) : ?>
                            <option value="<?= $dpd->kordinat_wilayah ?>,<?= $dpd->id_dpd ?>"><?= $dpd->nama_dpd ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="amazing-deals mt-0">
    <div class="container-fluid p-0">
        <div id="map"></div>
        <div id="menu">
            <input id="satellite-streets-v12" type="radio" name="rtoggle" value="satellite" checked="checked">
            <label for="satellite-streets-v12">satellite streets</label>
            <input id="light-v11" type="radio" name="rtoggle" value="light">
            <label for="light-v11">light</label>
            <input id="dark-v11" type="radio" name="rtoggle" value="dark">
            <label for="dark-v11">dark</label>
            <input id="streets-v12" type="radio" name="rtoggle" value="streets">
            <label for="streets-v12">streets</label>
            <input id="outdoors-v12" type="radio" name="rtoggle" value="outdoors">
            <label for="outdoors-v12">outdoors</label>
        </div>
        <div id="features" onscroll="myFunction()">
            <?php foreach ($data as $no => $maps) : ?>
                <div class="listed <?= $no == 0 ? 'active' : '' ?>" id="dpd-<?= $maps->id_dpd ?>">
                    <div class="card border border-info">
                        <h4 class="card-header"><?= $maps->nama_dpd ?></h4>
                        <ul class="list-group list-group-flush">
                            <?php foreach ($maps->struktural as $str) : ?>
                                <li class="list-group-item" <?= $str->jenis == 'Ketua' ? '' : 'hidden' ?>>Ketua : <br><?= $str->nama ?></li>
                                <li class="list-group-item" <?= $str->jenis == 'Sekretaris' ? '' : 'hidden' ?>>Sekretaris : <br><?= $str->nama ?></li>
                                <li class="list-group-item" <?= $str->jenis == 'Bendahara' ? '' : 'hidden' ?>>Bendahara : <br><?= $str->nama ?></li>
                            <?php endforeach ?>
                        </ul>
                        <div class="card-footer">
                            Jumlah Anggota : <?= $maps->jmlanggota ?> <br>
                            Alamat : <?= $maps->alamat ?>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
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
    map.addControl(geocoder, 'top-right');

    const layerList = document.getElementById('menu');
    const inputs = layerList.getElementsByTagName('input');

    for (const input of inputs) {
        input.onclick = (layer) => {
            const layerId = layer.target.id;
            map.setStyle('mapbox://styles/mapbox/' + layerId);
        };
    }
    let regency = []
    <?php foreach ($data as $item) : ?>
        regency.push(<?= $item->kode_wilayah ?>)
    <?php endforeach ?>
    const colors = [
        "#FF0000", // Merah
        "#00FF00", // Hijau
        "#0000FF", // Biru
        "#FFFF00", // Kuning
        "#FF00FF", // Ungu
        "#00FFFF", // Cyan
        "#FFA500", // Oranye
        "#800080", // Ungu tua
        "#008000", // Hijau tua
        "#008080", // Biru-hijau
        "#800025" // Merah tua
    ];
    regency.forEach((kode, i) => {
        $.ajax({
            url: '<?= base_url('maps/proxy') ?>',
            method: 'GET',
            data: {
                url: `https://seta.silaper.com/assets/wilayah-indonesia-master/data/geojson/regency/${kode}.geojson`
            },
            success: function(data) {
                map.addSource('riau' + i, {
                    'type': 'geojson',
                    'data': data.features[0]
                });

                // Add a new layer to visualize the polygon.
                map.addLayer({
                    'id': 'riau' + i,
                    'type': 'fill',
                    'source': 'riau' + i, // reference the data source
                    'layout': {},
                    'paint': {
                        'fill-color': colors[i], // blue color fill
                        'fill-opacity': 0.5
                    }
                });
                // Add a black outline around the polygon.
                map.addLayer({
                    'id': 'outline' + i,
                    'type': 'line',
                    'source': 'riau' + i,
                    'layout': {},
                    'paint': {
                        'line-color': '#fff',
                        'line-width': 1
                    }
                });

            },
            error: function(xhr, status, error) {
                console.error(error); // Menangani kesalahan jika terjadi
            }
        });
    });




    const chapters = {};

    var nameDpd = []
    var kordinat = []
    var titik;

    <?php foreach ($data as $keys => $list) : ?>
        titik = '<?= $list->kordinat_wilayah ?>'
        titik = titik.split(',')
        nameDpd.push('dpd-<?= $list->id_dpd ?>')
        kordinat['<?= $keys ?>'] = [parseFloat(titik[0]), parseFloat(titik[1])]
    <?php endforeach ?>
    nameDpd.forEach((item, index) => {
        chapters[item] = {
            speed: 0.2,
            curve: 2,
            bearing: 50,
            center: kordinat[index],
            zoom: 10,
            pitch: 50
        }
    })


    var marker, kordinats, popup, elmt;
    let li = ''
    <?php foreach ($data as $list) : ?>
        popup = new mapboxgl.Popup()
            .setHTML(`
                    <div class="card border-success mb-3">
                        <div class="card-header bg-transparent border-success text-center">` + '<?= $list->nama_dpd ?>' + `</div>
                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Jumlah Anggota : ` + '<?= $list->jmlanggota ?>' + `</li>
                                    <li class="list-group-item">Alamat : ` + '<?= $list->alamat ?>' + `</li>
                                </ul>
                            </div>
                            <div class="card-footer">
                                <a href="<?=base_url('maps?kode='.$list->kode_wilayah)?>">Lihat Selengkapnya</a>                            
                            </div>
                    </div>`);
        elmt = document.createElement('div');
        elmt.className = 'marker';
        kordinats = '<?= $list->kordinat_wilayah ?>'
        kordinats = kordinats.split(',')
        elmt.setAttribute('data-id', '<?= $list->id_dpd ?>')
        elmt.setAttribute('data-kor', kordinats)
        marker = new mapboxgl.Marker(elmt)
            .setLngLat([parseFloat(kordinats[0]), parseFloat(kordinats[1])])
            .setPopup(popup)
            .addTo(map);

    <?php endforeach ?>
    $('.marker').click(function(e) {
        e.preventDefault();
        let id = $(this).data('id')
        let kordinat = $(this).data('kor')
        kordinat = kordinat.split(',')
        kordinat = [parseFloat(kordinat[0]), parseFloat(kordinat[1])]
        setActiveChapter('dpd-' + id)
        const elm = document.getElementById('dpd-' + id)
        elm.scrollIntoView()
        map.flyTo({
            center: kordinat,
            zoom: 10,
            speed: 1,
            curve: 3,
            easing(t) {
                return t;
            }
        })

    });
    let activeChapterName = 'dpd-1';

    function setActiveChapter(chapterName) {
        if (chapterName === activeChapterName) return;

        map.flyTo(chapters[chapterName]);

        document.getElementById(chapterName).classList.add('active');
        document.getElementById(activeChapterName).classList.remove('active');

        activeChapterName = chapterName;
    }

    function isElementInViewport(el) {
        const rect = el.getBoundingClientRect();
        return (
            rect.top >= -40 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) + 100
        );
    }
    $('#dpd-wilayah').change(function(e) {
        e.preventDefault();
        let id;
        let kor = $(this).val();
        if (kor != '') {
            kor = kor.split(',')
            id = kor[2]
            kor = [parseFloat(kor[0]), parseFloat(kor[1])]
            setActiveChapter('dpd-' + id)
            const elm = document.getElementById('dpd-' + id)
            elm.scrollIntoView()
            map.flyTo({
                center: kor,
                zoom: 10,
                speed: 1,
                curve: 2,
                easing(t) {
                    return t;
                }
            })
        } else {
            setActiveChapter('dpd-1')
            const elm = document.getElementById('dpd-1')
            elm.scrollIntoView()
            map.flyTo({
                center: [101.45159911019914, 0.5262897773849602],
                zoom: 12,
                speed: 1,
                curve: 3,
                easing(t) {
                    return t;
                }
            })
        }


    });

    function myFunction() {
        const chaptersList = Object.keys(chapters);
        let found = false;

        for (let i = 0; i < chaptersList.length; i++) {
            const chapterName = chaptersList[i];
            const element = document.getElementById(chapterName);

            if (isElementInViewport(element)) {
                setActiveChapter(chapterName);
                found = true;
                break;
            }
        }

        // Jika tidak ada elemen yang ditemukan, maka aktifkan elemen terakhir
        if (!found && chaptersList.length > 0) {
            const lastChapterName = chaptersList[chaptersList.length - 1];
            setActiveChapter(lastChapterName);
        }
    }

    // create New Marker Onclik Maps
    // map.on('click', function(e) {
    //     setActiveChapter('dpd-1')
    //     const elm = document.getElementById('dpd-1')
    //     elm.scrollIntoView()
    //     map.flyTo({
    //         center: [101.45159911019914, 0.5262897773849602],
    //         zoom: 7,
    //         speed: 1,
    //         curve: 3,
    //         easing(t) {
    //             return t;
    //         }
    //     })
    // });
</script>