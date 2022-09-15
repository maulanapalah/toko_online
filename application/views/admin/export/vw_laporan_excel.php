<table border="1" width="100%">
  <thead>
    <tr>
      <th>Kode Transaksi</th>
      <th>Nama Pelanggan</th>
      <th>Email</th>
      <th>No.Telpon</th>
      <th>Alamat</th>
      <th>Tanggal Transaksi</th>
      <th>Jumlah Bayar</th>
      <th>Nomer Rekening</th>
      <th>Nama Bank</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; foreach ($header_transaksi as $header_transaksi) { ?>
      <tr>
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