<div class="row">
    <div class="col-12">
        <div class="card">
            <form class="form-horizontal" method="POST" action="<?= base_url('admin/informasi/save') ?>">
                <div class="card-body">
                    <input type="hidden" name="id_" value="<?= $data ? $data->id_tentang : 0 ?>">
                    <textarea id="summernote" name="isi">
                    <?= $data ? $data->isi : '' ?>
                </textarea>
                </div> <!-- end card-body-->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                </div>
            </form>
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            tabsize: 2,
            height: 800
        });
    });
</script>