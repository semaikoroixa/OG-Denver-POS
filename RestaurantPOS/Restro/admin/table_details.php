<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
//Cancel Order
if (isset($_GET['cancel'])) {
    $id = $_GET['cancel'];
    $adn = "DELETE FROM  rpos_orders  WHERE  order_id = ?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $stmt->close();
    if ($stmt) {
        $success = "Đã xóa" && header("refresh:1; url=payments.php");
    } else {
        $err = "Vui lòng thử lại sau";
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
                            <a href="orders.php" class="btn btn-outline-success">
                                <i class="fas fa-plus"></i> <i class="fas fa-utensils"></i>
                                Đặt đơn mới
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Mã</th>
                                        <th scope="col">Khách hàng</th>
                                        <th scope="col">Sản phẩm</th>
                                        <th scope="col">Tổng giá</th>
                                        <th scope="col">Ngày</th>
                                        <th scope="col">Thực hiện</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php
                                     $full_total=0;
                                    if (isset($_GET['customer_id'])) {
                                      
                                        $customer_id = $_GET['customer_id'];
                                    $ret = "SELECT * FROM  rpos_orders WHERE order_status ='' and customer_id='$customer_id' ORDER BY `rpos_orders`.`created_at` DESC  ";
                                    $stmt = $mysqli->prepare($ret);
                                    $stmt->execute();
                                    $res = $stmt->get_result();
                                    while ($order = $res->fetch_object()) {
                                        // $total = ($order->prod_price * $order->prod_qty);
                                        $total = (floatval($order->prod_price) * floatval($order->prod_qty));
                                        $full_total+=$total;
                                    ?>
                                        <tr>
                                            <th class="text-success" scope="row"><?php echo $order->order_code; ?></th>
                                            <td><?php echo $order->customer_name; ?></td>
                                            <td><?php echo $order->prod_name; ?></td>
                                            <td>$ <?php echo $total; ?></td>
                                            <td><?php echo date('d/M/Y g:i', strtotime($order->created_at)); ?></td>
                                            <td>
                                                <a href="pay_order.php?order_code=<?php echo $order->order_code;?>&customer_id=<?php echo $order->customer_id;?>&order_status=Paid">
                                                    <button class="btn btn-sm btn-success">
                                                        <i class="fas fa-handshake"></i>
                                                        Thanh toán
                                                    </button>
                                                </a>

                                                <a href="payments.php?cancel=<?php echo $order->order_id; ?>">
                                                    <button class="btn btn-sm btn-danger">
                                                        <i class="fas fa-window-close"></i>
                                                        Hủy đơn
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php }
                                }
                                
                             else {
                                
                                echo "Không có thông tin khách hàng được cung cấp.";
                            } ?>
                                    
                                </tbody>
                                <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Mã</th>
                                        <th scope="col">Khách Hàng</th>
                                        <th scope="col">Sản Phẩm</th>
                                        <th scope="col">Tổng tiền</th>
                                        <th scope="col">Thanh toán bàn</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <?php 
                             
                                ?>
                                <tbody>
                                    
                                        <tr>
                                            <th></th>
                                            <td></td>
                                            <td></td>
                                            <td>$ <?php echo $full_total; ?></td>
                                            <td>
                                            <a href="pay_table.php?full_total=<?php echo $full_total;?>&customer_id=<?php echo $customer_id?>&order_status=Paid">
                                                    <button class="btn btn-success">
                                                        <i class="fas fa-handshake"></i>
                                                        Thanh toán bàn
                                                    </button>
                                                </a></td>
                                            
                                        </tr>
                                        <tr></tr>
                                    <?php 
                                    
                                    ?>
                                </tbody>
                                
                            </table>
                        </div>
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