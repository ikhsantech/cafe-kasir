<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="modalFormPelanggan">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="pelanggan">
          @csrf
           <div id="method"></div>
  <div class="form-group">
    <label>Nama</label>
    <input type="text" class="form-control" placeholder="Nama" id="nama" value="" name="nama">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" placeholder="Email" id="email" value="" name="email">
  </div>
  <div class="form-group">
    <label>Nomor Telepon</label>
    <input type="number" class="form-control" placeholder="Nomor Telepon" id="nomor_telepon" value="" name="nomor_telepon">
  </div>
  <div class="form-group">
    <label>Alamat</label>
    <input type="text" class="form-control" placeholder="Alamat" id="alamat" value="" name="alamat">
  </div>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>