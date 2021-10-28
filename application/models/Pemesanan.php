<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pemesanan extends CI_Model
{
    public function PesananList()
    {
        $sql = "SELECT
            pemesanan.id_pesanan,
            pemesanan.nama_pemesan,
            barang.nama_barang,
            pemesanan.jumlah_pesanan,
            barang.satuan,
            barang.konversi,
            pemesanan.lead_time,
            pemesanan.pakai,
            pemesanan.jumlah_pesanan * barang.konversi AS 'jumlah_total'
            FROM pemesanan JOIN barang USING (id_barang)";
        return $this->db->query($sql);
    }
}
