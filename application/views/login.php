<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membuat login menggunakan CodeIgneter</title>
</head>
<body>
    <h1>Membuat login dengan CodeIgneter</h1>
    <!-- Menerima variable message dari controller -->
    <h1><?php echo $message ; ?></h1>
    <form action="<?php echo base_url('co_login/login'); ?>" method="post">
        <table>
            <tr>
                <td>Username :</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password :</td>
                <td><input type="text" name="password"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit">Login</button></td>
            </tr>
        </table>
    </form>
</body>
</html>