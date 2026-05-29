<!DOCTYPE html>
<html lang="en" class="h-100">



<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <meta name="robots" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="DusolInfo">
  <meta name="format-detection" content="telephone=no">

  <!-- PAGE TITLE HERE -->
  <title>DusolInfo</title>

  <!-- FAVICONS ICON -->
  <link rel="shortcut icon" type="image/png" href="/admin/admin-assets/images/main-logo.jpg">
  <link href="/admin/admin-assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
  <link href="/admin/admin-assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="/admin/admin-assets/vendor/toastr/css/toastr.min.css">
  <style>
    .error {
      color: red;
    }
  </style>
</head>

<body class="vh-100">
  <div class="page-wraper">

    <!-- Content -->
    <div class="browse-job login-style3">
      <!-- Coming Soon -->
      <div class="bg-img-fix overflow-hidden"
        style="background:#fff url(/admin/admin-assets/images/background/bg6.jpg); height: 100vh;">
        <div class="row gx-0">
          <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 vh-100 bg-white ">
            <div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" style="max-height: 653px;"
              tabindex="0">
              <div id="mCSB_1_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
                <div class="login-form style-2">


                  <div class="card-body">
                    <div class="logo-header ">
                      <a href="#" class="logo"><img src="/admin/admin-assets/images/EduHealth Bridge.png" alt=""
                          style="width: 40%;" class="d-block mx-auto width-100 light-logo"></a>
                      <!-- <a href="#" class="logo"><img src="/admin/admin-assets/images/bds-logo-removebg.png" alt="" style="width: 40%;" class="d-block mx-auto width-100 dark-logo"></a> -->
                    </div>

                    <nav>
                      <div class="nav nav-tabs border-bottom-0" id="nav-tab" role="tablist">

                        <div class="tab-content w-100" id="nav-tabContent">
                          <div class="tab-pane fade show active" id="nav-personal" role="tabpanel"
                            aria-labelledby="nav-personal-tab">
                            <form id="form-login" role="form" autocomplete="off" action="app/login/login_store.php"
                              class=" dz-form pb-3">
                              <h3 class="form-title m-t0">Personal Information</h3>
                              <div class="dz-separator-outer m-b5">
                                <div class="dz-separator bg-primary style-liner"></div>
                              </div>
                              <p>Enter your username and your password. </p>
                              <div class="form-group mb-3">
                                <input type="text" name="username" style="text-transform: uppercase"
                                  placeholder="Username" class="form-control" required>
                              </div>
                              <div class="form-group mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Credentials"
                                  required>
                              </div>

                              <div class="form-group text-left mb-5 forget-main">
                                <div class="d-flex align-items-center mb-3">
                                  <button type="submit" class="btn btn-primary me-3">Sign Me In</button>
                                  <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="check1" name="example1">
                                    <label class="form-check-label" for="check1">Remember me</label>
                                  </div>
                                </div>
                                <p>
                                  <a href="/admin/forgot_passwordform" class="btn btn-link p-0">Forgot Password?</a>
                                </p>
                              </div>
                            </form>
                          </div>

                        </div>

                      </div>
                    </nav>
                  </div>
                  <div class="card-footer">
                    <div class=" bottom-footer clearfix m-t10 m-b20 row text-center">
                      <div class="col-lg-12 text-center">
                        <span> © Copyright DusolInfo. <span class="heart"></span>
                          <a href="javascript:void(0);"> </a> All rights reserved.</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="mCSB_1_scrollbar_vertical"
                class="mCSB_scrollTools mCSB_1_scrollbar mCS-light mCSB_scrollTools_vertical" style="display: block;">
                <div class="mCSB_draggerContainer">
                  <div id="mCSB_1_dragger_vertical" class="mCSB_dragger"
                    style="position: absolute; min-height: 0px; display: block; height: 652px; max-height: 643px; top: 0px;">
                    <div class="mCSB_dragger_bar" style="line-height: 0px;"></div>
                    <div class="mCSB_draggerRail"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Full Blog Page Contant -->
    </div>
    <!-- Content END-->
  </div>

  <!--**********************************
  Scripts
***********************************-->
  <!-- Required vendors -->
  <script src="/admin/admin-assets/vendor/global/global.min.js"></script>
  <script src="/admin/admin-assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
  <script src="/admin/admin-assets/js/deznav-init.js"></script>
  <script src="/admin/admin-assets/js/custom.js"></script>
  <script src="/admin/admin-assets/js/demo.js"></script>
  <script src="/admin/admin-assets/js/styleSwitcher.js"></script>
  <script src="/admin/admin-assets/vendor/toastr/js/toastr.min.js"></script>
  <script src="/admin/admin-assets/js/plugins-init/toastr-init.js"></script>
  <script src="/admin/admin-assets/vendor/jquery-validation/jquery.validate.min.js" type="text/javascript"></script>
  <script>
    $(function () {
      $('#form-login').validate();
      $("#form-login").on("submit", function (e) {
        if ($('#form-login').valid()) {
          $(':input[type="submit"]').prop('disabled', true);
          var formData = new FormData(this);
          $.ajax({
            url: this.action,
            type: 'post',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (data) {
              console.log(data);

              if (data.status == 200) {
                toastr.success(data.message);
                window.setTimeout(function () {
                  window.location.href = data.url;
                }, 1000);
              } else {
                $(':input[type="submit"]').prop('disabled', false);
                toastr.error(data.message);
              }
            }
          });
          e.preventDefault();
        }
      });
    })
  </script>
</body>

</html>