 @extends('templates.app')


 @section('content')
     <div class="container mt-5">
         <div class="row">

             <div class="col-md-12">
                 <div class="card">


                     {{-- HEADER --}}
                     <div class="card-header">
                         <h5 class="title">Stok</h5>
                     </div>
                     {{-- HEADER --}}

                     {{-- body  --}}
                     <div class="card-body">
                         <button type="button" class="btn btn-primary" data-toggle="modal"
                             data-target="#modalFormStok">Add</button>

                         <a href="{{ route('export-stok') }}" class="btn btn-success">
                             <i class="fa fa-file" aria-hidden="true"></i> Export
                         </a>


                         <a href="{{ route('stok-pdf') }}" class="btn btn-danger">
                             <i class="fa fa-file" aria-hidden="true"></i> PDF
                         </a>


                         <!-- Button trigger modal -->
                         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#stokImport">
                             Import data
                         </button>

                         @include('stok.form')
                         @include('stok.data')


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
         $('#modalFormStok').on('show.bs.modal', function(e) {
             const btn = $(e.relatedTarget)
             console.log(btn.data('mode'))
             const mode = btn.data('mode')
             const menu_id = btn.data('menu_id')
             const jumlah = btn.data('jumlah')


             const id = btn.data('id')
             const modal = $(this)
             if (mode === 'edit') {
                 modal.find('.modal-title').text('Edit Stok');
                 modal.find('#menu_id').val(menu_id);
                 modal.find('#jumlah').val(jumlah);

                 modal.find('.modal-body form').attr('action', '{{ url('stok') }}/' + id)
                 modal.find('#method').html('@method('PUT')');
             } else {
                 modal.find('.modal-title').text('Input Stok');
                 modal.find('.modal-title').text('');
                 modal.find('#menu_id').val('');
                 modal.find('#jumlah').val('');

                 modal.find('.modal-body form').attr('action', '{{ url('stok') }}');

             };

         });

         //  END Edit
     </script>
 @endpush
