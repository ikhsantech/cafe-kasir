<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
    id="modalFormJenis">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="tipe">
                    @csrf
                    <div id="method"></div>
                    <div class="form-group">
                        <label>Nama Jenis</label>
                        <input type="text" class="form-control" placeholder="Nama Jenis" id="nama_jenis"
                            value="" name="nama_jenis">
                    </div>
                    <div class="form-group">
                        <label>Kategori ID</label>
                        {{-- Dropdown --}}
                        <select name="kategori_id" id="kategori_id">
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategori as $kat)
                                <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
                            @endforeach
                        </select>
                        {{-- Dropdown end --}}
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
<div class="modal fade" id="tipeImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form action="{{ url('import-tipe') }}" method="post" enctype="multipart/form-data">
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
