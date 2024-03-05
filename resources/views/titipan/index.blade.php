 @extends('templates.app')


 @section('content')
     <div class="container mt-5">
         <div class="row">

             <div class="col-md-12">
                 <div class="card">


                     {{-- HEADER --}}
                     <div class="card-header">
                         <h5 class="title">Produk Titipan</h5>
                     </div>
                     {{-- HEADER --}}

                     {{-- body  --}}
                     <div class="card-body">
                         <button type="button" class="btn btn-primary" data-toggle="modal"
                             data-target="#modalFormTitipan">Add</button>
                         @include('titipan.form')
                         @include('titipan.data')


                     </div>
                     {{-- END body --}}
                 </div>
             </div>
         </div>
     </div>
 @endsection


 @push('js')
     <script>
         // Delete
         $('.delete-data').on('click', function(e) {
             e.preventDefault()
             const data = $(this).closest('tr').find('td:eq(1)').text()
             Swal.fire({
                 title: `Apakah data <span style="color:#3085d6">${data}</span> akan dihapus?`,
                 icon: "question",
                 confirmButtonText: "Ya",
                 cancelButtonText: "Tidak",
                 showCancelButton: true,
                 showCloseButton: true
             }).then((result) => {
                 if (result.isConfirmed)
                     $(e.target).closest('form').submit()
                 else swal.close()
             })
         })


         // Edit
         $('#modalFormTitipan').on('show.bs.modal', function(e) {
             const btn = $(e.relatedTarget)
             console.log(btn.data('mode'))
             const mode = btn.data('mode')
             const nama_produk = btn.data('nama_produk')
             const nama_supplier = btn.data('nama_supplier')
             const harga_beli = btn.data('harga_beli')
             const harga_jual = btn.data('harga_jual')
             const stok = btn.data('stok')
             const keterangan = btn.data('keterangan')


             const id = btn.data('id')
             const modal = $(this)
             if (mode === 'edit') {
                 modal.find('.modal-title').text('Edit Produk Titipan');
                 modal.find('#nama_produk').val(nama_produk);
                 modal.find('#nama_supplier').val(nama_supplier);
                 modal.find('#harga_beli').val(harga_beli);
                 modal.find('#harga_jual').val(harga_jual);
                 modal.find('#stok').val(stok);
                 modal.find('#keterangan').val(keterangan);

                 modal.find('.modal-body form').attr('action', '{{ url('titipan') }}/' + id)
                 modal.find('#method').html('@method('PUT')');
             } else {
                 modal.find('.modal-title').text('Tambah Data Produk Titipan');
                 modal.find('.modal-title').text('');
                 modal.find('#nama_produk').val('');
                 modal.find('#nama_supplier').val('');
                 modal.find('#harga_beli').val('');
                 modal.find('#harga_jual').val('');
                 modal.find('#stok').val('');
                 modal.find('#keterangan').val('');

                 modal.find('.modal-body form').attr('action', '{{ url('titipan') }}');

             };

         });

         //  END Edit



         // Membuat event listener untuk input harga beli
         document.getElementById('harga_beli').addEventListener('input', function() {
             // Mendapatkan nilai harga beli
             let hargaBeli = parseFloat(this.value);

             // Menghitung harga jual dengan keuntungan 70% dan pembulatan 500
             let hargaJual = Math.ceil((hargaBeli * 1.7) / 500) * 500;

             // Memasukkan nilai pada input harga jual
             document.getElementById('harga_jual').value = hargaJual.toFixed(2);
         });
     </script>
 @endpush
