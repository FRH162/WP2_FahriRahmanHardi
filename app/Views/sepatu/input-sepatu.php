<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pembelian Sepatu</title>
</head>

<body>
  <center>
    <form action="<?= base_url('sepatu/cetak'); ?>" method="post">
      <?= csrf_field() ?>
      <table>
        <tr>
          <th colspan="3"> Input Ukuran Sepatu Anda </th>
        </tr>
        <tr>
          <td colspan="3">
            <hr>
          </td>
        </tr>
        <tr>
          <th>Nama Pembeli</th>
          <th>:</th>
          <td>
            <input type="text" name="nama" id="nama" value="<?= old('nama') ?>">
            <?= ($validation->hasError('nama')) ? '<br>' . $validation->getError('nama') : '' ?>
          </td>
        </tr>
        <tr>
          <th>No. telepon</th>
          <td>:</td>
          <td>
            <input type="text" name="nohp" id="nohp" value="<?= old('nohp') ?>">
            <?= ($validation->hasError('nohp')) ? '<br>' . $validation->getError('nohp') : '' ?>
          </td>
        </tr>
        <tr>
          <th>Merk Sepatu</th>
          <td>:</td>
          <td>
            <select name="id_sepatu" id="id_sepatu">
              <option disabled hidden selected>Pilih Merk Sepatu</option>
              <?php foreach ($sepatu as $id => $s) : ?>
                <option value="<?= $id ?>"><?= $s['merk'] . ' - Rp. ' . number_format($s['harga'], 2, ',', '.') ?></option>
              <?php endforeach; ?>
            </select>
            <?= ($validation->hasError('id_sepatu')) ? '<br>' . $validation->getError('id_sepatu') : '' ?>
          </td>
        </tr>
        <tr>
          <th>Ukuran Kaki</th>
          <td>:</td>
          <td>
            <select name="ukuran" id="ukuran">
              <option disabled hidden selected>Pilih ukuran</option>
              <?php for ($i = $size['min']; $i < $size['max'] + 1; $i++) : ?>
                <option value="<?= $i ?>"><?= $i ?></option>
              <?php endfor; ?>
            </select>
            <?= ($validation->hasError('ukuran')) ? '<br>' . $validation->getError('ukuran') : '' ?>
          </td>
        </tr>
        <tr>
          <td colspan="3" align="center">
            <input type="submit" value="Submit">
          </td>
        </tr>
      </table>
    </form>
  </center>
</body>

</html>