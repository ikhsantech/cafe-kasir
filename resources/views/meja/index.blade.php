 @extends('templates.app')


 @section('content')
     <div class="container mt-5">
         <div class="row">

             <div class="col-md-12">
                 <div class="card">


                     {{-- HEADER --}}
                     <div class="card-header">
                         <h5 class="title">Meja</h5>
                     </div>
                     {{-- HEADER --}}

                     {{-- body  --}}
                     <div class="card-body">
                         <button type="button" class="btn btn-primary" data-toggle="modal"
                             data-target="#modalFormMeja">Add</button>
                         @include('meja.form')
                         @include('meja.data')


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
         });



         // Edit
         $('#modalFormMeja').on('show.bs.modal', function(e) {
             const btn = $(e.relatedTarget)
             console.log(btn.data('mode'))
             const mode = btn.data('mode')
             const nomor_meja = btn.data('nomor_meja')
             const kapasitas = btn.data('kapasitas')
             const status = btn.data('status')


             const id = btn.data('id')
             const modal = $(this)
             if (mode === 'edit') {
                 modal.find('.modal-title').text('Edit Meja');
                 modal.find('#nomor_meja').val(nomor_meja);
                 modal.find('#kapasitas').val(kapasitas);
                 modal.find('#status').val(status);

                 modal.find('.modal-body form').attr('action', '{{ url('meja') }}/' + id)
                 modal.find('#method').html('@method('PUT')');
             } else {
                 modal.find('.modal-title').text('Input Stok');
                 modal.find('.modal-title').text('');
                 modal.find('#nomor_meja').val('');
                 modal.find('#kapasitas').val('');
                 modal.find('#status').val('');

                 modal.find('.modal-body form').attr('action', '{{ url('meja') }}');

             };

         });
         //  END Edit
     </script>
 @endpush
