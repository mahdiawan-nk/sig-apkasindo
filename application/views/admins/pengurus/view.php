<style>
    tr.group,
    tr.group:hover {
        background-color: blanchedalmond !important;
        text-align: left;
        font-size: 18px;
        font-weight: bold;
    }
</style>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#add">Tambah Data</button>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped mb-0 table-sm" id="data-table">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Nama DPD</th>
                                <th>Nama Pengurus</th>
                                <th>Keterangan</th>
                                <th>ACT</th>
                            </tr>
                        </thead>
                        <tbody>

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

<div class="modal fade" id="add" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/datapengurus/save') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Wilayah DPD</label>
                        <select name="id_dpd" class="form-control">
                            <option value="">Pilih Wilayah DPD</option>
                            <?php foreach ($dpd_wilayah as $key => $list) : ?>
                                <option value="<?= $list->id_dpd ?>"><?= $list->nama_dpd ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <!-- <div class="form-group">
                        <label>No HP</label>
                        <input type="text" class="form-control" name="no_kta">
                    </div> -->
                    <div class="form-group">
                        <label class="d-block">Posisi</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="ketua" name="jenis" class="custom-control-input" value="Ketua">
                            <label class="custom-control-label" for="ketua">Ketua</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="sekretaris" name="jenis" class="custom-control-input" value="Sekretaris">
                            <label class="custom-control-label" for="sekretaris">Sekretaris</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="bendahara" name="jenis" class="custom-control-input" value="Bendahara">
                            <label class="custom-control-label" for="bendahara">Bendahara</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/datapengurus/update/') ?>" method="POST" id="form-edit">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Wilayah DPD</label>
                        <select name="id_dpd" id="id_dpd" class="form-control">
                            <option value="">Pilih Wilayah DPD</option>
                            <?php foreach ($dpd_wilayah as $key => $list) : ?>
                                <option value="<?= $list->id_dpd ?>"><?= $list->nama_dpd ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                    </div>
                    <!-- <div class="form-group">
                        <label>No HP</label>
                        <input type="text" class="form-control" name="no_hp" id="no_hp">
                    </div> -->
                    <div class="form-group">
                        <label class="d-block">Posisi</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="e-ketua" name="jenis" class="custom-control-input" value="Ketua">
                            <label class="custom-control-label" for="e-ketua">Ketua</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="e-sekretaris" name="jenis" class="custom-control-input" value="Sekretaris">
                            <label class="custom-control-label" for="e-sekretaris">Sekretaris</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="e-bendahara" name="jenis" class="custom-control-input" value="Bendahara">
                            <label class="custom-control-label" for="e-bendahara">Bendahara</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var groupColumn = 1;
    var table = $('#data-table').DataTable({
        dom: 'Plfrtip',
        ajax: {
            url: '<?= base_url('admin/datapengurus/jsondata') ?>',
            type: "GET",
            dataSrc: "",
        },
        columns: [{
                render: function(data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            {
                data: 'nama_dpd'
            },
            {
                data: 'nama'
            },
            {
                data: 'jenis'
            },
            {
                data: {
                    id_keanggotaan: 'id_struktural'
                },
                render: function(d) {
                    return `<button class="btn btn-secondary waves-effect waves-light btn-sm edit">Edit</button>
                                        <button class="btn btn-danger waves-effect waves-light btn-sm hapus">Hapus</button>`
                }
            }
        ],
        deferRender: true,
        columnDefs: [{
            visible: false,
            targets: groupColumn
        }, ],
        displayLength: 10,
        drawCallback: function(settings) {
            var api = this.api();
            var rows = api.rows({
                page: 'current'
            }).nodes();
            var last = null;

            api.column(groupColumn, {
                    page: 'current'
                })
                .data()
                .each(function(group, i) {
                    if (last !== group) {
                        $(rows)
                            .eq(i)
                            .before(
                                '<tr class="group"><td colspan="6">' +
                                group +
                                '</td></tr>'
                            );

                        last = group;
                    }
                });
        }
    });

    $('#data-table').on('click', '.edit', function() {
        let data = table.row($(this).parents('tr')).data()
        $('form#form-edit').attr('action', '<?= base_url('admin/datapengurus/update/') ?>' + data.id_struktural)
        $('#id_dpd').val(data.id_dpd);
        $('#nama').val(data.nama);
        $('#no_hp').val(data.no_hp)
        $('input[name="jenis"][value="' + data.jenis + '"]').val(data.jenis).prop('checked', true);
        $('#edit').modal('show')
    });

    $('#data-table').on('click', '.hapus', function() {
        let data = table.row($(this).parents('tr')).data()
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
                window.location.href = `<?= base_url('admin/datapengurus/delete/') ?>${data.id_struktural}`
            }
        });
    });
</script>