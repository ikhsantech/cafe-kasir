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
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormJenis">Add</button>
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

        // Edit
        $('#modalFormJenis').on('show.bs.modal',function(e){
const btn=$(e.relatedTarget)
console.log(btn.data('mode')) 
const mode = btn.data('mode')
const nama_jenis = btn.data('nama_jenis')
const kategori_id = btn.data('kategori_id')


const id = btn.data('id')
const modal = $(this)
if(mode === 'edit'){
modal.find('.modal-title').text('Edit Jenis');
modal.find('#nama_jenis').val(nama_jenis);
modal.find('#kategori_id').val(kategori_id);

modal.find('.modal-body form').attr('action','{{url("tipe")}}/'+ id)
modal.find('#method').html('@method("PUT")');
}else{
  modal.find('.modal-title').text('Input jenis');
modal.find('.modal-title').text('');
modal.find('#nama_jenis').val(''); 
modal.find('#kategori_id').val('');

modal.find('.modal-body form').attr('action','{{url("tipe")}}');

};

});

//  END Edit

</script>
@endpush