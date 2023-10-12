<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();

require_once('partials/_head.php');
if (isset($_GET['cancel'])) {
  $id = intval($_GET['cancel']);
  $table_status = 'Trống';
  $adn = "UPDATE rpos_table SET table_status = ?,customer_id=null,customer_name=null,capacity=null WHERE  table_id = ?";
  $stmt = $mysqli->prepare($adn);
  $stmt->bind_param('ss',$table_status,$id);
  $stmt->execute();
  $stmt->close();
  if ($stmt) {
      $success = "Đã xóa bàn" && header("refresh:1; url=table_orders.php");
  } else {
      $err = "Vui lòng thử lại sau";  
  }
  echo "<script>alert('Xóa bàn thành công!')</script>";
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
            <div class="card-header border-0" style="text-align:center">
              DANH SÁCH BÀN
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col"><b>Số bàn</b></th>
                    <th scope="col"><b>ID Khách</b></th>
                    <th scope="col"><b>Tên khách đặt</b></th>
                    <th scope="col"><b>Trạng thái</b></th>
                    <th scope="col"><b>Số người</b></th>
                    <th scope="col"><b>Thực hiện</b></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $ret = "SELECT * FROM  rpos_table WHERE table_status='Đã đặt'";
                  $stmt = $mysqli->prepare($ret);
                  $stmt->execute();
                  $res = $stmt->get_result();
                  while ($table = $res->fetch_assoc()) {
                  ?>
                    <tr>
                    <td><?php echo $table['table_id']; ?></td>
                      <td><?php echo $table['customer_id'] ?></td>
                      <td><?php echo$table['customer_name'] ?></td>
                      <td> <?php echo $table['table_status'] ?></td>
                      <td> <?php echo $table['capacity'] ?></td>
                      <td>
                      <!-- <a href="table_orders.php?delete=<?php echo $table['table_id'] ?>">
                          <button class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                            Xóa bàn
                          </button>
                        </a> -->
                        <a href="table_orders.php?cancel=<?php echo $table['table_id']?>">
                        <button class="btn btn-sm btn-warning">
                        <i class="fa fa-ban" aria-hidden="true"></i>
                            Hủy bàn
                          </button>
                          </a>
                        <a href="table_details.php?customer_id=<?php echo $table['customer_id']?>">
                        <button class="btn btn-sm btn-warning">
                        <i class="fa fa-table" aria-hidden="true"></i>
                            Chi tiết
                          </button>
                        </a>
                      </td>
                    </tr>
                  <?php 
                } ?>
                 <?php
                  $ret = "SELECT * FROM  rpos_table WHERE table_status='Trống'";
                  $stmt = $mysqli->prepare($ret);
                  $stmt->execute();
                  $res = $stmt->get_result();
                  while ($table = $res->fetch_assoc()) {
                  ?>
                    <tr>
                    <td><?php echo $table['table_id']; ?></td>
                      <td><?php echo $table['customer_id'] ?></td>
                      <td><?php echo$table['customer_name'] ?></td>
                      <td> <?php echo $table['table_status'] ?></td>
                      <td> <?php echo $table['capacity'] ?></td>
                      <td>
                        <a href="make_table.php?table_id=<?php echo $table['table_id']?>">
                        <button class="btn btn-sm btn-warning">
                        <i class="fa fa-table" aria-hidden="true"></i>
                            Đặt bàn
                          </button>
                        </a>
                        <!-- <a href="table_orders.php?cancel=<?php echo $table['table_id']?>">
                        <button class="btn btn-sm btn-warning">
                        <i class="fa fa-ban" aria-hidden="true"></i>
                            Hủy bàn
                          </button>
                          </a> -->
                       
                      </td>
                    </tr>
                  <?php 
                } ?>
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