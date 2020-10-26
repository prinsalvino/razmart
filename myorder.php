<?php
include "db.php";
include "header.php";

$userid = $_SESSION["uid"];
$sql = "SELECT products.product_title, order_products.qty, order_products.amt from orders_info JOIN order_products ON order_products.order_id = orders_info.order_id 
        JOIN products ON products.product_id = order_products.product_id WHERE user_id = $userid";
$run_query = mysqli_query($con, $sql);
while ($pesanans = mysqli_fetch_assoc($run_query)) {
    $result[] = $pesanans;
}

$sql = "SELECT products.product_title, orders.p_status, products.product_price FROM products JOIN orders ON products.product_id = orders.product_id  
        WHERE orders.user_id = $userid";
$run_query = mysqli_query($con, $sql);
while ($finished = mysqli_fetch_assoc($run_query)) {
    $result1[] = $finished;
}
?>

<div class="container">
    <br><br><br><br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Pesanan Saya</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="tabel-pesanan" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Total Harga</th>
                                <th>Status Pesanan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $index = 0 ?>
                            <?php foreach ($result as $key => $data) { ?>
                                <tr>
                                    <td><?php echo $index += 1; ?></td>
                                    <td><?php echo $data['product_title'] . " x " . $data['qty']; ?></td>
                                    <td><?php echo $data['amt']; ?></td>
                                    <td><?php echo 'Menunggu konfirmasi' ?></td>
                                </tr>
                            <?php } ?>
                            </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <br><br><br><br><br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Pesanan Selesai</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="tabel-pesanan-selesai" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Total Harga</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $index = 0; ?>
                            <?php foreach ($result1 as $key => $data) { ?>
                                <tr>
                                    <td><?php echo $index += 1; ?></td>
                                    <td><?php echo $data['product_title']; ?></td>
                                    <td><?php echo $data['product_price']; ?></td>
                                    <td><?php echo $data['p_status']; ?></td>
                                </tr>
                            <?php } ?>
                            </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- /.container-fluid -->
</div>
<br><br><br><br><br><br><br><br>
<?php
include 'footer.php';
?>