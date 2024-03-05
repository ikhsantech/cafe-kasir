<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="modalFormMeja">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Meja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="meja">
          @csrf
            <div id="method"></div>
  <div class="form-group">
    <label>Nomor Meja</label>
    <input type="number" class="form-control" placeholder="Nomor Meja" id="nomor_meja" value="" name="nomor_meja">
  </div>
  <div class="form-group">
    <label>Kapasitas</label>
    <input type="number" class="form-control" placeholder="Kapasitas" id="kapasitas" value="" name="kapasitas">
  </div>
  <div class="form-group">
    <label>Status</label>
    <input type="text" class="form-control" placeholder="Status" id="status" value="" name="status">
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