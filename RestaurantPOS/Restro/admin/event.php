<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
//Delete Staff
if (isset($_GET['delete'])) {
  $event_code = $_GET['delete'];
  $adn = "DELETE FROM  rpos_event  WHERE  event_code = ?";
  $stmt = $mysqli->prepare($adn);
  $stmt->bind_param('s', $event_code);
  $stmt->execute();
  $stmt->close();
  if ($stmt) {
    $success = "Đã xóa" && header("refresh:1; url=events.php");
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
              <a href="add_events.php" class="btn btn-outline-success">
                <i class="fas fa-user-plus"></i>
                Thêm Sự Kiện mới
              </a>

              <a href="search_events.php" class="btn btn-outline-success">
                <i class="fa fa-search"></i>
                Tìm kiếm
              </a>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Mã sự kiện</th>
                    <th scope="col">Tên sự kiện</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Ngày bắt đầu</th>
                    <th scope="col">Ngày kết thúc</th>
                    <th scope="col">Thực hiện</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $ret = "SELECT * FROM  rpos_event  ORDER BY `rpos_event`.`event_start` DESC ";
                  $stmt = $mysqli->prepare($ret);
                  $stmt->execute();
                  $res = $stmt->get_result();
                  while ($event = $res->fetch_object()) {
                  ?>
                    <tr>
                      <td><?php echo $event->event_code; ?></td>
                      <td><?php echo $event->event_name; ?></td>
                      <td><?php echo $event->event_des; ?></td>
                      <td><?php echo $event->event_start; ?></td>
                      <td><?php echo $event->event_end; ?></td>
                      <td>
                        <a href="events.php?delete=<?php echo $event->event_code; ?>">
                          <button class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                           Xóa
                          </button>
                        </a>

                        <a href="update_events.php?update=<?php echo $event->event_code; ?>">
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