 @extends('templates.app')


 @section('content')
     <div class="container mt-5">
         <div class="row">

             <div class="col-md-12">
                 <div class="card">


                     {{-- HEADER --}}
                     <div class="card-header">
                         <h5 class="title">Jenis</h5>
                     </div>
                     {{-- HEADER --}}

                     {{-- body  --}}
                     <div class="card-body">

                         <button type="button" class="btn btn-primary" data-toggle="modal"
                             data-target="#modalFormJenis">Add</button>

                         <a href="{{ route('export-tipe') }}" class="btn btn-success">
                             <i class="fa fa-file" aria-hidden="true"></i> Export
                         </a>

                         <a href="{{ route('tipe-pdf') }}" class="btn btn-danger">
                             <i class="fa fa-file" aria-hidden="true"></i> PDF
                         </a>

                         <!-- Button trigger modal -->
                         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tipeImport">
                             Import data
                         </button>

                         @include('tipe.form')
                         @include('tipe.data')


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
         $('#modalFormJenis').on('show.bs.modal', function(e) {
             const btn = $(e.relatedTarget)
             console.log(btn.data('mode'))
             const mode = btn.data('mode')
             const nama_jenis = btn.data('nama_jenis')
             const kategori_id = btn.data('kategori_id')


             const id = btn.data('id')
             const modal = $(this)
             if (mode === 'edit') {
                 modal.find('.modal-title').text('Edit Jenis');
                 modal.find('#nama_jenis').val(nama_jenis);
                 modal.find('#kategori_id').val(kategori_id);

                 modal.find('.modal-body form').attr('action', '{{ url('tipe') }}/' + id)
                 modal.find('#method').html('@method('PUT')');
             } else {
                 modal.find('.modal-title').text('Input jenis');
                 modal.find('.modal-title').text('');
                 modal.find('#nama_jenis').val('');
                 modal.find('#kategori_id').val('');

                 modal.find('.modal-body form').attr('action', '{{ url('tipe') }}');

             };

         });

         //  END Edit
     </script>
 @endpush
