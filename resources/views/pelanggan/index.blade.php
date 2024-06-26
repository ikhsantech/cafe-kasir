 @extends('templates.app')


 @section('content')
     <div class="container mt-5">
         <div class="row">

             <div class="col-md-12">
                 <div class="card">


                     {{-- HEADER --}}
                     <div class="card-header">
                         <h5 class="title">Pelanggan</h5>
                     </div>
                     {{-- HEADER --}}

                     {{-- body  --}}
                     <div class="card-body">
                         <button type="button" class="btn btn-primary" data-toggle="modal"
                             data-target="#modalFormPelanggan">Add</button>

                         <a href="{{ route('export-pelanggan') }}" class="btn btn-success">
                             <i class="fa fa-file" aria-hidden="true"></i> Export
                         </a>

                         <a href="{{ route('pelanggan-pdf') }}" class="btn btn-danger">
                            <i class="fa fa-file" aria-hidden="true"></i> PDF
                        </a>

                         <!-- Button trigger modal -->
                         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pelangganImport">
                            Import data
                        </button>

                         @include('pelanggan.form')
                         @include('pelanggan.data')


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
         $('#modalFormPelanggan').on('show.bs.modal', function(e) {
             const btn = $(e.relatedTarget)
             console.log(btn.data('mode'))
             const mode = btn.data('mode')
             const nama = btn.data('nama')
             const email = btn.data('email')
             const nomor_telepon = btn.data('nomor_telepon')
             const alamat = btn.data('alamat')


             const id = btn.data('id')
             const modal = $(this)
             if (mode === 'edit') {
                 modal.find('.modal-title').text('Edit Stok');
                 modal.find('#nama').val(nama);
                 modal.find('#email').val(email);
                 modal.find('#nomor_telepon').val(nomor_telepon);
                 modal.find('#alamat').val(alamat);

                 modal.find('.modal-body form').attr('action', '{{ url('pelanggan') }}/' + id)
                 modal.find('#method').html('@method('PUT')');
             } else {
                 modal.find('.modal-title').text('Input Stok');
                 modal.find('.modal-title').text('');
                 modal.find('#nama').val('');
                 modal.find('#email').val('');
                 modal.find('#nomor_telepon').val('');
                 modal.find('#alamat').val('');

                 modal.find('.modal-body form').attr('action', '{{ url('pelanggan') }}');

             };

         });

         //  END Edit
     </script>
 @endpush
