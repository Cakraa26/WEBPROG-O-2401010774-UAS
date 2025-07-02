<!doctype html>

<html lang="en" class="layout-menu-fixed layout-wide" data-assets-path="assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <meta name="robots" content="noindex, nofollow" />

  <title>Data Kategori - Sepatu Kita</title>

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
          <li class="menu-item">
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
          <li class="menu-item active">
            <a href="data-kategori.php" class="menu-link">
              <i class="menu-icon icon-base ri ri-apps-line"></i>
              <div>Kategori</div>
            </a>
          </li>
        </ul>
      </aside>

      <div class="layout-page">
        <nav
          class="layout-navbar container-fluid navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme"
          id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
              <i class="icon-base ri ri-menu-line icon-md"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">

            <ul class="navbar-nav flex-row align-items-center ms-md-auto">
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
          <div class="container-fluid flex-grow-1 container-p-y">
            <?php if (isset($_GET['pesan'])): ?>
              <?php if ($_GET['pesan'] == 'sukses'): ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                  Data berhasil ditambahkan!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php elseif ($_GET['pesan'] == 'edit_sukses'): ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                  Data berhasil diperbarui!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php elseif ($_GET['pesan'] == 'hapus_sukses'): ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                  Data berhasil dihapus!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php elseif ($_GET['pesan'] == 'gagal'): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  Aksi gagal, silakan coba lagi.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php endif; ?>
            <?php endif; ?>

            <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Data Kategori</h5>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
                  <i class="ri ri-add-line me-1"></i> Tambah Data
                </button>
              </div>
              <div class="card-body">
                <div class="table-responsive text-nowrap">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include_once("config/koneksi.php");
                      $sql = "SELECT * FROM m_kategori";
                      $res = mysqli_query($conn, $sql);
                      $no = 0;
                      while ($row = mysqli_fetch_array($res)) {
                        $no++;
                        ?>
                        <tr>
                          <td><?= $no ?></td>
                          <td class="text-nowrap"><?= $row["kategori"] ?></td>
                          <td><?= $row["deskripsi"] ?></td>
                          <td class="text-nowrap">
                            <button class="btn btn-warning" data-bs-toggle="modal"
                              data-bs-target="#editModal<?= $row['id'] ?>">
                              <i class="ri ri-edit-line"></i>
                            </button>
                            <a href="simpan_kategori.php?hapus=<?= $row["id"] ?>"
                              onclick="return confirm('Yakin ingin menghapus data kategori ini?');"
                              class="btn btn-danger"><i class="ri ri-delete-bin-line"></i>
                            </a>
                          </td>
                        </tr>
                        <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>


          <!-- Modal Tambah Data -->
          <div class="modal fade" id="tambahModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalCenterTitle">Tambah Data Transaksi</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="simpan_kategori.php" method="POST">
                  <div class="modal-body">
                    <div class="row">
                      <div class="mb-3 mt-2">
                        <div class="form-floating form-floating-outline">
                          <input type="text" name="kategori" id="kategori" class="form-control"
                            placeholder="Masukkan Nama Kategori" />
                          <label for="kategori">Nama Kategori</label>
                        </div>
                      </div>
                      <div class="mb-3 mt-2">
                        <div class="form-floating form-floating-outline">
                          <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Tulis Deskripsi"
                            style="height: 100px;"></textarea>
                          <label for="deskripsi">Deskripsi</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                      Batal
                    </button>
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Modal Edit -->
          <?php
          $sql = "SELECT * FROM m_kategori";
          $res = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_array($res)) {
            ?>
            <div class="modal fade" id="editModal<?= $row['id'] ?>" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Edit Data Sepatu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="simpan_kategori.php" method="POST">
                    <div class="modal-body">
                      <input type="hidden" name="id" value="<?= $row['id'] ?>">
                      <div class="row">
                        <div class="mb-3 mt-2">
                          <div class="form-floating form-floating-outline">
                            <input type="text" name="kategori" id="kategori" class="form-control"
                              placeholder="Masukkan Nama Kategori" value="<?= $row['kategori'] ?>" />
                            <label for="kategori">Nama Kategori</label>
                          </div>
                        </div>
                        <div class="mb-3 mt-2">
                          <div class="form-floating form-floating-outline">
                            <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Tulis Deskripsi"
                              style="height: 100px;"><?= $row['deskripsi'] ?></textarea>
                            <label for="deskripsi">Deskripsi</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Batal
                      </button>
                      <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          <?php } ?>
          <!-- / Content -->

          <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-fluid">
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

  <script src="assets/js/main.js"></script>

  <script async="async" defer="defer" src="https://buttons.github.io/buttons.js"></script>
</body>

</html>