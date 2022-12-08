<body class="bg-gradient-primary ">

  <div class="container">
    <div class="row justify-content-center">

      <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 ">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                </div>
                <form class="user" method="POST" action="<?php base_url('auth/registration') ?>">
                  <div class="form-group">
                    <input name="name" type="text" class="form-control form-control-user" id="exampleFirstName"
                      placeholder="First Name" value="<?= set_value('name') ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <div class="form-group">
                    <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail"
                      placeholder="Email Address" value="<?= set_value('email') ?>">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input name="password" type="password" class="form-control form-control-user"
                        id="exampleInputPassword" placeholder="Password">
                      <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="col-sm-6">
                      <input name="re_password" type="password" class="form-control form-control-user"
                        id="exampleRepeatPassword" placeholder="Repeat Password">

                    </div>
                    <?= form_error('re_password', '<small class="text-danger pl-4">', '</small>') ?>
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Register Account
                  </button>
                  <hr>
                </form>
                <hr>
                <div class="text-center">
                  <a class="small" href="forgot-password.html">Forgot Password?</a>
                </div>
                <div class="text-center">
                  <a class="small" href="<?= base_url('auth/login') ?>">Already have an account? Login!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>