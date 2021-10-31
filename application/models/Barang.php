<?php
defined('BASEPATH') or exit('No direct script access allowed');

class barang extends CI_Model
{
	public function StokBarang()
	{
		$sql = "SELECT
						barang.nama_barang,	
						SUM(DISTINCT produksi.jumlah_produksi) as total_produksi,
						SUM(DISTINCT pengambilan.jumlah_pengambilan) as total_pengambilan,
						(
							SUM(DISTINCT produksi.jumlah_produksi) - 
							SUM(DISTINCT 	pengambilan.jumlah_pengambilan)
						) as stok_barang
					FROM
						barang
					JOIN produksi USING (id_barang)
					JOIN pengambilan USING (id_barang)
					GROUP BY nama_barang";
		// return $data;
		return $this->db->query($sql);
	}
	public function BE()
	{
		$sql = "SELECT
					barang.nama_barang,
					ROUND(STDDEV(jumlah_pesanan), 3) AS s_order,
					ROUND(
						AVG(pemesanan.jumlah_pesanan),
						3
					) AS mean_order,
					ROUND(STDDEV(jumlah_produksi), 3) AS s_demand,
					ROUND(
						AVG(produksi.jumlah_produksi),
						3
					) AS mean_demand,
					ROUND(
						(
							STDDEV(jumlah_pesanan) / AVG(jumlah_pesanan)
						),
						3
					) AS cv_order,
					ROUND(
						(
							STDDEV(jumlah_produksi) / AVG(jumlah_produksi)
						),
						3
					) AS cv_demand,
					ROUND(
						(
							(
								STDDEV(jumlah_pesanan) / AVG(jumlah_pesanan)
							) / (
								STDDEV(jumlah_produksi) / AVG(jumlah_produksi)
							)
						),
						3
					) AS BE,
					produksi.lead_time,
					ROUND(
						(
							1 + ((2 * produksi.lead_time) / 30) + (
								(2 * produksi.lead_time ^ 2) / (30 ^ 2)
							)
						),
						3
					) AS parameter,
					ROUND(
						(
							(
								STDDEV(jumlah_pesanan) / AVG(jumlah_pesanan)
							) / (
								STDDEV(jumlah_produksi) / AVG(jumlah_produksi)
							)
						) > 1 + ((2 * produksi.lead_time) / 30) + (
							(2 * produksi.lead_time ^ 2) / (30 ^ 2)
						),
						3
					) AS Bullwhip_Effect
				FROM
					barang
				INNER JOIN pemesanan ON pemesanan.id_barang = barang.id_barang
				INNER JOIN produksi ON produksi.id_barang = pemesanan.id_barang
				GROUP BY
					nama_barang";
		// while ($row = mysql_fetch_array($sqlBE)) {
		// 	$data[] = $row;
		// }
		return $this->db->query($sql);
		// return $data;
	}

	public function EOQ()
	{
		$sql = "SELECT
							barang.nama_barang,
							barang.harga_barang,
							barang.konversi,
							Sum(pemesanan.pakai) AS D,
							SUM(pemesanan.jumlah_pesanan) AS pesan,
							barang.biaya_penyimpanan AS H,
							ROUND(
								AVG(
									barang.harga_barang * pemesanan.jumlah_pesanan
								),
								2
							) AS C,
							ROUND(
								AVG(pemesanan.jumlah_pesanan),
								3
							) AS R,
							ROUND(
								SQRT(
									(
										2 * (
											AVG(
												barang.harga_barang * pemesanan.jumlah_pesanan
											)
										) * SUM(pemesanan.pakai)
									) / AVG(barang.biaya_penyimpanan)
								),
								3
							) AS EOQ,
							(
								SUM(pemesanan.jumlah_pesanan) * barang.konversi
							) AS kuantitas,
							ROUND(
								(
									Sum(pemesanan.pakai)
								) / SQRT(
									(
										2 * (
											AVG(
												barang.harga_barang * pemesanan.jumlah_pesanan
											)
										) * SUM(pemesanan.pakai)
									) / AVG(barang.biaya_penyimpanan)
								),
								3
							) AS pembelian_optimum,
							ROUND(
								(
									360 / (
										(
											Sum(pemesanan.pakai)
										) / SQRT(
											(
												2 * (
													AVG(
														barang.harga_barang * pemesanan.jumlah_pesanan
													)
												) * SUM(pemesanan.pakai)
											) / AVG(barang.biaya_penyimpanan)
										)
									)
								),
								3
							) AS daur_pembelian
						FROM
							barang
						INNER JOIN pemesanan ON pemesanan.id_barang = barang.id_barang
						GROUP BY
							barang.nama_barang";
		return $this->db->query($sql);
	}
	public function ROP()
	{
		$sql = "SELECT
						barang.nama_barang,
						barang.harga_barang,
						barang.satuan,
						barang.konversi,
						pemesanan.lead_time,
						Sum(pemesanan.jumlah_pesanan) AS pesanan_total,
						(
							konversi * Sum(pemesanan.jumlah_pesanan)
						) AS total_barang,
						(
							(
								(5 / 100) * (SUM(pemesanan.pakai))
							) + (SUM(pemesanan.pakai))
						) AS X,
						SUM(pemesanan.pakai) AS Y,
						(
							(
								(
									(5 / 100) * (SUM(pemesanan.pakai))
								) + (SUM(pemesanan.pakai))
							) - (SUM(pemesanan.pakai))
						) AS 'X-Y',
						POW(
							(
								(
									(
										(5 / 100) * (SUM(pemesanan.pakai))
									) + (SUM(pemesanan.pakai))
								) - (SUM(pemesanan.pakai))
							),
							2
						) AS 'X-Y^2',
						ROUND(
							SQRT(
								POW(
									(
										(
											(
												(5 / 100) * (SUM(pemesanan.pakai))
											) + (SUM(pemesanan.pakai))
										) - (SUM(pemesanan.pakai))
									),
									2
								) / 12
							),
							3
						) AS sigma,
						ROUND(
							(
								1.65 * (
									SQRT(
										POW(
											(
												(
													(
														(5 / 100) * (SUM(pemesanan.pakai))
													) + (SUM(pemesanan.pakai))
												) - (SUM(pemesanan.pakai))
											),
											2
										) / 12
									)
								)
							),
							3
						) AS safety_stock,
						ROUND(
							(
								AVG(pemesanan.lead_time) * (SUM(pemesanan.pakai) / 360)
							),
							3
						) AS LQ,
						ROUND(
							(
								(
									1.65 * (
										SQRT(
											POW(
												(
													(
														(
															(5 / 100) * (SUM(pemesanan.pakai))
														) + (SUM(pemesanan.pakai))
													) - (SUM(pemesanan.pakai))
												),
												2
											) / 12
										)
									)
								) + (
									AVG(pemesanan.lead_time) * (SUM(pemesanan.pakai) / 360)
								)
							),
							3
						) AS ROP
					FROM
						barang
					INNER JOIN pemesanan ON pemesanan.id_barang = barang.id_barang
					GROUP BY
						nama_barang
								";
		return $this->db->query($sql);
	}
}
