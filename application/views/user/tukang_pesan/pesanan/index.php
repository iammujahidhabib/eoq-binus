<div class="container-fluid">
    <div class="row">
        <div class="col-md-7 col-md-offset-2">
            <a href="<?=site_url('tukang_pesan/pesanan/add')?>"><input type="submit" class="btn btn-md btn-primary" name="Tambah Bagian" value="Tambah Pesanan"></a></br>
        </div>
    </div>
</div>
<br>
<!-- Mulai Tabel -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th> </th>
                        <th> Nama Supplier </th>
                        <th> Nama Barang </th>
                        <th> Pesan Barang </th>
                        <th> Satuan </th>
                        <th> Jumlah Total </th>
                        <th> Waktu Tunggu </th>
                        <th> Pemakaian Barang </th>
                        <th> Pakai Barang </th>
                    </tr>
                    <tr>
                        <?php
                        foreach ($DaftarPesanan as $key => $data) {
                        ?>
                            <td> <?php echo $key + 1 ?> </td>
                            <td> <?php echo $data["nama_pemesan"] ?> </td>
                            <td> <?php echo $data["nama_barang"] ?> </td>
                            <td align="center"> <?php echo $data["jumlah_pesanan"] ?> </td>
                            <td align="center"> <?php echo $data["satuan"] ?> </td>
                            <td align="center"> <?php echo $data["jumlah_total"] ?> </td>
                            <td align="center"> <?php echo $data["lead_time"] ?> </td>
                            <td align="center"> <?php echo $data["pakai"] ?> </td>
                            <td>
                                <a href="<?=site_url('tukang_pesan/pakai_barang/add')?>?id=<?php echo $data['id_pesanan'] ?>">
                                    <button type="button" class="btn btn-warning">
                                        <span class="glyphicon glyphicon-open">
                                            Pakai Barang
                                        </span>
                                    </button>
                                </a>
                            </td>

                    </tr>
                <?php
                        }
                ?>
                </table>
            </div>
        </div>
    </div>
</div>