
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
                        <div class="card-header border-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <h1 class="mb-0">DANH SÁCH HÓA ĐƠN</h1>
                                    <br>
                                    <button type="submit" class="btn btn-success mb-2 col-md-6" align="center" name="export">Xuất ra file excel</button>
                                </div>
                                <div class="col-md-6">
                                    <form action="" method="GET" class="form-inline float-right">
                                    <div class="mb-2">
                                            Từ
                                        </div>
                                        <div class="form-group mx-sm-3 mb-2">
                                            <label for="start_date" class="sr-only">Ngày bắt đầu</label>
                                            <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Ngày bắt đầu" required>
                                        </div>
                                        <div class="mb-2">
                                            Đến
                                        </div>
                                        <div class="form-group mx-sm-3 mb-2">
                                            <label for="end_date" class="sr-only">Ngày kết thúc</label>
                                            <input type="date" class="form-control" id="end_date" name="end_date" placeholder="Ngày kết thúc" required>
                                        </div>
                                        <button type="submit" class="btn btn-danger mb-2">Lọc</button>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-success" scope="col">Code</th>
                                        <th scope="col">Khách hàng</th>
                                        <th class="text-success" scope="col">Product</th>
                                        <th scope="col">Giá</th>
                                        <th class="text-success" scope="col">Số lượng</th>
                                        <th scope="col">Tổng tiền</th>
                                        <th class="text-success" scope="col">Date</th>
                                        <th scope="col">Thực hiện</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                    // Kiểm tra nếu ngày bắt đầu và ngày kết thúc đã được gửi từ biểu mẫu
                                    if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
                                        $start_date = date('Y-m-d', strtotime($_GET['start_date']));
                                        $end_date = date('Y-m-d', strtotime($_GET['end_date']));

                                        // Lọc dữ liệu theo ngày bắt đầu và ngày kết thúc
                                        $ret = "SELECT * FROM rpos_orders WHERE order_status = 'Paid' AND DATE(created_at) BETWEEN '$start_date' AND '$end_date' ORDER BY created_at DESC";
                                    } else {
                                        // Trường hợp không có ngày bắt đầu và ngày kết thúc, lấy tất cả dữ liệu
                                        $ret = "SELECT * FROM rpos_orders WHERE order_status = 'Paid' ORDER BY created_at DESC";
                                    }

                                    // Tiếp tục xử lý dữ liệu như trước
                                    $stmt = $mysqli->prepare($ret);
                                    $stmt->execute();
                                    $res = $stmt->get_result();
                                    while ($order = $res->fetch_object()) {
                                        $total = (floatval($order->prod_price) * floatval($order->prod_qty));

                                    ?>
                                        <tr>
                                            <th class="text-success" scope="row"><?php echo $order->order_code; ?></th>
                                            <td><?php echo $order->customer_name; ?></td>
                                            <td class="text-success"><?php echo $order->prod_name; ?></td>
                                            <td>$ <?php echo $order->prod_price; ?></td>
                                            <td class="text-success"><?php echo $order->prod_qty; ?></td>
                                            <td>$ <?php echo $total; ?></td>
                                            <td><?php echo date('d/M/Y g:i', strtotime($order->created_at)); ?></td>
                                            <td>
                                                <a target="_blank" href="print_receipt.php?order_code=<?php echo $order->order_code; ?>">
                                                    <button class="btn btn-sm btn-primary">
                                                        <i class="fas fa-print"></i>
                                                        In hóa đơn
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
    <!-- Core -->
    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Optional JS -->
    <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
    <!-- Argon JS -->
    <script src="assets/js/argon.js?v=1.2.0"></script>
</body>

</html>