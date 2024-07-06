<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Berhasil</title>
</head>

<body>
    <center>
        <table>
            <tr>
                <th colspan="3">Silahkan Membayar ke vendor terdekat</th>
            </tr>
            <tr>
                <td colspan="3">
                    <hr>
                </td>
            </tr>
            <tr>
                <td>Nama Pembeli</td>
                <td>:</td>
                <td> <?= $nama; ?> </td>
            </tr>
            <tr>
                <td>No. Telp</td>
                <td>:</td>
                <td> <?= $nohp; ?> </td>
            </tr>
            <tr>
                <td>Merk Sepatu</td>
                <td>:</td>
                <td> <?= $sepatu['merk']; ?> </td>
            </tr>
            <tr>
                <td>Harga Sepatu</td>
                <td>:</td>
                <td> Rp. <?= number_format($sepatu['harga'], 2, ',', '.'); ?> </td>
            </tr>
            <tr>
                <td>Ukuran Sepatu</td>
                <td>:</td>
                <td> <?= $ukuran; ?> </td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                    <a href="<?= base_url('sepatu'); ?>">Kembali</a>
                </td>
            </tr>
        </table>
    </center>
</body>

</html>