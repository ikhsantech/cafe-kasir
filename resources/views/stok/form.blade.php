<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="modalFormStok">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Stok</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="stok">
          @csrf
          <div id="method"></div>
  <div class="form-group">
    <label>Menu ID</label>
    <input type="number" class="form-control" placeholder="Menu ID" id="menu_id" value="" name="menu_id">
  </div>
  <div class="form-group">
    <label>Jumlah</label>
    <input type="number" class="form-control" placeholder="Jumlah Stok" id="jumlah" value="" name="jumlah">
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


{{-- form import --}}
<!-- Modal -->
<div class="modal fade" id="stokImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ url('import-stok') }}" method="post" enctype="multipart/form-data">
                    @csrf


                    <input type="file" name="import" id="import">


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </form>

    </div>
</div>
