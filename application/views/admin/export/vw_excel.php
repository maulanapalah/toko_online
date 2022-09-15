<p>
  <a href="<?php echo base_url('admin/excel/export') ?>" class="btn btn-success btn-lg">
    <i class="fa fa-file-excel-o"></i> Export
  </a>
</p>
<div style="overflow-x: auto; width: 1070px;">
  <table class="table table-bordered" id="example1">
    <thead>
      <tr>
        <th class="text-center">No</th>
        <th class="text-center">Kode Transaksi</th>
        <th class="text-center">Nama Pelanggan</th>
        <th class="text-center">Email</th>
        <th class="text-center">No.Telpon</th>
        <th class="text-center">Alamat</th>
        <th class="text-center">Tanggal Transaksi</th>
        <th class="text-center">Jumlah Bayar</th>
        <th class="text-center">Nomer Rekening</th>
        <th class="text-center">Nama Bank</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; foreach ($header_transaksi as $header_transaksi) { ?>
      <tr>
        <td class="text-center"><?php echo $no ?></td>
        <td><?php echo $header_transaksi->kode_transaksi; ?></td>
        <td><?php echo $header_transaksi->nama_pelanggan; ?></td>
        <td><?php echo $header_transaksi->email; ?></td>
        <td><?php echo $header_transaksi->telepon; ?></td>
        <td><?php echo $header_transaksi->alamat; ?></td>
        <td><?php echo $header_transaksi->tanggal_transaksi; ?></td>
        <td><?php echo $header_transaksi->jumlah_bayar; ?></td>
        <td><?php echo $header_transaksi->rekening_pembayaran; ?></td>
        <td><?php echo $header_transaksi->nama_bank; ?></td>
      </tr>
      <?php $no++; } ?>
    </tbody>
  </table>
</div>