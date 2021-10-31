<?php
defined('BASEPATH') or exit('No direct script access allowed');

class produksi extends CI_Model
{
    public function LihatPesanan()
    {
        $sql = "SELECT pemesanan.id_pesanan, pemesanan.nama_pemesan, pemesanan.proses,
											barang.nama_barang, pemesanan.jumlah_pesanan FROM
											barang INNER JOIN pemesanan ON barang.id_barang = pemesanan.id_barang
											WHERE id_pesanan ORDER BY id_pesanan";
        return $this->db->query($sql);
    }

    public function LihatPesananBelumProses()
    {
        $sql = "SELECT pemesanan.id_pesanan, pemesanan.nama_pemesan, pemesanan.proses, 
					barang.nama_barang, pemesanan.jumlah_pesanan FROM
					barang INNER JOIN pemesanan ON barang.id_barang = pemesanan.id_barang
					WHERE proses = 0 ORDER BY id_pesanan DESC";
        return $this->db->query($sql);
    }

    public function findPesananById($id)
    {
        $sql = "SELECT * FROM pemesanan WHERE id_pesanan = '$id'";
        return $this->db->query($sql);
    }

    public function ProduksiTambah()
    {
        $sqlProduksiTambah = "INSERT INTO produksi VALUES('$this->id_produksi', '$this->id_pesanan', '$this->id_barang', '$this->jumlah_produksi','$this->lead_time')";
        // ini untuk set proses ke 1
        $updateProsesPesanan = "UPDATE `bullwhip`.`pemesanan` SET `proses` = '1' WHERE `pemesanan`.`id_pesanan` = '$this->id_pesanan';";
    }

    public function DaftarProduksi()
    {
        $sql = "SELECT
                produksi.id_produksi,
                produksi.id_pesanan,
                pemesanan.nama_pemesan,
                barang.nama_barang,
                pemesanan.jumlah_pesanan,
                produksi.jumlah_produksi,
                produksi.lead_time,
                pemesanan.proses
            FROM
                barang
            INNER JOIN produksi ON produksi.id_barang = barang.id_barang
            INNER JOIN pemesanan ON pemesanan.id_barang = barang.id_barang
            AND pemesanan.id_pesanan = produksi.id_pesanan";
        return $this->db->query($sql);
    }
}
