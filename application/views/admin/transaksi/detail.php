<div class="kwitansi pt-3 pb-3">
  <div class="border">
    <div id="outtable">
      <h3 class="pt-3 text-center text-uppercase"><b><?php echo $title ?></b></h3>
    </div>

    <hr>

    <?php 
      // jika terdapat transaksi makam muncul tabelnya 
      if ($header_transaksi) { 
    ?>
    <div class="row">
      <div class="col-md-4">
        <table class="table">
          <tr style="border: hidden;">
            <td>Kode Transaksi</td>
            <td>:</td>
            <td><?php echo $header_transaksi->kode_transaksi ?></td>
          </tr>
          <tr style="border: hidden;">
            <td>Nama Pelaggan</td>
            <td>:</td>
            <td><?php echo $header_transaksi->nama_pelanggan ?></td>
          </tr>
          <tr style="border: hidden;">
            <td>Telpon Pelanggan</td>
            <td>:</td>
            <td><?php echo $header_transaksi->telepon ?></td>
          </tr>
          <tr style="border: hidden;">
            <td>Email Pelanggan</td>
            <td>:</td>
            <td><?php echo $header_transaksi->email ?></td>
          </tr>
        </table>
      </div> 
      <div class="col-md-4">
        <table class="table">
          <tr style="border: hidden;">
            <td>Alamat Pelanggan</td>
            <td>:</td>
            <td><?php echo $header_transaksi->alamat ?></td>
          </tr>
          <tr style="border: hidden;">
            <td>Rekening Palanggan</td>
            <td>:</td>
            <td><?php echo $header_transaksi->rekening_pembayaran ?></td>
          </tr>
          <tr style="border: hidden;">
            <td>Nama Bank</td>
            <td>:</td>
            <td><?php echo $header_transaksi->nama_bank ?></td>
          </tr>
          <tr style="border: hidden;">
            <td>Tanggal Transaksi</td>
            <td>:</td>
            <td><?php echo date('d/m/Y',strtotime($header_transaksi->tanggal_transaksi)) ?></td>
          </tr>
        </table>
      </div> 
      <div class="col-md-4">
        <table class="table">
          <tr style="border: hidden;">
            <td>Status Transaksi</td>
            <td>:</td>
            <td><?php echo $header_transaksi->status_bayar ?></td>
          </tr>
          <tr style="border: hidden;">
            <td>Bukti Transaksi</td>
            <td>:</td>
            <td>
              <?php if ($header_transaksi->bukti_bayar !="") { ?>
                <img style="max-height: 100px;" src="<?php echo base_url('assets/upload/image/'.$header_transaksi->bukti_bayar) ?>" class="img img-thumbnail">
              <?php }else{echo 'Belum ada Bukti Pembayaran'; } ?>
              </td>
            </td>
          </tr>
        </table>
      </div> 
    </div>

    <hr>

    <table class="table">
      <thead>
        <tr class="bg-dark">
          <th class="text-center col col-lg-1">No</th>
          <th class="col col-lg-2">Produk</th>
          <th class="col col-lg-3">Kode Produk</th>
          <th class="col col-lg-3">Nama Produk</th>
          <th class="text-center col col-lg-1">Jumlah</th>
          <th class="col col-lg-2">Harga</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=1; foreach ($transaksi as $transaksi) { ?>
        <tr>
          <td class="text-center"><?php echo $i ?></td>
          <td><img style="height: 80px;" src="<?php echo base_url('assets/upload/image/thumbs/'.$transaksi->gambar) ?>"></td>
          <td><?php echo $transaksi->kode_produk ?></td>
          <td><?php echo $transaksi->nama_produk ?></td>
          <td class="text-center"><?php echo $transaksi->jumlah ?></td>
          <td>Rp. <?php echo number_format($transaksi->harga) ?></td>
        </tr>
        <?php $i++; } ?>
      </tbody>
    </table>

    <hr>

    <div class="row">
      <div class="col-md-7"></div>
      <div class="col-md-5">
        <table class="table">
          <tr style="border: hidden;">
            <td class="col col-lg-3"><strong>Status Transaksi :</strong></td>
            <td class="col col-lg-2">Rp. <?php echo number_format($header_transaksi->jumlah_bayar) ?></td>
          </tr>
        </table>
        <hr>
      </div>
    </div>
    <?php } ?>

  </div>
</div>