<?php
include_once("config/koneksi.php");

$penjualan = mysqli_query($conn, "SELECT SUM(total_harga) AS total FROM t_transaksi");
$penjualan = mysqli_fetch_assoc($penjualan)['total'] ?? 0;

$pelanggan = mysqli_query($conn, "SELECT COUNT(*) AS total FROM t_transaksi");
$pelanggan = mysqli_fetch_assoc($pelanggan)['total'] ?? 0;

$produk = mysqli_query($conn, "SELECT COUNT(*) AS total FROM m_sepatu");
$produk = mysqli_fetch_assoc($produk)['total'] ?? 0;

$pendapatan = $penjualan;
?>
<!doctype html>

<html lang="en" class="layout-menu-fixed layout-compact" data-assets-path="assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <meta name="robots" content="noindex, nofollow" />

  <title>Dashboard - Sepatu Kita</title>

  <meta name="description" content="" />

  <link rel="icon" type="image/x-icon" href="assets/img/logo.png" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
    rel="stylesheet" />

  <link rel="stylesheet" href="assets/vendor/fonts/iconify-icons.css" />

  <link rel="stylesheet" href="assets/vendor/libs/node-waves/node-waves.css" />

  <link rel="stylesheet" href="assets/vendor/css/core.css" />
  <link rel="stylesheet" href="assets/css/demo.css" />

  <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />

  <script src="assets/vendor/js/helpers.js"></script>

  <script src="assets/js/config.js"></script>
</head>

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="index.php" class="app-brand-link">
            <span class="app-brand-logo demo me-1">
              <img src="assets/img/logo.png" alt="Logo" style="height: 24px;">
            </span>
            <span class="app-brand-text demo menu-text fw-semibold ms-2">SepatuKita</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="menu-toggle-icon d-xl-inline-block align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <li class="menu-item active">
            <a href="index.php" class="menu-link">
              <i class="menu-icon icon-base ri ri-home-smile-line"></i>
              <div data-i18n="Dashboards">Dashboard</div>
            </a>
          </li>
          <li class="menu-header mt-7">
            <span class="menu-header-text">General Menu</span>
          </li>
          <li class="menu-item">
            <a href="data-sepatu.php" class="menu-link">
              <i class="menu-icon icon-base ri ri-footprint-line"></i>
              <div>Sepatu</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="data-transaksi.php" class="menu-link">
              <i class="menu-icon icon-base ri ri-shopping-cart-line"></i>
              <div>Transaksi</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="data-kategori.php" class="menu-link">
              <i class="menu-icon icon-base ri ri-apps-line"></i>
              <div>Kategori</div>
            </a>
          </li>
        </ul>
      </aside>

      <div class="layout-page">
        <nav
          class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme"
          id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
              <i class="icon-base ri ri-menu-line icon-md"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">
            <ul class="navbar-nav flex-row align-items-center ms-md-auto">
              <!-- User -->
              <li class="nav-item">
                <a class="nav-link hide-arrow p-0" href="javascript:void(0);">
                  <div class="avatar avatar-online">
                    <img src="assets/img/avatars/1.png" alt="alt" class="rounded-circle" />
                  </div>
                </a>
              </li>
              <!--/ User -->
            </ul>
          </div>
        </nav>

        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row gy-6">
              <div class="col-lg-12">
                <div class="card h-100">
                  <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                      <h5 class="card-title m-0 me-2">Transaksi</h5>
                    </div>
                  </div>
                  <div class="card-body pt-lg-5">
                    <div class="row g-6">
                      <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                          <div class="avatar">
                            <div class="avatar-initial bg-primary rounded shadow-xs">
                              <i class="icon-base ri ri-pie-chart-2-line icon-24px"></i>
                            </div>
                          </div>
                          <div class="ms-3">
                            <p class="mb-0">Penjualan</p>
                            <h5 class="mb-0"><?= number_format($penjualan, 0, ',', '.') ?></h5>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                          <div class="avatar">
                            <div class="avatar-initial bg-success rounded shadow-xs">
                              <i class="icon-base ri ri-group-line icon-24px"></i>
                            </div>
                          </div>
                          <div class="ms-3">
                            <p class="mb-0">Pelanggan</p>
                            <h5 class="mb-0"><?= $pelanggan ?></h5>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                          <div class="avatar">
                            <div class="avatar-initial bg-warning rounded shadow-xs">
                              <i class="icon-base ri ri-macbook-line icon-24px"></i>
                            </div>
                          </div>
                          <div class="ms-3">
                            <p class="mb-0">Produk</p>
                            <h5 class="mb-0"><?= $produk ?></h5>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                          <div class="avatar">
                            <div class="avatar-initial bg-info rounded shadow-xs">
                              <i class="icon-base ri ri-money-dollar-circle-line icon-24px"></i>
                            </div>
                          </div>
                          <div class="ms-3">
                            <p class="mb-0">Pendapatan</p>
                            <h5 class="mb-0"><?= number_format($pendapatan, 0, ',', '.') ?></h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- / Content -->

          <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
              <div
                class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  &#169;
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , by
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-medium">Sepatu Kita</a>
                </div>
              </div>
            </div>
          </footer>
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
      </div>
    </div>

    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <script src="assets/vendor/libs/jquery/jquery.js"></script>

  <script src="assets/vendor/libs/popper/popper.js"></script>
  <script src="assets/vendor/js/bootstrap.js"></script>
  <script src="assets/vendor/libs/node-waves/node-waves.js"></script>

  <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="assets/vendor/js/menu.js"></script>

  <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

  <script src="assets/js/main.js"></script>

  <script src="assets/js/dashboards-analytics.js"></script>

  <script async="async" defer="defer" src="https://buttons.github.io/buttons.js"></script>
</body>

</html>