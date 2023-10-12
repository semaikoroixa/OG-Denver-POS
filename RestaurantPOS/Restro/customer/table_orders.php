<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();

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
              DANH SÁCH BÀN CỦA BẠN
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
                  $customer_id = $_SESSION['customer_id'];
                
                  $ret = "SELECT * FROM  rpos_table WHERE customer_id='$customer_id'";
                  $stmt = $mysqli->prepare($ret);
                  $stmt->execute();
                  $res = $stmt->get_result();

                  if ($res->num_rows > 0) {
                    // Có ít nhất một hàng được trả về từ câu truy vấn
                  
                  while ($table = $res->fetch_assoc()) {
                  ?>
                    <tr>
                    <td><?php echo $table['table_id']; ?></td>
                      <td><?php echo $table['customer_id'] ?></td>
                      <td><?php echo$table['customer_name'] ?></td>
                      <td> <?php echo $table['table_status'] ?></td>
                      <td> <?php echo $table['capacity'] ?></td>
                      <td>
                       
                        <button class="btn btn-sm btn-warning">
                        <i class="fa fa-ban" aria-hidden="true"></i>
                            Hủy bàn
                          </button>
                        <a href="table_details.php?customer_id=<?php echo $table['customer_id']?>">
                        <button class="btn btn-sm btn-warning">
                        <i class="fa fa-table" aria-hidden="true"></i>
                            Chi tiết
                          </button>
                        </a>
                      </td>
                      </td>
                    </tr>
                  <?php } }
                  else {
                    ?>
                    <div class="card-header border-0">
                        <a href="table_order2.php" class="btn btn-outline-success">
                            <i class="fas fa-table"></i> <i class="fas fa-utensils"></i>
                            Không có bàn? Đặt ngay!
                        </a>
                    </div>
                    <?php
                }
                 
                
                
                  ?>
                  
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