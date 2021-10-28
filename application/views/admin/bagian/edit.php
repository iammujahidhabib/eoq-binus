<div class="container-fluid">
    <div class="col-md-7 col-md-offset-2">
        <form class="form-horizontal" method="post" action="<?= site_url('admin/bagian/edit') ?>?id=<?= $_GET['id'] ?>">
            <?php

            if (empty($Bagian)) {
            } else {
                foreach ($Bagian as $key => $value) {
            ?>

                    <legend> Form Edit Bagian </legend>
                    <input type="hidden" name="id_bagian" value="<?php echo $value['id_bagian'] ?>">
                    <div class="form-group">
                        <label for="nama_bagian" class="col-md-2"> Nama Bagian </label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" id="nama_bagian" name="nama_bagian" value="<?php echo $value['nama_bagian']; ?>">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="col-md-7 col-md-offset-2">
                            <button type="submit" class="btn btn-primary">update</button>
                            <!-- <input type="submit" class="btn btn-md btn-primary" name="update" value="Update"> -->
                            <a class="btn btn-danger" href="index.php" role="button">Batal</a>

                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </form>
    </div>
</div>

<!-- akhir form -->