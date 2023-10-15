<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

check_login();

//Add Staff
if (isset($_POST['addEvent'])) {
  //Prevent Posting Blank Values
  if (empty($_POST["event_name"]) || empty($_POST["event_des"]) || empty($_POST['event_start']) || empty($_POST['event_end'])) {
    $err = "Không được để trống!";
  } else {
    $event_name = $_POST['event_name'];
    $event_des = $_POST['event_des'];
    $event_start = $_POST['event_start'];
    $event_end = $_POST['event_end'];
    if (strtotime($event_start) > strtotime($event_end)) {
        $err = "Ngày bắt đầu phải nhỏ hơn ngày kết thúc";
      } else if (strtotime($event_start) > strtotime(date('Y-m-d'))) {
        $err = "Ngày bắt đầu không thể lớn hơn ngày hiện tại";
      } else {
    //Insert Captured information to a database table
    $postQuery = "INSERT INTO rpos_event (event_name, event_des, event_start, event_end) VALUES(?,?,?,?)";
    $postStmt = $mysqli->prepare($postQuery);
    //bind paramaters
    $rc = $postStmt->bind_param('ssss', $event_name, $event_des, $event_start, $event_end);
    $postStmt->execute();
    //declare a varible which will be passed to alert function
    if ($postStmt) {
      $success = "Sự kiện đã thêm" && header("refresh:1; url=event.php");
    } else {
      $err = "Vui lòng thử lại";
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
                    <label>Tên sự kiện</label>
                    <input type="text" name="event_name" class="form-control" value="">
                  </div>
                  <div class="col-md-6">
                    <label>Mô tả sự kiện</label>
                    <input type="text" name="event_des" class="form-control" value="">
                  </div>
                </div>
                <hr>
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Ngày bắt đầu</label>
                    <input type="date" name="event_start" class="form-control" value="">
                  </div>
                  <div class="col-md-6">
                    <label>Ngày kết thúc</label>
                    <input type="date" name="event_end" class="form-control" value="">
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="submit" name="addEvent" value="Add Event" class="btn btn-success" value="">
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
      ?>
    </div>
  </div>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
</body>

</html>