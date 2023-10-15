<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
require_once('partials/_head.php');

// Xử lý khi người dùng submit biểu mẫu lọc doanh thu
if (isset($_POST['submit'])) {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Chuyển đổi định dạng ngày
    $start_date = date('d/m/Y', strtotime($start_date));
    $end_date = date('d/m/Y', strtotime($end_date));

    // Lọc doanh thu theo ngày bắt đầu và ngày kết thúc
    $query = "SELECT * FROM rpos_orders WHERE order_status = 'Paid' AND DATE_FORMAT(created_at, '%d/%m/%Y') BETWEEN ? AND ? ORDER BY created_at DESC";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ss", $start_date, $end_date);
    $stmt->execute();
    $result = $stmt->get_result();


    // Tính tổng doanh thu
    $total_revenue = 0;
    $result->data_seek(0); // Đưa con trỏ về đầu kết quả
    while ($order = $result->fetch_object()) {
        $total_revenue += (floatval($order->prod_price) * floatval($order->prod_qty));
    }
}
?>

<body>
    <!-- Sidenav -->
    <?php require_once('partials/_sidebar.php'); ?>
    <!-- Main content -->
    <div class="main-content">
        <!-- Top navbar -->
        <?php require_once('partials/_topnav.php'); ?>
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
            <!-- Filter form -->
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <h1 align="center">XEM DOANH THU</h1>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="">
                                <div class="form-group">
                                    <label for="start_date">Ngày bắt đầu</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                                </div>
                                <div class="form-group">
                                    <label for="end_date">Ngày kết thúc</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date" required>
                                </div>
                                <div align="center">
                                <button type="submit" class="btn btn-success" name="submit">Xem doanh thu</button>
                                </div>
                                <?php
                                   $totalRevenue=0;
                                    // $ret = "SELECT * FROM  rpos_orders WHERE order_status = 'Paid' ORDER BY `rpos_orders`.`created_at` DESC  ";
                                    $ret="SELECT * from rpos_payments ORDER BY `rpos_payments`.`created_at` DESC ";
                                    $stmt = $mysqli->prepare($ret);
                                    $stmt->execute();
                                    $res = $stmt->get_result();
                                    while ($pay = $res->fetch_object()) {
                                        // $total = (floatval($order->prod_price) * floatval($order->prod_qty));
                                        $totalRevenue += $pay->pay_amt;
                                    ?>
                                    <?php }?>
                                    
                                    <h2 style="color: #00cec9;"><b>Tổng doanh thu: $ <?php echo $totalRevenue; ?></b></h1>
                                    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table -->
            <?php if (isset($total_revenue)) { ?>
                <div class="row mt-4">
                    <div class="col">
                        <div class="card shadow">
                        <div class="card-header border-0">
    Tổng doanh thu từ ngày <?php echo $start_date; ?> đến ngày <?php echo $end_date; ?> là:
</div>
                            <div class="card-body">
                                <h1 class="text-success"><b>$ <?php echo $total_revenue; ?><b></h1>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- Footer -->
            <?php require_once('partials/_footer.php'); ?>
        </div>
    </div>
    <!-- Argon Scripts -->
    <?php require_once('partials/_scripts.php'); ?>
</body>
</html>