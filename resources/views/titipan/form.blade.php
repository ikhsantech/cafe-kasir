<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
    id="modalFormTitipan">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="titipan">
                    @csrf
                    <div id="method"></div>
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" class="form-control" placeholder="Nama Produk" id="nama_produk"
                            value="" name="nama_produk">
                    </div>
                    <div class="form-group">
                        <label>Nama Supplier</label>
                        <input type="text" class="form-control" placeholder="Nama Supplier" id="nama_supplier"
                            value="" name="nama_supplier">
                    </div>
                    <div class="form-group">
                        <label>Harga Beli</label>
                        <input type="number" class="form-control" placeholder="Harga Beli" id="harga_beli"
                            value="" name="harga_beli">
                    </div>
                    <div class="form-group">
                        <label>Harga Jual</label>
                        <input type="number" class="form-control" placeholder="Harga Jual" id="harga_jual"
                            value="" name="harga_jual">
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" class="form-control" placeholder="Stok" id="stok" value=""
                            name="stok">
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" placeholder="Keterangan" id="keterangan"
                            value="" name="keterangan">
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
