<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="modalFormMenu">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="menu">
          @csrf
          <div id="method"></div>

  <div class="form-group">
    <label>Nama Menu</label>
    <input type="text" class="form-control" placeholder="Nama Menu" id="nama_menu" value="" name="nama_menu">
  </div>
  <div class="form-group">
    <label>harga</label>
    <input type="number" class="form-control" placeholder="Harga" id="harga" value="" name="harga">
  </div>
  <div class="form-group">
    <label>Deskripsi</label>
    <input type="text" class="form-control" placeholder="Deskripsi" id="deskripsi" value="" name="deskripsi">
  </div>
  <div class="form-group">
    <label>Jenis ID</label>
<select name="jenis_id" id="jenis_id">
  @foreach ($tipe as $ti)
      <option value="{{$ti->id}}">{{$ti->nama_jenis}}</option>
  @endforeach
</select>
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