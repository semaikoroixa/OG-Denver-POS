<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

check_login();
//Udpate Staff
if (isset($_POST['UpdateStaff'])) {
  //Prevent Posting Blank Values
  if (empty($_POST["staff_number"]) || empty($_POST["staff_name"]) || empty($_POST['staff_email']) || empty($_POST['staff_password'])) {
    $err = "Không chấp nhận khoảng trống";
  } else {
    $staff_number = $_POST['staff_number'];
    $staff_name = $_POST['staff_name'];
    $staff_email = $_POST['staff_email'];
    $staff_password = $_POST['staff_password'];
    $update = $_GET['update'];
        // Check if staff_email already exists in the database (excluding the current staff being updated)
        $checkQuery = "SELECT * FROM rpos_staff WHERE staff_email = ? AND staff_id != ?";
        $checkStmt = $mysqli->prepare($checkQuery);
        $checkStmt->bind_param('si', $staff_email, $update);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            $err = "Email đã tồn tại trong hệ thống. Vui lòng chọn một địa chỉ email khác.";
        } else {

    //Insert Captured information to a database table
    $postQuery = "UPDATE rpos_staff SET  staff_number =?, staff_name =?, staff_email =?, staff_password =? WHERE staff_id =?";
    $postStmt = $mysqli->prepare($postQuery);
    //bind paramaters
    $rc = $postStmt->bind_param('ssssi', $staff_number, $staff_name, $staff_email, $staff_password, $update);
    $postStmt->execute();
    //declare a varible which will be passed to alert function
    if ($postStmt) {
      $success = "Nhân viên đã cập nhật" && header("refresh:1; url=hrm.php");
    } else {
      $err = "Vui lòng thử lại sau";
    }
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
    $ret = "SELECT * FROM  rpos_staff WHERE staff_id = '$update' ";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($staff = $res->fetch_object()) {
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
                      <label>Mã Nhân viên</label>
                      <input type="text" name="staff_number" class="form-control" value="<?php echo $staff->staff_number; ?>">
                    </div>
                    <div class="col-md-6">
                      <label>Tên Nhân viên</label>
                      <input type="text" name="staff_name" class="form-control" value="<?php echo $staff->staff_name; ?>">
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-6">
                      <label>Email Nhân viên</label>
                      <input type="email" name="staff_email" class="form-control" value="<?php echo $staff->staff_email; ?>">
                    </div>
                    <div class="col-md-6">
                      <label>Mật khẩu NV</label>
                      <input type="password" name="staff_password" class="form-control" value="">
                    </div>
                  </div>
                  <br>
                  <div class="form-row">
                    <div class="col-md-6">
                      <input type="submit" name="UpdateStaff" value="Update Staff" class="btn btn-success" value="">
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