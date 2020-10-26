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
                                    <th>Pesanan Key</th>
                                    <th>Nama Produk</th>
                                    <th>Total Harga</th>
                                    <th>Status Pesanan</th>
                                    <th>Pembayaran</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $index = 0 ?>
                                <?php foreach ($pesanans as $key => $data) { ?>
                                    <?php if (($data['pesanan_status'] != 5) &&  ($data['pesanan_status'] != 4)) : ?>
                                        <tr>
                                            <td><?php echo $index += 1; ?></td>
                                            <td><?php echo $data['pesanan_key']; ?></td>
                                            <td><?php echo $data['product_name'] . '(' . $data['pesanan_size'] . ') x' . $data['pesanan_amount']; ?></td>
                                            <td><?php echo $data['pesanan_total_price_str']; ?></td>
                                            <td><?php echo $data['pesanan_status_str']; ?></td>
                                            <td><?php echo $data['pesanan_payment_str']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <?php if (isset($data['pesanan_payment_image'])) : ?>
                                                        <a href="/user/pilihpembayaran/<?php echo $data['pesanan_key']; ?>">
                                                            <button class="btn btn-secondary btn-sm" disabled>
                                                                Pembayaran
                                                            </button>
                                                        </a>
                                                        <a href='/detailpesanan?id=<?php echo $data['pesanan_id'] ?>' class="btn btn-primary btn-sm"><i class="fas fa-info-circle"></i></a>
                                                        <a href="/user/updatepesanan/<?php echo $data['pesanan_id']; ?>" onclick="return confirm('Apakah Anda yakin ingin membatalkan pesanan <?php echo $data['pesanan_key']; ?> ini?')">
                                                            <button class="btn btn-secondary btn-sm" disabled>
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        </a>
                                                    <?php else : ?>
                                                        <a href="/user/pilihpembayaran/<?php echo $data['pesanan_key']; ?>" class="btn btn-success btn-sm">Pembayaran</a>
                                                        <a href='/detailpesanan?id=<?php echo $data['pesanan_id'] ?>' class="btn btn-primary btn-sm"><i class="fas fa-info-circle"></i></a>
                                                        <a href="/user/updatepesanan/<?php echo $data['pesanan_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin membatalkan pesanan <?php echo $data['pesanan_key']; ?> ini?')"><i class="fas fa-times"></i></a>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
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
                                    <th>Pesanan Key</th>
                                    <th>Nama Produk</th>
                                    <th>Total Harga</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $index = 0; ?>
                                <?php foreach ($pesanans as $key => $data) { ?>
                                    <?php if ($data['pesanan_status'] == 4) : ?>
                                        <tr>
                                            <td><?php echo $index += 1; ?></td>
                                            <td><?php echo $data['pesanan_key']; ?></td>
                                            <td><?php echo $data['product_name']; ?></td>
                                            <td><?php echo $data['pesanan_total_price_str']; ?></td>
                                            <td><?php echo $data['pesanan_status_str']; ?></td>
                                        </tr>
                                    <?php endif; ?>
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