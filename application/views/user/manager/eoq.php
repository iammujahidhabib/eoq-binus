<script src="<?= base_url() ?>public/js/chartist.min.js"></script>
<div class="container">
    <h2 class="">EOQ</h2>
    <div class="row">
        <div class="col-md-8">&nbsp;</div>
        <div class="col-md-1 col-merah text-center">Parameter</div>
        <div class="col-md-1 col-hijau text-center">BE</div>
        <div class="col-md-12">
            <div class="ct-chart ct-golden-section"></div>
        </div>
    </div>
</div>
<style>
    .col-hijau {
        background: green;
        color: #FFFFFF;
    }

    .col-merah {
        background: red;
        color: #FFFFFF;
    }

    .ct-series-a .ct-bar,
    .ct-series-a .ct-horizontal-bars {
        stroke: green;
    }

    .ct-series-b .ct-bar,
    .ct-series-b .ct-horizontal-bars {
        stroke: red;
    }

    .ct-chart .ct-label {
        font-size: 12px;
    }
</style>
<script>
    <?php
    //label
    $resultlabel = array();
    foreach ($DaftarBE as $key => $data) {
        $resultlabel[] = "'" . trim($data["nama_barang"], " \t\n\r\0\x0B") . "'";
    }
    $resultlbl = implode(",", $resultlabel);

    //BE
    $resultbe = array();
    foreach ($DaftarBE as $key => $data) {
        $resultbe[] = trim($data["BE"], " \t\n\r\0\x0B");
    }
    $resultBE = implode(",", $resultbe);

    //parameter
    $resultparam = array();
    foreach ($DaftarBE as $key => $data) {
        $resultparam[] = trim($data["parameter"], " \t\n\r\0\x0B");
    }
    $resultprm = implode(",", $resultparam);
    ?>

    new Chartist.Bar('.ct-chart', {
        labels: <?= json_encode($resultlbl); ?>,
        series: [
            <?= json_encode($resultBE); ?>,
            <?= json_encode($resultprm); ?>
        ]
    }, {
        seriesBarDistance: 5,
        reverseData: false,
        horizontalBars: true,
        //stackBars: true,
        axisY: {
            offset: 200,
        }
    }).on('draw', function(data) {
        if (data.type === 'bar') {
            data.element.attr({
                style: 'stroke-width: 20px'
            });
        }
    });
</script>
<?php
$sum = 0;
foreach ($TabelEOQ as $key => $data) {
    $sum += $data['EOQ'];
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <div class="card-counter primary">
                <i class="fa fa-code-fork"></i>
                <span class="count-numbers"><?= count($TabelEOQ) ?></span>
                <span class="count-name">Barang</span>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-counter info">
                <i class="fa fa-dollar"></i>
                <span class="count-numbers"><?= $sum ?></span>
                <span class="count-name">EOQ Total</span>
            </div>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th> </th>
                        <th> Nama Barang </th>
                        <th> Harga Barang </th>
                        <th> Jumlah Pesanan </th>
                        <th> Biaya Penyimpanan </th>
                        <th> Permintaan per Periode </th>
                        <th> Biaya Tiap Pemesanan </th>
                        <th> EOQ </th>
                        <th> Pembelian Optimum </th>
                        <th> Daur Pembelian </th>


                    </tr>
                    <tr>
                        <?php

                        foreach ($TabelEOQ as $key => $data) {
                        ?>
                            <td> <?php echo $key + 1 ?> </td>
                            <td> <?php echo $data['nama_barang'] ?> </td>
                            <td align="center"> <?php echo $data['harga_barang'] ?> </td>
                            <td align="center"> <?php echo $data['pesan'] ?> </td>
                            <td align="center"> <?php echo $data['H'] ?> </td>
                            <td align="center"> <?php echo $data['R'] ?> </td>
                            <td align="center"> <?php echo $data['C'] ?> </td>
                            <td align="center"> <?php echo $data['EOQ'] ?> </td>
                            <td align="center"> <?php echo $data['pembelian_optimum'] ?> </td>
                            <td align="center"> <?php echo $data['daur_pembelian'] ?> </td>

                    </tr>
                <?php
                        }
                ?>
                </table>
            </div>
        </div>
    </div>
</div>