<!-- mulai form -->
<div class="container-fluid">
    <div class="col-md-7 col-md-offset-2">
        <form class="form-horizontal" method="post" action="<?=site_url('admin/bagian/add')?>">
            <legend> Form Input Bagian </legend>
            <div class="form-group">
                <label for="nama_bagian" class="col-md-2"> Nama Bagian </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" id="nama_bagian" placeholder="nama bagian" name="nama_bagian">
                </div>
            </div>
            <br>
            <div class="form-group">
                <div class="col-md-7 col-md-offset-2">

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a class="btn btn-danger" href="<?=site_url('admin/bagian')?>" role="button">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- akhir form -->