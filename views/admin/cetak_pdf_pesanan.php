<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>

<body>
	<style type="text/css">
		.table-data {
			width: 100%;
			border-collapse: collapse;
		}

		.table-data tr th,
		.table-data tr td {
			border: 1px solid black;
			font-size: 11pt;
			font-family: Verdana;
			padding: 10px 10px 10px 10px;
		}

		h3 {
			font-family: Verdana;
		}
	</style>
	<h3>
		<center>Laporan Data Pesanan</center>
	</h3>
	<br />
	<table class="table-data">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Pemesan</th>
				<th>Tgl Pemesanan</th>
				<th>Wisata</th>
				<th>Jumlah Tiket</th>
				<th>Status</th>
				<th>Total Harga</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach ($pesanan as $b) 
			{
			?>
				<tr>
					<th scope="row"><?= $no++; ?></th>
					<td><?= $b['nama_pemesan']; ?></td>
					<td><?= $b['tanggal_pemesanan']; ?></td>
					<td><?= $b['nama_wisata']; ?></td>
					<td><?= $b['jumlah_tiket']; ?></td>
					<td><?= $b['status']; ?></td>
					<td><?= $b['total_harga']; ?></td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</body>
</html>
