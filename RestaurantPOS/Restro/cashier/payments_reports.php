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
                                    <h1 class="mb-0">DANH SÁCH THANH TOÁN</h1>
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
                                            <input type="date" class="form-control" id="end_date" name="end_date"  placeholder="Ngày kết thúc" required>
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
                                        <th class="text-success" scope="col">Mã thanh toán</th>
                                        <th scope="col">Phương thức thanh toán</th>
                                        <th class="text-success" scope="col">Mã đơn</th>
                                        <th scope="col">Số tiền</th>
                                        <th class="text-success" scope="col">Ngày thanh toán</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                  
                                     if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
                                        $start_date = date('Y-m-d', strtotime($_GET['start_date']));
                                        $end_date = date('Y-m-d', strtotime($_GET['end_date']));

                                        // Lọc dữ liệu theo ngày bắt đầu và ngày kết thúc
                                        $ret = "SELECT * FROM  rpos_payments   WHERE DATE(created_at) BETWEEN '$start_date' AND '$end_date' ORDER BY created_at DESC";
                                    } else {
                                        // Trường hợp không có ngày bắt đầu và ngày kết thúc, lấy tất cả dữ liệu
                                        $ret = "SELECT * FROM  rpos_payments ORDER BY created_at DESC";
                                    }
                                    
                                    $stmt = $mysqli->prepare($ret);
                                    $stmt->execute();
                                    $res = $stmt->get_result();
                                    while ($payment = $res->fetch_object()) {
                                    ?>
                                        <tr>
                                            <th class="text-success" scope="row">
                                                <?php echo $payment->pay_code; ?>
                                            </th>
                                            <th scope="row">
                                                <?php echo $payment->pay_method; ?>
                                            </th>
                                            <td class="text-success">
                                                <?php echo $payment->order_code; ?>
                                            </td>
                                            <td>
                                                <?php echo $payment->pay_amt; ?>
                                            </td>
                                            <td class="text-success">
                                                <?php echo date('d/M/Y g:i', strtotime($payment->created_at)) ?>
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