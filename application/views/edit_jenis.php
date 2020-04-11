<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data CodeIgneter</title>
</head>
<body>
    <h1>Edit Data Jenis Barang</h1>
    <?php foreach($jenis_barang as $data){ ?>
        <form action="<?= base_url().'jenis_barang/update_jenis';?>" method="post">
            <table>
                <tr>
                    <td>Kode Jenis</td>
                    <td><input type="text" name="kode_jenis" value="<?= $data->kode_jenis ?>"></td>
                </tr>
                <tr>
                    <td>Nama Jenis</td>
                    <td><input type="text" name="nama_jenis" value="<?= $data->nama_jenis ?>"></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><input type="text" name="deskripsi" value="<?= $data->deskripsi ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="simpan"></td>
                </tr>
            </table>
        </form>
    <?php
        }
    ?>
</body>
</html>