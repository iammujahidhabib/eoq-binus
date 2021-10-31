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
    function PesananTambah()
    {
        $sqlPesananTambah = mysql_query("INSERT INTO pemesanan VALUES ('$this->id_pesanan', '$this->nama_pemesan', '$this->id_barang', '$this->jumlah_pesanan', '$this->lead_time','$this->pakai')");
    }

    function GunaBarang()
    {
        $sqlGunaBarang = mysql_query("SELECT * FROM pemesanan");
        while ($row = mysql_fetch_array($sqlGunaBarang)) {
            $data[] = $row;
        }
    }


    function PakaiBarangById($id)
    {
        $sql = "SELECT * FROM pemesanan WHERE id_pesanan = '$id'";
        // while ($row = mysql_fetch_array($sqlPakaiBarang)) {
        //     $data[] = $row;
        // }
        // return $data;
        return $this->db->query($sql);
    }
    function PakaiBarangUpdate()
    {
        $sqlPakaiUpdate = mysql_query("UPDATE pemesanan SET pakai = '$this->pakai' WHERE id_pesanan = '$this->id_pesanan'");
    }
    public function graphPemesananByName()
    {
        $sql = "SELECT
            pemesanan.nama_pemesan,
            pemesanan.jumlah_pesanan * barang.konversi AS 'jumlah_total'
            FROM pemesanan JOIN barang USING (id_barang) GROUP BY pemesanan.nama_pemesan";
        return $this->db->query($sql);
    }
    public function graphPemesananByBarang()
    {
        $sql = "SELECT
            barang.nama_barang,
            pemesanan.jumlah_pesanan * barang.konversi AS 'jumlah_total'
            FROM pemesanan JOIN barang USING (id_barang) GROUP BY barang.id_barang";
        return $this->db->query($sql);
    }
}
