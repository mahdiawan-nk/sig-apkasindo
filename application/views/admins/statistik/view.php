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
                <a href="#" data-toggle="modal" data-target="#add" class="btn btn-primary waves-effect waves-light">Tambah Data</a>
                <hr>
                <div class="table-responsive">
                    <table class="table mb-0" id="data-table">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Nama DPD</th>
                                <th>Tahun</th>
                                <th>TBM</th>
                                <th>TM</th>
                                <th>TTR</th>
                                <th>Luas Lahan</th>
                                <th>ACT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $index => $item) : ?>
                                <tr>
                                    <th scope="row"><?= $index + 1 ?></th>
                                    <td><?= $item->nama_dpd ?></td>
                                    <td><?= $item->tahun ?></td>
                                    <td><?= $item->tbm ?></td>
                                    <td><?= $item->tm ?></td>
                                    <td><?= $item->ttr ?></td>
                                    <td><?= $item->luas_lahan ?></td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                            <a href="#" class="btn btn-warning waves-effect waves-light" data-toggle="modal" data-target="#edit<?= $item->id_luaslahan ?>">Edit</a>
                                            <button class="btn btn-danger waves-effect waves-light" onclick="deleted('<?= base_url('admin/datakebun/delete/' . $item->id_luaslahan) ?>')">Hapus</button>
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
<div class="modal fade" id="add" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/datakebun/save') ?>" method="POST" id="form-add">
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
                        <label>Tahun</label>
                        <input type="text" class="form-control" name="tahun">
                    </div>
                    <div class="form-group">
                        <label>Luas Lahan TBM</label>
                        <input type="text" class="form-control count" name="tbm" id="tbm">
                    </div>
                    <div class="form-group">
                        <label>Luas Lahan TM</label>
                        <input type="text" class="form-control count" name="tm" id="tm">
                    </div>
                    <div class="form-group">
                        <label>Luas Lahan TTR</label>
                        <input type="text" class="form-control count" name="ttr" id="ttr">
                    </div>
                    <div class="form-group">
                        <label>Luas Lahan</label>
                        <input type="text" class="form-control total" name="luas_lahan">
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
<?php foreach ($data as $index => $item) : ?>
    <div class="modal fade" id="edit<?= $item->id_luaslahan ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add">Ubah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/datakebun/save/' . $item->id_luaslahan) ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Wilayah DPD</label>
                            <select name="id_dpd" class="form-control">
                                <option value="">Pilih Wilayah DPD</option>
                                <?php foreach ($dpd_wilayah as $key => $list) : ?>
                                    <option value="<?= $list->id_dpd ?>" <?= $list->id_dpd == $item->id_dpd ? 'selected' : '' ?>><?= $list->nama_dpd ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tahun</label>
                            <input type="text" class="form-control" name="tahun" value="<?= $item->tahun ?>">
                        </div>
                        <div class="form-group">
                            <label>Luas Lahan TBM</label>
                            <input type="text" class="form-control ecount" name="tbm" value="<?= $item->tbm ?>" id="etbm">
                        </div>
                        <div class="form-group">
                            <label>Luas Lahan TM</label>
                            <input type="text" class="form-control ecount" name="tm" value="<?= $item->tm ?>" id="etm">
                        </div>
                        <div class="form-group">
                            <label>Luas Lahan TTR</label>
                            <input type="text" class="form-control ecount" name="ttr" value="<?= $item->ttr ?>" id="ettr">
                        </div>
                        <div class="form-group">
                            <label>Luas Lahan</label>
                            <input type="text" class="form-control etotal" name="luas_lahan" value="<?= $item->luas_lahan ?>">
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
<?php endforeach ?>
<script>
    $('#data-table').DataTable();
    $('add').on('show.bs.modal',function(){
        $('form#form-add')[0].reset();
    })
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
    // $(function() {
    //     $(".count").on("keyup", function() {
    //         // Mengambil nilai dari ketiga input
    //         var sum=0
    //         var value1 = parseFloat($("#tbm").val()) || 0;
    //         var value2 = parseFloat($("#tm").val()) || 0;
    //         var value3 = parseFloat($("#ttr").val()) || 0;

    //         // Menghitung jumlah dari ketiga input
    //         sum = value1 + value2 + value3;

    //         // Menampilkan hasil pada elemen dengan id "sum"
    //         $(".total").val(sum);
    //     });
    //     $(".ecount").on("keyup", function() {
    //         var esum=0
    //         var evalue1 = parseFloat($("#etbm").val()) || 0;
    //         var evalue2 = parseFloat($("#etm").val()) || 0;
    //         var evalue3 = parseFloat($("#ettr").val()) || 0;

    //         // Menghitung jumlah dari ketiga input
    //         esum = evalue1 + evalue2 + evalue3;

    //         // Menampilkan hasil pada elemen dengan id "sum"
    //         // $(".etotal").val(esum);
    //         console.log(esum)
    //     });
    // });
</script>