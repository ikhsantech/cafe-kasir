 @extends('templates.app')


 @section('content')
     <div class="container mt-5">
         <div class="row">

             <div class="col-md-12">
                 <div class="card">


                     {{-- HEADER --}}
                     <div class="card-header">
                         <h5 class="title">Menu</h5>
                     </div>
                     {{-- HEADER --}}

                     {{-- body  --}}
                     <div class="card-body">
                         <button type="button" class="btn btn-primary" data-toggle="modal"
                             data-target="#modalFormMenu">Add</button>

                         <a href="{{ route('export-menu') }}" class="btn btn-success">
                             <i class="fa fa-file" aria-hidden="true"></i> Export
                         </a>

                         <a href="{{ route('menu-pdf') }}" class="btn btn-danger">
                            <i class="fa fa-file" aria-hidden="true"></i> PDF
                        </a>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#menuImport">
                                Import data
                            </button>

                         @include('menu.form')
                         @include('menu.data')


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
                 title: `Apakah data <span style="color:#3085d6"></span> akan dihapus?`,
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
         });



         // Edit
         $('#modalFormMenu').on('show.bs.modal', function(e) {
             const btn = $(e.relatedTarget)
             console.log(btn.data('mode'))
             const mode = btn.data('mode')
             const nama_menu = btn.data('nama_menu')
             const harga = btn.data('harga')
             const deskripsi = btn.data('deskripsi')
             const jenis_id = btn.data('jenis_id')


             const id = btn.data('id')
             const modal = $(this)
             if (mode === 'edit') {
                 modal.find('.modal-title').text('Edit Menu');
                 modal.find('#nama_menu').val(nama_menu);
                 modal.find('#harga').val(harga);
                 modal.find('#deskripsi').val(deskripsi);
                 modal.find('#jenis_id').val(jenis_id);

                 modal.find('.modal-body form').attr('action', '{{ url('menu') }}/' + id)
                 modal.find('#method').html('@method('PUT')');
             } else {
                 modal.find('.modal-title').text('Input Stok');
                 modal.find('.modal-title').text('');
                 modal.find('#nama_menu').val('');
                 modal.find('#harga').val('');
                 modal.find('#deskripsi').val('');
                 modal.find('#jenis_id').val('');

                 modal.find('.modal-body form').attr('action', '{{ url('menu') }}');

             };

         });
         //  END Edit
     </script>
 @endpush
