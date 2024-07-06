<?= $this->include('templates/aute_header') ?>

<div class="container">

  <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">

    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Daftar Menjadi Member!</h1>
            </div>
            <form class="user" method="post" action="autentifikasi/registrasi">
              <div class="form-group">
                <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= old('nama') ?>">
                <div class="invalid-feedback pl-3">
                  <?= $validation->getError('nama') ?>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Alamat Email" value="<?= old('email'); ?>">
                <div class="invalid-feedback pl-3">
                  <?= $validation->getError('email') ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                  <?= $validation->getError('password1') ?>
                </div>
                <div class="col-sm-6">
                  <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                  <?= $validation->getError('password2') ?>
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-user btn-block"> Daftar Menjadi Member </button>
            </form>
            <hr>
            <div class="text-center">
              <a class="small" href="autentifikasi/lupaPassword">Lupa Password?</a>
            </div>
            <div class="text-center">
              Sudah Menjadi Member?<a class="small" href="autentifikasi"> Login!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<?= $this->include('templates/aute_footer') ?>