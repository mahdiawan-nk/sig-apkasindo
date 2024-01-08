<div class="amazing-deals">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading text-center">
                    <h2>Statistik Perkebunan</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                </div>
            </div>
            <div class="col-lg-12 col-sm-12">
                <div class="item">
                    <div class="row">
                        <div class="col-lg-12 align-self-center ">
                            <div class="content p-2">
                                <h4>Grapik</h4>
                                <div class="row">
                                    <div class="col-12">
                                        <div id="chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-sm-12">
                <div class="item">
                    <div class="row">
                        <div class="col-lg-12 align-self-center ">
                            <div class="content p-2">
                                <h4>Tabel Statistik Luas Lahan</h4>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table mb-0" id="data-table">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Nama DPD</th>
                                                        <th>Tahun</th>
                                                        <th>Luas Lahan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($data as $index => $item) : ?>
                                                        <tr>
                                                            <td><?= $item->nama_dpd ?></td>
                                                            <td><?= $item->tahun ?></td>
                                                            <td><?= $item->luas_lahan ?></td>
                                                        </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                            </table>
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
</div>

<script>
    var dataJson = JSON.parse(JSON.stringify(<?= $chart ?>))
    $('#data-table').DataTable({
        order: [
            [1, 'asc']
        ],
        rowGroup: {
            dataSrc: 1
        }
    });
    var dataSeries = []
    var dataTahun = []

    dataJson.datatahun.forEach(years => {
        dataTahun.push(years.tahun)
    })
    dataJson.datachart.forEach(item => {
        var dataChart = []
        item.data.forEach(data => {
            dataChart.push(data.luas_lahan)
        })
        dataSeries.push({
            name: item.name,
            data: dataChart
        })
    });
    // console.log(dataChart)
    // Data statistik luas perkebunan per tahun
    var options = {
        series: dataSeries,
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: dataTahun,
        },
        yaxis: {
            title: {
                text: 'Luas Lahan'
            }
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return val + " Ha"
                }
            }
        }
    };

    // Inisialisasi grafik menggunakan konfigurasi di atas
    const chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
    // document.querySelector("#chart").style.width = (years.length * 100) + 'px';
</script>