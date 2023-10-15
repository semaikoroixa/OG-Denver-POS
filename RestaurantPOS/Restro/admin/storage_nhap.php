<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
//Delete Staff
if (isset($_GET['delete'])) {
  $id = intval($_GET['delete']);
  $adn = "DELETE FROM  rpos_storage_nhap  WHERE  nhap_id = ?";
  $stmt = $mysqli->prepare($adn);
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $stmt->close();
  if ($stmt) {
    $success = "Đã xóa" && header("refresh:1; url=storage_nhap.php");
  } else {
    $err = "Vui lòng thử lại sau";
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
              <a href="add_storage_nhap.php" class="btn btn-outline-success"><i class="fas fa-user-plus"></i>Thêm sản phẩm nhập</a>
              <a href="search_nhap.php" class="btn btn-outline-success"><i class="fas fa-user-plus"></i>Tìm sản phẩm nhập</a>

            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Mã sản phẩm</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Giá nhập</th>
                    <th scope="col">Ngày nhập</th>
                    <th scope="col">Thực hiện</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $ret = "SELECT * FROM  rpos_storage_nhap ";
                  $stmt = $mysqli->prepare($ret);
                  $stmt->execute();
                  $res = $stmt->get_result();
                  while ($nhap = $res->fetch_object()) {
                  ?>
                    <tr>
                      <td><?php echo $nhap->nhap_code; ?></td>
                      <td><?php echo $nhap->nhap_name; ?></td>
                      <td><?php echo $nhap->nhap_qty; ?></td>
                      <td>$ <?php echo $nhap->nhap_price; ?></td>
                      <td><?php echo $nhap->nhap_time; ?></td>
                      <td>
                        <a href="storage_nhap.php?delete=<?php echo $nhap->nhap_id; ?>">
                          <button class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                            Xóa
                          </button>
                        </a>

                        <a href="update_storage_nhap.php?update=<?php echo $nhap->nhap_id; ?>">
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