<?php 
$label1 = [];
$total1 = [];
foreach ($byName as $key => $value) {
    array_push($label1, $value['nama_pemesan']);
    array_push($total1, $value['jumlah_total']);
}
$label2 = [];
$total2 = [];
foreach ($byBarang as $key => $value) {
    array_push($label2, $value['nama_barang']);
    array_push($total2, $value['jumlah_total']);
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <canvas id="myChart" height="150"></canvas>
        </div>
        <div class="col-sm-6">
            <canvas id="myChart2" height="150"></canvas>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
            <h2>Pesanan</h2>
        <div class="col-md-7">
            <a href="<?= site_url('tukang_pesan/pesanan/add') ?>"><input type="submit" class="btn btn-md btn-primary" name="Tambah Bagian" value="Tambah Pesanan"></a></br>
        </div>
    </div>
</div>
<br>
<!-- Mulai Tabel -->

<div class="container">
    <div class="row">
        <div class="col-md-12">
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
                                <a href="<?= site_url('produksi/pakai_barang/add') ?>?id=<?php echo $data['id_pesanan'] ?>">
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?=json_encode($label1)?>,
            datasets: [{
                label: 'Pesanan By Pemesan',
                data: <?=json_encode($total1)?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    const ctx2 = document.getElementById('myChart2').getContext('2d');
    const myChart2 = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: <?=json_encode($label2)?>,
            datasets: [{
                label: 'Pesanan By Barang',
                data: <?=json_encode($total2)?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>