 @extends('templates.app')

 
@section('content')
       <div class="container mt-5">
        <div class="row">
            
          <div class="col-md-12">
            <div class="card">

                
              {{-- HEADER --}}
              <div class="card-header">
                <h5 class="title">Kategori</h5>
              </div>
              {{-- HEADER --}}

              {{-- body  --}}
            <div class="card-body">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormKategori">Add</button>
                @include('kategori.form')
                @include('kategori.data')
             
                    
            </div>
                    {{-- END body --}}
            </div>
          </div>
        </div>
      </div>

      @endsection

       @push('js')
      <script>
         // Edit
        $('#modalFormKategori').on('show.bs.modal',function(e){
const btn=$(e.relatedTarget)
console.log(btn.data('mode')) 
const mode = btn.data('mode')
const nama = btn.data('nama')



const id = btn.data('id')
const modal = $(this)
if(mode === 'edit'){
modal.find('.modal-title').text('Edit Kategori');
modal.find('#nama').val(nama);


modal.find('.modal-body form').attr('action','{{url("kategori")}}/'+ id)
modal.find('#method').html('@method("PUT")');
}else{
  modal.find('.modal-title').text('Input kategori');
modal.find('.modal-title').text('');
modal.find('#nama').val(''); 


modal.find('.modal-body form').attr('action','{{url("kategori")}}');

};

});
//  END Edit
      </script>
@endpush