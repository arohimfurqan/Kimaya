<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?= BASE ?>" class="h1"><b>KIMAYA</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register untuk penjual</p>

      <form action="<?= BASE ?>/login/register" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama">
        </div>

        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Alamat" name="alamat">
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="No Hp" name="nohp">
        </div>

        <div class="input-group mb-3">
          <select id="provinsi" name="provinsi" class="form-control  select2" required>
            <option value="" selected>Pilih Provinsi</option>
          </select>

        </div>

        <div class="input-group mb-3">
          <select id="kota" name="kota" class="form-control  select2" required>
            <option value="" selected>Pilih kota</option>
          </select>

        </div>

        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control " placeholder="Password" required>



        </div>
        <div class="row">
          <div class="col-8">
            <!-- <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div> -->
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->
      <p class="mb-1">
        <a href="../login">login</a>
      </p>


      <!-- <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->