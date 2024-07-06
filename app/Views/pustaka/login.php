<?= $this->include('pustaka/aute-header') ?>
<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-lg-7">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Halaman Login!!</h1>
                </div>
                <?php if (session()->has('pesan')) : ?>
                  <div class="alert alert-danger alert-message" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                  </div>
                <?php endif; ?>
                <form class="user" method="post">
                  <?php csrf_field() ?>
                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-user <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." value="<?= old('email') ?>">
                    <div class="invalid-feedback small pl-3">
                      <?= $validation->getError('email') ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user <?= ($validation->hasError('password')) ? 'is-invalid' : '' ?>" id="exampleInputPassword" placeholder="Password">
                    <div class="invalid-feedback small pl-3">
                      <?= $validation->getError('password') ?>
                    </div>
                  </div>
                  <button type="submit" class=" btn btn-primary btn-user btn-block">Masuk</button>
                </form>
                <hr>
                <div class="text-center">
                  <a class="small" href="autentifikasi/lupaPassword">Lupa Password?</a>
                </div>
                <div class="text-center">
                  <a class="small" href="autentifikasi/registrasi">Daftar Member!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>
<?= $this->include('pustaka/aute-footer') ?>