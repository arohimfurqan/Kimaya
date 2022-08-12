<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 11 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->

<?php
$db = Config\database::connect();
?>
<html lang="en">
<!--begin::Head-->

<head>

  <meta charset="utf-8" />
  <title>Kimaya</title>
  <meta name="description" content="ECommerce Dashboard" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="canonical" href="https://keenthemes.com/metronic" />
  <!--begin::Fonts-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
  <!--end::Fonts-->
  <!--begin::Global Theme Styles(used by all pages)-->
  <link href="<?= BASE  ?>/front_assets/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
  <link href="<?= BASE  ?>/front_assets/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
  <link href="<?= BASE  ?>/front_assets/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
  <!--end::Global Theme Styles-->
  <!--begin::Layout Themes(used by all pages)-->
  <!--end::Layout Themes-->
  <link rel="shortcut icon" href="<?= BASE ?>/front_assets/custom/apps/ecommerce/img/logo.jpeg" />
  <link rel='stylesheet' href='<?= BASE ?>/assets/lightslider.css'>
  <link href="<?= BASE ?>/front_assets/assets/css/pages/wizard/wizard-4.css" rel="stylesheet" type="text/css" />
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
  <style>
    .bg-white2 {
      background-color: #000000 !important;
    }

    /* .notification .badge {
      position: absolute;
      top: -19px;
      right: -13px;
      padding: 5px 9px 5px 7px;
      border-radius: 50%;
      background-color: red;
      color: white;
      font-size: 13px;
    } */
  </style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" style="background-image: url(<?= BASE ?>/front_assets/assets/media/bg/bg-4.jpg)" class="quick-panel-right demo-panel-right offcanvas-right header-fixed page-loading">
  <!--begin::Main-->
  <!--begin::Header Mobile-->
  <div id="kt_header_mobile" class="header-mobile">
    <!--begin::Logo-->
    <a href="index.html">
      <img alt="Logo" src="<?= BASE ?>/front_assets/custom/apps/ecommerce/img/logo.jpeg" class="logo-default max-h-30px" />
    </a>
    <!--end::Logo-->
    <!--begin::Toolbar-->
    <div class="d-flex align-items-center">
      <button class="btn p-0 burger-icon burger-icon-left ml-4" id="kt_header_mobile_toggle">
        <span></span>
      </button>
      <button class="btn btn-icon btn-hover-transparent-white p-0 ml-3" id="kt_header_mobile_topbar_toggle">
        <span class="svg-icon svg-icon-xl">
          <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <polygon points="0 0 24 0 24 24 0 24" />
              <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
              <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
            </g>
          </svg>
          <!--end::Svg Icon-->
        </span>
      </button>
    </div>
    <!--end::Toolbar-->
  </div>
  <!--end::Header Mobile-->
  <div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">
      <!--begin::Wrapper-->
      <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
        <!--begin::Header-->
        <div id="kt_header" class="header header-fixed">
          <!--begin::Container-->
          <div class="container d-flex align-items-stretch justify-content-between">
            <!--begin::Left-->
            <div class="d-flex align-items-stretch mr-3">
              <!--begin::Header Logo-->
              <div class="header-logo">
                <a href="index.html">
                  <img alt="Logo" src="<?= BASE ?>/front_assets/custom/apps/ecommerce/img/logo.jpeg" class="logo-default max-h-100px" />
                  <img alt="Logo" src="<?= BASE ?>/front_assets/custom/apps/ecommerce/img/logo.jpeg" class="logo-sticky max-h-100px" />
                </a>
              </div>
              <!--end::Header Logo-->
              <!--begin::Header Menu Wrapper-->

              <?= view('Layout/front/menu') ?>

            </div>
            <!--end::Left-->
            <!--begin::Topbar-->
            <div class="topbar">
              <!--begin::My Cart-->
              <div class="dropdown">
                <!--begin::Toggle-->
                <div class="topbar-item" data-offset="10px,0px">
                  <?php
                  if (session()->has('logged_in2')) {
                  ?>
                    <a href="<?= BASE ?>/front/cart">
                      <div class="btn btn-icon btn-hover-transparent-white btn-dropdown btn-lg mr-1">
                        <span class="svg-icon svg-icon-xl notification">
                          <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <rect x="0" y="0" width="24" height="24" />
                              <path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                              <path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000" />
                            </g>
                          </svg>
                          <!--end::Svg Icon-->
                          <?php
                          $countcart = $db->table('keranjang')->join('keranjang_produk', 'id_keranjang=keranjang_id')->where('status', 'Keranjang')->countAllResults();
                          ?>
                          <label for="" style="color: orange;font-size:19px"><?= $countcart ?></label>

                        </span>
                      </div>
                    </a>
                  <?php } else { ?>
                    <a href="<?= BASE ?>/front/login">
                      <div class="btn btn-icon btn-hover-transparent-white btn-dropdown btn-lg mr-1">
                        <span class="svg-icon svg-icon-xl">
                          <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <rect x="0" y="0" width="24" height="24" />
                              <path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                              <path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000" />
                            </g>
                          </svg>
                          <!--end::Svg Icon-->



                        </span>
                      </div>
                    </a>
                  <?php   } ?>
                </div>
                <!--end::Toggle-->
              </div>
              <!--end::My Cart-->


              <!--begin::User-->
              <div class="dropdown">
                <!--begin::Toggle-->
                <div class="topbar-item">
                  <?php
                  if (!session()->has('logged_in2')) {
                  ?>
                    <a href="<?= BASE ?>/front/login">
                      <div class="btn btn-icon btn-hover-transparent-white d-flex align-items-center btn-lg px-md-2 w-md-auto">

                        <span class="text-white opacity-90 font-weight-bolder font-size-base d-none d-md-inline mr-4">Login</span>
                        <!-- <span class="symbol symbol-35">
                      <span class="symbol-label text-white font-size-h5 font-weight-bold bg-white-o-30">S</span> -->
                      </div>
                    </a>
                  <?php } else { ?>
                    <div class="btn btn-icon btn-hover-transparent-white d-flex align-items-center btn-lg px-md-2 w-md-auto" id="kt_quick_user_toggle">

                      <span class="text-white opacity-90 font-weight-bolder font-size-base d-none d-md-inline mr-4"><?= session('nama2') ?></span>
                      <span class="symbol symbol-35">
                        <span class="symbol-label text-white font-size-h5 font-weight-bold bg-white-o-30"><?= substr(session('nama2'), 0, 1) ?></span>
                    </div>
                  <?php    } ?>
                </div>
                <!--end::Toggle-->
              </div>
              <!--end::User-->
            </div>
            <!--end::Topbar-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::Header-->

        <?= $isi ?>

        <div class="footer bg-white2 py-4 d-flex flex-lg-column" id="kt_footer">
          <!--begin::Container-->
          <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
            <div class="row">
              <div class="col-lg-3">
                <div class="first-item">
                  <div class="logo">
                    <img src="<?= BASE ?>/front_assets/custom/apps/ecommerce/img/logo.jpeg" alt="hexashop ecommerce templatemo" width="100%" height="200px">
                  </div>
                  <ul style="color: rgb(255, 255, 255);">
                    <li>16501 Collins Ave, Sunny Isles Beach, FL 33160, United States</li>
                    <!-- <li>hexashop@company.com</li> -->
                    <li>010-020-0340</li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-3">
                <h4 style="color: rgb(138, 138, 138);">Shopping &amp; Categories</h4>
                <ul>
                  <li><a href="#" style="color: rgb(255, 255, 255);">Men’s Shopping</a></li>
                  <li><a href="#" style="color: rgb(255, 255, 255);">Women’s Shopping</a></li>
                  <li><a href="#" style="color: rgb(255, 255, 255);">Kid's Shopping</a></li>
                </ul>
              </div>
              <div class="col-lg-3">
                <h4 style="color: rgb(138, 138, 138);">Useful Links</h4>
                <ul>
                  <li><a href="#" style="color: rgb(255, 255, 255);">Homepage</a></li>
                  <li><a href="#" style="color: rgb(255, 255, 255);">About Us</a></li>
                  <li><a href="#" style="color: rgb(255, 255, 255);">Help</a></li>
                  <li><a href="#" style="color: rgb(255, 255, 255);">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-lg-3">
                <h4 style="color: rgb(138, 138, 138);">Help &amp; Information</h4>
                <ul>
                  <li><a href="#" style="color: rgb(255, 255, 255);">Help</a></li>
                  <li><a href="#" style="color: rgb(255, 255, 255);">FAQ's</a></li>
                  <li><a href="#" style="color: rgb(255, 255, 255);">Shipping</a></li>
                  <li><a href="#" style="color: rgb(255, 255, 255);">Tracking ID</a></li>
                </ul>
              </div>
              <div class="col-lg-12">
                <div class="under-footer text-center">
                  <hr>
                  <p style="color: rgb(255, 255, 255);">Copyright © 2022 Kimaya.



                </div>
              </div>
            </div>
            <!--end::Nav-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::Footer-->
      </div>
      <!--end::Wrapper-->
    </div>
    <!--end::Page-->
  </div>
  <!--end::Main-->



  <!--begin::Scrolltop-->
  <div id="kt_scrolltop" class="scrolltop">
    <span class="svg-icon">
      <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <polygon points="0 0 24 0 24 24 0 24" />
          <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
          <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
        </g>
      </svg>
      <!--end::Svg Icon-->
    </span>
  </div>
  <!--end::Scrolltop-->
  <!--begin::Sticky Toolbar-->

  <!--end::Sticky Toolbar-->
  <!--begin::Demo Panel-->


  <!-- begin::User Panel-->
  <div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
      <h3 class="font-weight-bold m-0">User Profile
        <!-- <small class="text-muted font-size-sm ml-2">12 messages</small> -->
      </h3>
      <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
        <i class="ki ki-close icon-xs text-muted"></i>
      </a>
    </div>
    <!--end::Header-->
    <!--begin::Content-->
    <div class="offcanvas-content pr-5 mr-n5">
      <!--begin::Header-->
      <div class="d-flex align-items-center mt-5">
        <div class="symbol symbol-100 mr-5">
          <div class="symbol-label" style="background-image:url('assets/media/users/300_21.jpg')"></div>
          <i class="symbol-badge bg-success"></i>
        </div>
        <div class="d-flex flex-column">
          <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary"><?= session('nama2') ?></a>
          <div class="text-muted mt-1">Application Developer</div>
          <div class="navi mt-2">
            <a href="#" class="navi-item">
              <span class="navi-link p-0 pb-2">
                <span class="navi-icon mr-1">
                  <span class="svg-icon svg-icon-lg svg-icon-primary">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24" />
                        <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />
                        <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
                      </g>
                    </svg>
                    <!--end::Svg Icon-->
                  </span>
                </span>
                <span class="navi-text text-muted text-hover-primary">jm@softplus.com</span>
              </span>
            </a>
            <a href="<?= BASE ?>/front/logout" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Sign Out</a>
          </div>
        </div>
      </div>
      <!--end::Header-->
      <!--begin::Separator-->
      <div class="separator separator-dashed mt-8 mb-5"></div>
      <!--end::Separator-->
      <!--begin::Nav-->
      <div class="navi navi-spacer-x-0 p-0">
        <!--begin::Item-->
        <a href="<?= BASE ?>/front/belum_bayar" class="navi-item">
          <div class="navi-link">
            <div class="symbol symbol-40 bg-light mr-3">
              <div class="symbol-label">
                <span class="svg-icon svg-icon-md svg-icon-success">
                  <!--begin::Svg Icon | path:assets/media/svg/icons/General/Notification2.svg-->
                  <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512 512">
                    <path fill="#a40a0a" d="M489.972 119.059a23.839 23.839 0 0 0-17-7.059H456V72a24.027 24.027 0 0 0-24-24H86.627A70.628 70.628 0 0 0 16 118.627v274.746A70.628 70.628 0 0 0 86.627 464h385.4a24.047 24.047 0 0 0 24-23.923l.944-303.995a23.837 23.837 0 0 0-6.999-17.023ZM464.053 432H86.627A38.627 38.627 0 0 1 48 393.373V118.627A38.627 38.627 0 0 1 86.627 80H424v32H88v32h376.947Z" />
                    <path fill="#a40a0a" d="M392 264h32v32h-32z" />
                  </svg>
                  <!--end::Svg Icon-->
                </span>
              </div>
            </div>
            <?php
            $countbelumbayar = $db->table('keranjang')->where('status', 'Menunggu Pembayaran')->countAllResults();
            ?>
            <div class="navi-text">
              <div class="font-weight-bold">Belum Bayar</div>
              <div class="text-muted">Oder Belum Bayar
                <span class="label label-light-danger label-inline font-weight-bold"><?= $countbelumbayar ?></span>
              </div>
            </div>
          </div>
        </a>
        <!--end:Item-->
        <!--begin::Item-->
        <a href="<?= BASE ?>/front/kemas" class="navi-item">
          <div class="navi-link">
            <div class="symbol symbol-40 bg-light mr-3">
              <div class="symbol-label">
                <span class="svg-icon svg-icon-md svg-icon-warning">
                  <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Chart-bar1.svg-->
                  <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1.32em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 42 32">
                    <g fill="#df820e">
                      <path d="M1.5 17a.5.5 0 0 0-.5.5v12c0 .827.673 1.5 1.5 1.5h10a.5.5 0 0 0 0-1h-10a.5.5 0 0 1-.5-.5v-12a.5.5 0 0 0-.5-.5zm39 0a.5.5 0 0 0-.5.5v12a.5.5 0 0 1-.5.5h-21a.5.5 0 0 0 0 1h21c.827 0 1.5-.673 1.5-1.5v-12a.5.5 0 0 0-.5-.5zM18 1.5a.5.5 0 0 0 .5.5h21a.5.5 0 0 1 .5.5v8.958a.5.5 0 0 0 1 0V2.5c0-.827-.673-1.5-1.5-1.5h-21a.5.5 0 0 0-.5.5zM2.5 1C1.673 1 1 1.673 1 2.5v8.958a.5.5 0 0 0 1 0V2.5a.5.5 0 0 1 .5-.5h10a.5.5 0 0 0 0-1h-10z" />
                      <path d="M41.5 13.958H21.1c.397-.176.74-.381.984-.625a3.879 3.879 0 0 0 0-5.48c-1.464-1.464-4.016-1.464-5.48 0c-.235.235-.432.563-.604.94V.5a.5.5 0 0 0-1 0v13.225c-1.703-.702-4.701-2.144-5.316-3.387a3.352 3.352 0 0 1-.173-2.576a3.353 3.353 0 0 1 1.699-1.943a.5.5 0 0 0-.443-.897a4.343 4.343 0 0 0-2.203 2.52a4.343 4.343 0 0 0 .224 3.339c.605 1.222 2.63 2.391 4.275 3.177H.5a.5.5 0 0 0 0 1h9.346c-.387.174-.722.375-.961.614a3.879 3.879 0 0 0 0 5.48c.732.732 1.705 1.135 2.74 1.135s2.008-.403 2.74-1.135c.248-.248.456-.599.635-1.005V31.5a.5.5 0 0 0 1 0V15.195c1.708.706 4.673 2.138 5.285 3.374c.4.808.461 1.722.173 2.576a3.353 3.353 0 0 1-1.699 1.943a.5.5 0 1 0 .443.896a4.343 4.343 0 0 0 2.203-2.52a4.343 4.343 0 0 0-.224-3.339c-.602-1.216-2.611-2.38-4.252-3.167H41.5a.5.5 0 0 0 0-1zM17.311 8.561c.543-.543 1.265-.842 2.033-.842s1.49.299 2.033.842a2.878 2.878 0 0 1 0 4.066c-.854.854-3.79 1.202-5.367 1.3c.112-1.864.522-4.587 1.301-5.366zm-3.653 11.784c-1.086 1.086-2.98 1.086-4.066 0a2.878 2.878 0 0 1 0-4.066c.854-.854 3.79-1.202 5.367-1.3c-.112 1.864-.522 4.587-1.301 5.366z" />
                    </g>
                  </svg>
                  <!--end::Svg Icon-->
                </span>
              </div>
            </div>
            <?php
            $countlunas = $db->table('keranjang')->where('status', 'Lunas')->countAllResults();
            ?>
            <div class="navi-text">
              <div class="font-weight-bold">Dikemas</div>
              <div class="text-muted">Dalam Proses Pengemasan
                <span class="label label-light-danger label-inline font-weight-bold"><?= $countlunas ?></span>
              </div>

            </div>
          </div>
        </a>
        <!--end:Item-->
        <!--begin::Item-->
        <a href="<?= BASE ?>/front/dikirim" class="navi-item">
          <div class="navi-link">
            <div class="symbol symbol-40 bg-light mr-3">
              <div class="symbol-label">
                <span class="svg-icon svg-icon-md svg-icon-danger">
                  <!--begin::Svg Icon | path:assets/media/svg/icons/Files/Selected-file.svg-->
                  <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                    <path fill="#4046ff" d="M21.6 11.22L17 7.52V5a1.91 1.91 0 0 0-1.81-2H3.79A1.91 1.91 0 0 0 2 5v10a2 2 0 0 0 1.2 1.88a3 3 0 1 0 5.6.12h6.36a3 3 0 1 0 5.64 0h.2a1 1 0 0 0 1-1v-4a1 1 0 0 0-.4-.78ZM20 12.48V15h-3v-4.92ZM7 18a1 1 0 1 1-1-1a1 1 0 0 1 1 1Zm12 0a1 1 0 1 1-1-1a1 1 0 0 1 1 1Z" />
                  </svg>
                  <!--end::Svg Icon-->
                </span>
              </div>
            </div>
            <?php
            $countpengiriman = $db->table('keranjang')->where('status', 'Pengiriman')->countAllResults();
            ?>
            <div class="navi-text">
              <div class="font-weight-bold">Dikirim</div>
              <div class="text-muted">Order dalam pengiriman
                <span class="label label-light-danger label-inline font-weight-bold"><?= $countpengiriman ?></span>
              </div>
            </div>
          </div>
        </a>
        <!--end:Item-->
        <!--begin::Item-->
        <a href="custom/apps/userprofile-1/overview.html" class="navi-item">
          <div class="navi-link">
            <div class="symbol symbol-40 bg-light mr-3">
              <div class="symbol-label">
                <span class="svg-icon svg-icon-md svg-icon-primary">
                  <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <rect x="0" y="0" width="24" height="24" />
                      <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3" />
                      <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000" />
                    </g>
                  </svg>
                  <!--end::Svg Icon-->
                </span>
              </div>
            </div>
            <div class="navi-text">
              <div class="font-weight-bold">My Tasks</div>
              <div class="text-muted">latest tasks and projects</div>
            </div>
          </div>
        </a>
        <!--end:Item-->
      </div>
      <!--end::Nav-->
      <!--begin::Separator-->
      <div class="separator separator-dashed my-7"></div>
      <!--end::Separator-->
      <!--begin::Notifications-->

      <!--end::Notifications-->
    </div>
    <!--end::Content-->
  </div>
  <!-- end::User Panel-->

  <script>
    var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
  </script>
  <!--begin::Global Config(global config for global JS scripts)-->
  <script>
    var KTAppSettings = {
      "breakpoints": {
        "sm": 576,
        "md": 768,
        "lg": 992,
        "xl": 1200,
        "xxl": 1200
      },
      "colors": {
        "theme": {
          "base": {
            "white": "#ffffff",
            "primary": "#6993FF",
            "secondary": "#E5EAEE",
            "success": "#1BC5BD",
            "info": "#8950FC",
            "warning": "#FFA800",
            "danger": "#F64E60",
            "light": "#F3F6F9",
            "dark": "#212121"
          },
          "light": {
            "white": "#ffffff",
            "primary": "#E1E9FF",
            "secondary": "#ECF0F3",
            "success": "#C9F7F5",
            "info": "#EEE5FF",
            "warning": "#FFF4DE",
            "danger": "#FFE2E5",
            "light": "#F3F6F9",
            "dark": "#D6D6E0"
          },
          "inverse": {
            "white": "#ffffff",
            "primary": "#ffffff",
            "secondary": "#212121",
            "success": "#ffffff",
            "info": "#ffffff",
            "warning": "#ffffff",
            "danger": "#ffffff",
            "light": "#464E5F",
            "dark": "#ffffff"
          }
        },
        "gray": {
          "gray-100": "#F3F6F9",
          "gray-200": "#ECF0F3",
          "gray-300": "#E5EAEE",
          "gray-400": "#D6D6E0",
          "gray-500": "#B5B5C3",
          "gray-600": "#80808F",
          "gray-700": "#464E5F",
          "gray-800": "#1B283F",
          "gray-900": "#212121"
        }
      },
      "font-family": "Poppins"
    };
  </script>
  <!--end::Global Config-->
  <!--begin::Global Theme Bundle(used by all pages)-->
  <script src="<?= BASE  ?>/front_assets/assets/plugins/global/plugins.bundle.js"></script>
  <script src="<?= BASE  ?>/front_assets/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
  <script src="<?= BASE  ?>/front_assets/assets/js/scripts.bundle.js"></script>

  <script src='<?= BASE ?>/assets/jquery.min.js'></script>
  <script src='<?= BASE ?>/assets/lightslider.js'></script>
  <!-- <script src="<?= BASE  ?>/front_assets/assets/js/pages/crud/forms/widgets/select2.js"></script> -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    $('#lightSlider').lightSlider({
      gallery: true,
      item: 1,
      loop: true,
      slideMargin: 0,
      thumbItem: 4
    });
  </script>

  <!-- script penambahan/pengurangan quantity  -->
  <script>
    function increment_quantity(cart_id) {
      var inputQuantityElement = $("#input-quantity-" + cart_id);
      var newQuantity = parseInt($(inputQuantityElement).val()) + 1;
      save_to_db(cart_id, newQuantity);
    }

    function decrement_quantity(cart_id) {
      var inputQuantityElement = $("#input-quantity-" + cart_id);
      if ($(inputQuantityElement).val() > 1) {
        var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
        save_to_db(cart_id, newQuantity);
      }
    }

    function save_to_db(cart_id, new_quantity) {
      var inputQuantityElement = $("#input-quantity-" + cart_id);

      $.ajax({
        url: "<?= base_url('front/updatecartproduk') ?>",
        data: "cart_id=" + cart_id + "&new_quantity=" + new_quantity,
        type: 'post',
        success: function(response) {
          $(inputQuantityElement).val(new_quantity);
          $(".refress").load(" .refress");

        }
      });
    }
  </script>

  <script type="text/javascript">
    // Provinsi
    $(document).ready(function() {
      $("#kota").select2({});
      // $("#kota").disabled();
      // $('#kota').prop('readOnly', true);
      $("#provinsi").select2({
        ajax: {
          url: '<?= BASE ?>/front/getdataprov',
          type: "post",
          dataType: 'json',
          delay: 200,
          data: function(params) {
            return {
              searchTerm: params.term
            };
          },
          processResults: function(response) {
            return {
              results: response
            };
          },
          cache: true
        },
        // placeholder: "Select a value",
      });
    });

    // kota
    $("#provinsi").change(function() {
      // $('#kota').prop('readOnly', false);

      var id_prov = $("#provinsi").val();
      $("#kota").select2({
        ajax: {
          url: '<?= base_url() ?>/front/getdatakot/' + id_prov,
          type: "post",
          dataType: 'json',
          delay: 200,
          data: function(params) {
            return {
              searchTerm: params.term
            };
          },
          processResults: function(response) {
            return {
              results: response
            };
          },
          cache: true
        }
      });
    });
  </script>
  <!--end::Global Theme Bundle-->
</body>
<!--end::Body-->

</html>