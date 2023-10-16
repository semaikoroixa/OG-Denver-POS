<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
//Delete ncc
if (isset($_GET['delete'])) {
  $mancc = ($_GET['delete']);
  $adn = "DELETE FROM  rpos_ncc  WHERE  mancc = ?";
  $stmt = $mysqli->prepare($adn);
  $stmt->bind_param('s', $mancc);
  $stmt->execute();
  $stmt->close();
  if ($stmt) {
    $success = "Đã xóa" && header("refresh:1; url=nha_cung_cap.php");
  } else {
    $err = "Thử lại sau";
  }
}
require_once('partials/_head.php');
?>

<body>
  <!-- Sidenav -->
  <?php
  require_once('partials/_sidebar.php');
  ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <?php
    require_once('partials/_topnav.php');
    ?>
    <!-- Header -->
    <div style="background-image: url(assets/img/theme/restro00.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
    <span class="mask bg-gradient-dark opacity-8"></span>
      <div class="container-fluid">
        <div class="header-body">
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--8">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <a href="add_ncc.php" class="btn btn-outline-success">
                <i class="fas fa-user-plus"></i>
                Thêm nhà cung cấp mới
              </a>
              <a href="search_ncc.php" class="btn btn-outline-success">
                <i class="fa fa-search"></i>
                Tìm kiếm
              </a>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Mã NCC</th>
                    <th scope="col">Công ty</th>
                    <th scope="col">Đại diện</th>
                    <th scope="col">SĐT</th>
                    <th scope="col">Email</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Thực hiện</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $ret = "SELECT * FROM  rpos_ncc  ORDER BY `rpos_ncc`.`thoigian` DESC ";
                  $stmt = $mysqli->prepare($ret);
                  $stmt->execute();
                  $res = $stmt->get_result();
                  while ($ncc = $res->fetch_object()) {
                  ?>
                    <tr>
                      <td><?php echo $ncc->mancc; ?></td>
                      <td><?php echo $ncc->tencty; ?></td>
                      <td><?php echo $ncc->daidien; ?></td>
                      <td><?php echo $ncc->sdt; ?></td>
                      <td><?php echo $ncc->email; ?></td>
                      <td><?php echo $ncc->diachi; ?></td>
                    
                      <td>
                        <a href="nha_cung_cap.php?delete=<?php echo $ncc->mancc; ?>">
                          <button class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                           Xóa
                          </button>
                        </a>

                        <a href="update_ncc.php?update=<?php echo $ncc->mancc; ?>">
                          <button class="btn btn-sm btn-primary">
                            <i class="fas fa-user-edit"></i>
                            Cập nhật
                          </button>
                        </a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <?php
      require_once('partials/_footer.php');
      ?>
    </div>
  </div>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
</body>

</html>