<div class="container-fluid">
    <div class="row">
        <div class="col-md-7 col-md-offset-2">
            <a href="<?=site_url('gudang/pengambilan/add')?>"><input type="submit" class="btn btn-md btn-primary" name="Tambah Pengambilan" value="Tambah Pengambilan"></a></br>
        </div>
    </div>
</div>
<br>

<!-- Mulai Tabel -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-7 col-md-offset-2">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th> </th>
                        <th> Nama Pengambilan </th>
                        <th> Nama Barang </th>
                        <th> Jumlah Pengambilan </th>


                    </tr>
                    <tr>
                        <?php
                        foreach ($DaftarPengambilan as $key => $data) {
                        ?>
                            <td> <?php echo $key + 1 ?> </td>
                            <td> <?php echo $data["nama_pengambil"] ?> </td>
                            <td> <?php echo $data["nama_barang"] ?> </td>
                            <td> <?php echo $data["jumlah_pengambilan"] ?> </td>

                    </tr>
                <?php
                        }
                ?>
                </table>
            </div>
        </div>
    </div>
</div>