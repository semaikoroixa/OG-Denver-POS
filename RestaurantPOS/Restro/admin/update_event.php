<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

check_login();
//Udpate Staff
if (isset($_POST['UpdateEvent'])) {
  //Prevent Posting Blank Values
  if (empty($_POST["event_name"]) || empty($_POST["event_des"]) || empty($_POST['event_start']) || empty($_POST['event_end'])) {
    $err = "Không chấp nhận khoảng trống";
  } else {
    $event_name = $_POST['event_name'];
    $event_des = $_POST['event_des'];
    $event_start = $_POST['event_start'];
    $event_end = $_POST['event_end'];
    $update = $_GET['update'];

    //Insert Captured information to a database table
    $postQuery = "UPDATE rpos_event SET event_name =?, event_des =?, event_start =?, event_end =? WHERE event_id =?";
    $postStmt = $mysqli->prepare($postQuery);
    //bind paramaters
    $rc = $postStmt->bind_param('ssssi', $event_name, $event_des, $event_start, $event_end, $update);
    $postStmt->execute();
    //declare a varible which will be passed to alert function
    if ($postStmt) {
      $success = "Sự kiện đã cập nhật" && header("refresh:1; url=event.php");
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
    $ret = "SELECT * FROM  rpos_event WHERE event_id = '$update' ";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($event = $res->fetch_object()) {
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
                      <input type="text" name="event_name" class="form-control" value="<?php echo $event->event_name; ?>">
                    </div>
                    <div class="col-md-6">
                      <label>Mô tả sự kiện</label>
                      <input type="text" name="event_des" class="form-control" value="<?php echo $event->event_des; ?>">
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-6">
                      <label>Ngày bắt đầu</label>
                      <input type="date" name="event_start" class="form-control" value="<?php echo $event->event_start; ?>">
                    </div>
                    <div class="col-md-6">
                      <label>Ngày kết thúc</label>
                      <input type="date" name="event_end" class="form-control" value="<?php echo $event->event_end; ?>">
                    </div>
                  </div>
                  <br>
                  <div class="form-row">
                    <div class="col-md-6">
                      <input type="submit" name="UpdateEvent" value="Update Event" class="btn btn-success" value="">
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