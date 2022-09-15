<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-4 col-xs-4">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?php echo $jumlah; ?></h3>

          <p>Orders</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="<?php echo base_url('admin/orders') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-xs-4">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>53<sup style="font-size: 20px">%</sup></h3>

          <p>Revenue Rate</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="<?php echo base_url('admin/chart') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-xs-4">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?php echo $pelanggan ?></h3>

          <p>User Registrations</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="<?php echo base_url('admin/pelanggan') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->


  <!-- TABLE: LATEST ORDERS -->
  <div class="col-md-12">
    <div class="box-header with-border">
      <h3 class="box-title">Data Transaksi</h3>
    </div>
    <div class="box">
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered">
          <tr>
            <th class="text-center">No</th>
            <th>Tanggal Bayar</th>
            <th>Jumlah Bayar</th>
          </tr>
          <?php $no = 1; foreach ($data as $data) { ?>
          <tr>
            <td class="text-center"><?php echo $no ?></td>
            <td><?php echo $data->tanggal_bayar ?></td>
            <td><?php echo number_format($data->jumlah_bayar,'0',',','.') ?></td>
          </tr>
          <?php $no++; } ?>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</section>