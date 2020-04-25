<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <!-- menampung nilai dari userdata yang dikirimkan oleh controller co_login-->
    <h2>Selamat datang, <?php echo $this->session->userdata('name'); ?></h2>

    <!-- memanggil fungsi logout dari co_login -->
    <a href="<?php echo base_url('co_login/logout'); ?>">Logout</a>
</body>
</html>