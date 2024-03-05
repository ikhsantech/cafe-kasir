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
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormPelanggan">Add</button>
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
        // Edit
        $('#modalFormPelanggan').on('show.bs.modal',function(e){
const btn=$(e.relatedTarget)
console.log(btn.data('mode')) 
const mode = btn.data('mode')
const nama = btn.data('nama')
const email = btn.data('email')
const nomor_telepon = btn.data('nomor_telepon')
const alamat = btn.data('alamat')


const id = btn.data('id')
const modal = $(this)
if(mode === 'edit'){
modal.find('.modal-title').text('Edit Stok');
modal.find('#nama').val(nama);
modal.find('#email').val(email);
modal.find('#nomor_telepon').val(nomor_telepon);
modal.find('#alamat').val(alamat);

modal.find('.modal-body form').attr('action','{{url("pelanggan")}}/'+ id)
modal.find('#method').html('@method("PUT")');
}else{
  modal.find('.modal-title').text('Input Stok');
modal.find('.modal-title').text('');
modal.find('#nama').val(''); 
modal.find('#email').val('');
modal.find('#nomor_telepon').val('');
modal.find('#alamat').val('');

modal.find('.modal-body form').attr('action','{{url("pelanggan")}}');

};

});

//  END Edit

</script>
@endpush