<html>
<head>
	<title>Insert Data CodeIgniter</title>
</head>
<body>
	<h1>Input Jenis Barang</h1>
	<h3><?php echo $message;?></h3>
	<form action="<?php echo base_url().'jenis_barang/validation_data'; ?>" method="post">
	<table>
		<tr>
			<td>Kode Jenis</td>
			<td><input type="text" name="kode_jenis"></td>
		</tr>
		<tr>
			<td>Nama Jenis</td>
			<td><input type="text" name="nama_jenis"></td>
		</tr>
		<tr>
			<td>Deskripsi</td>
			<td><input type="text" name="deskripsi"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Simpan"></td>
		</tr>
	</table>
	</form>
</body>
</html>