<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
    id="modalFormAbsensi">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Absensi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="absensi">
                    @csrf
                    <div id="method"></div>
                    <div class="form-group">
                        <label>Nama Karyawan</label>
                        <input type="text" class="form-control" placeholder="Nama Karyawan" id="nama_karyawan"
                            value="" name="nama_karyawan">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="date" class="form-control" placeholder="Tanggal Masuk" id="tanggal_masuk"
                            value="" name="tanggal_masuk">
                    </div>
                    <div class="form-group">
                        <label>Waktu Masuk</label>
                        <input type="time" class="form-control" placeholder="Waktu Masuk" id="waktu_masuk"
                            value="" name="waktu_masuk">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">Pilih Status</option>
                            <option value="sakit">Sakit</option>
                            <option value="masuk">Masuk</option>
                            <option value="cuti">Cuti</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Waktu Selesai</label>
                        <input type="time" class="form-control" placeholder="Waktu Selesai" id="waktu_selesai"
                            value="" name="waktu_selesai">
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
<div class="modal fade" id="absensiImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form action="{{ url('import-absensi') }}" method="post" enctype="multipart/form-data">
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
