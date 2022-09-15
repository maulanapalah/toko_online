<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete-<?php echo $berita->id_berita ?>">
	<i class="fa fa-trash-o"></i> Delete
</button>

<div class="modal fade" id="delete-<?php echo $berita->id_berita ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">Delete data Berita</h4>
      </div>
      <div class="modal-body">
        <div class="callout callout-warning">
	        <h4>Peringatan!</h4>
	        Yakin akan menghapus data ini? Data yang sudah di hapus tidak dapat dikembalikan.
	     </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
        <a href="<?php echo base_url('admin/berita/delete/'.$berita->id_berita) ?>" class="btn btn-danger"><i class="fa fa-trash-o">Ya, Hapus Data Ini</i></a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
