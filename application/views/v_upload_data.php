<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Upload Gambar</title>
</head>
<body>

    <center><h1>Membuat upload file dengan CodeIgneter</h1></center>
    <!-- menapilkan pesan dari controller -->
    <?= $message; ?>
    <!-- fungsi untuk mengunggah dokumen dan diberikan pada controller -->
    <?= form_open_multipart(base_url().'co_upload/aksi_upload');?>

    <input type="file" name="berkas">
    <br><br>

    <input type="submit" value="upload">
    
</body>
</html>