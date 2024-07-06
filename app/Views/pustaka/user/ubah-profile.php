<?= $this->include('pustaka/templates/header') ?>

<?= $this->include('pustaka/templates/sidebar') ?>

<?= $this->include('pustaka/templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-9">
      <?= form_open_multipart('user/ubahprofil'); ?>
      <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
        </div>
      </div>

      <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
        <div class="col-sm-10">
          <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '' ?>" id="nama" name="nama" value="<?= $user['nama'] ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('nama') ?>
          </div>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-sm-2">Gambar</div>
        <div class="col-sm-10">
          <div class="row">
            <div class="col-sm-3">
              <img src="/assets/img/profile/<?= $user['image'] ?>" class="img-thumbnail" alt="">
            </div>
            <div class="col-sm-9">
              <div class="custom-file">
                <input type="file" class="custom-file-input <?= ($validation->hasError('userfile')) ? 'is-invalid' : '' ?>" id="userfile" name="userfile">
                <label class="custom-file-label" for="userfile">Pilih file</label>
                <div class="invalid-feedback">
                  <?= $validation->getError('userfile') ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group row justify-content-end">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary">Ubah</button> <button class="btn btn-dark" onclick="window.history.go(-1)"> Kembali</button>
        </div>
      </div>

      </form>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?= $this->include('pustaka/templates/footer') ?>