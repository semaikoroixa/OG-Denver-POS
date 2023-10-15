<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

check_login();
//Udpate Staff
if (isset($_POST['UpdateNhap'])) {
  //Prevent Posting Blank Values
  if (empty($_POST["nhap_code"]) || empty($_POST["nhap_name"]) || empty($_POST['nhap_qty']) || empty($_POST['nhap_price']) || empty($_POST['nhap_time'])) {
    $err = "Không được để trống!";
  } else {
    $nhap_code = $_POST['nhap_code'];
        $nhap_name = $_POST['nhap_name'];
        $nhap_qty = $_POST['nhap_qty'];
        $nhap_price = $_POST['nhap_price'];
        $nhap_time = $_POST['nhap_time'];
    $update = $_GET['update'];
    
    //Insert Captured information to a database table
    $postQuery = "UPDATE rpos_storage_nhap SET  nhap_code =?, nhap_name =?, nhap_qty =?, nhap_price =?, , nhap_time =? WHERE nhap_id =?";
    $postStmt = $mysqli->prepare($postQuery);
    //bind paramaters
    $rc = $postStmt->bind_param('sssssi', $nhap_code, $nhap_name, $nhap_qty, $nhap_price, $nhap_time, $update);
    $postStmt->execute();
    //declare a varible which will be passed to alert function
    if ($postStmt) {
      $success = "Sản Phẩm đã cập nhật" && header("refresh:1; url=storage_nhap.php");
    } else {
      $err = "Vui lòng thử lại sau";
    }
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
    $update = $_GET['update'];
    $ret = "SELECT * FROM rpos_storage_nhap WHERE nhap_id = '$update' ";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($nhap = $res->fetch_object()) {
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
                <h3>Điền thông tin</h3>
              </div>
              <div class="card-body">
                <form method="POST">
                  <div class="form-row">
                    <div class="col-md-6">
                      <label>Mã Sản Phẩm</label>
                      <input type="text" name="nhap_code" class="form-control" value="<?php echo $nhap->nhap_code; ?>">
                    </div>
                    <div class="col-md-6">
                      <label>Tên Sản Phẩm</label>
                      <input type="text" name="nhap_name" class="form-control" value="<?php echo $nhap->nhap_name; ?>">
                    </div>
                  </div>
                  <div class="form-row">
                  <div class="col-md-6">
                    <label>Số Lượng</label>
                    <input type="text" name="nhap_qty" class="form-control" value="<?php echo $nhap->nhap_qty; ?>">
                  </div>
                  <div class="col-md-6">
                    <label>Giá nhập</label>
                    <input type="text" name="nhap_price" class="form-control" value="<?php echo $nhap->nhap_price; ?>">
                  </div>
                  <div class="col-md-6">
                    <label>Ngày nhập</label>
                    <input type="date" name="nhap_time" class="form-control" value="<?php echo $nhap->nhap_time; ?>">
                  </div>
                </div>
                  
                  <br>
                  <div class="form-row">
                    <div class="col-md-6">
                      <input type="submit" name="UpdateNhap" value="Update Storage" class="btn btn-success" value="">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Footer -->
      <?php
      require_once('partials/_footer.php');
    }
      ?>
      </div>
  </div>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
</body>

</html>