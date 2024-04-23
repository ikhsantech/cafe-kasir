 @extends('templates.app')


 @section('content')
     <div class="container mt-5">
         <div class="row">

             <div class="col-md-12">
                 <div class="card">


                     {{-- HEADER --}}
                     <div class="card-header">
                         <h5 class="title">Pemesanan</h5>
                     </div>
                     {{-- HEADER --}}

                     {{-- body  --}}

                     <div class="container">
                         <div class="row">

                             {{-- kiri --}}
                             <div class="col">
                                 <div class="namaPemesan mt-3">
                                     <h6>Nama Pemesan</h6>
                                     <input type="text" class="rounded">
                                 </div>

                                 <h5 class="text-center mt-3">MENU</h5>
                                 <li class="list-inline">
                                     @foreach ($tipe as $ti)
                                         <h6>{{ $ti->nama_jenis }}</h6>
                                         <ul class="menu-item list-inline">
                                             @foreach ($ti->menu as $menu)
                                                 <li class="btn" data-harga="{{ $menu->harga }}"
                                                     data-id="{{ $menu->id }}">{{ $menu->nama_menu }}</li>
                                             @endforeach

                                         </ul>
                                 </li>
                                 @endforeach

                             </div>

                             {{-- kanan --}}
                             <div class="col-4 border rounded-left">
                                 <h6 class="text-center">Pesanan</h6>
                                 <div class="p-4">
                                     <ul class="ordered-list list-inline">

                                     </ul>
                                     Total Bayar : <h2 id="total">0</h2>
                                     <div>
                                         <button id="bayar" class="btn btn-success">Bayar</button>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     {{-- END body --}}
                 </div>
             </div>
         </div>
     </div>
 @endsection

 @push('script')
     <script>
         $(function() {
             // Initialization
             const orderedList = [];
             let total = 0;

             const sum = () => {
                 return orderedList.reduce((accumulator, object) => {
                     return accumulator + (object.harga * object.qty);
                 }, 0);
             };

             const changeQty = (el, inc) => {
                 // Change array
                 const id = $(el).closest('li')[0].dataset.id;
                 const index = orderedList.findIndex(list => list.id == id);
                 orderedList[index].qty += orderedList[index].qty == 1 && inc == -1 ? 0 : inc;

                 // Change qty and subtotal
                 const txt_subtotal = $(el).closest('li').find('.subtotal');
                 const txt_qty = $(el).closest('li').find('.qty-item');
                 txt_qty.val(parseInt(txt_qty.val()) == 1 && inc == -1 ? 1 : parseInt(txt_qty.val()) + inc);
                 txt_subtotal.text(orderedList[index].harga * orderedList[index].qty);

                 $('#total').html(sum());
             };

             // Events
             $('.ordered-list').on('click', '.btn-dec', function() {
                 changeQty(this, -1)
             });
             $('.ordered-list').on('click', '.btn-inc', function() {
                 changeQty(this, 1)
             });

             $('.ordered-list').on('click', '.remove-item', function() {
                 const item = $(this).closest('li')[0];
                 const index = orderedList.findIndex(list => list.id == parseInt(item.dataset.id));
                 orderedList.splice(index, 1);
                 $(item).remove();
                 $('#total').html(sum());
             });

             $(".menu-item li").click(function() {
                 // Get data
                 const menu_clicked = $(this).text();
                 const data = $(this).data();
                 const harga = parseFloat(data.harga);
                 const id = parseInt(data.id);

                 if (orderedList.every(list => list.id != id)) {
                     let dataN = {
                         'id': id,
                         'menu': menu_clicked,
                         'harga': harga,
                         'qty': 1
                     };
                     orderedList.push(dataN);
                     let listOrder = `<li data-id="${id}" class="mt-2"><h6>${menu_clicked}</h6>`;
                     listOrder += ' Rp.' + harga;
                     listOrder += `<button class="remove-item ml-3 btn btn-secondary btn-sm">hapus</button>
            <button class="btn-dec btn-danger"> - </button>`;
                     listOrder +=
                         `<input class="qty-item" type="number" value="1" style="width:45px" readonly/>`;
                     listOrder += `<button class="btn-inc btn-primary ">+</button>`;
                     listOrder += `</li>`;
                     $('.ordered-list').append(listOrder);
                 }
                 $('#total').html(sum());
             });

             //ajax 
             $('#bayar').on('click', function() {

                 $.ajax({
                     url: "{{ route('transaksi.store') }}",
                     method: "POST",

                     data: {
                         "_token": "{{ csrf_token() }}",
                         orderedList: orderedList,
                         total: sum()
                     },

                     success: function(data) {
                         console.log(data)
                         Swal.fire({
                             title: data.message,
                             showDenyButton: true,
                             confirmButtonText: "Cetak Nota",
                             denyButtonText: "Ok"
                         }).then((result) => {
                             if (result.isConfirmed) {
                                 window.open("{{ url('nota') }}/" + data.notrans)
                                 location.reload();
                             } else if (result.isDenied) {
                                 location.reload();
                             }
                         })
                     }



                 });

             });

         });
     </script>
 @endpush
