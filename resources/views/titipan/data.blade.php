 <div class="tabel">
     <table class="table table-sm">
         <thead>
             <tr>
                 <th scope="col">No</th>
                 <th scope="col">Nama Produk</th>
                 <th scope="col">Nama Supplier</th>
                 <th scope="col">Harga Beli</th>
                 <th scope="col">Harga Jual</th>
                 <th scope="col">Stok</th>
                 <th scope="col">Keterangan</th>
             </tr>
         </thead>
         <tbody>
             @foreach ($titipan as $tip)
                 <tr>
                     <th scope="row">{{ $i = !isset($i) ? ($i = 1) : ++$i }}</th>
                     <td>{{ $tip->nama_produk }}</td>
                     <td>{{ $tip->nama_supplier }}</td>
                     <td>{{ $tip->harga_beli }}</td>
                     <td>{{ $tip->harga_jual }}</td>
                     <td>{{ $tip->stok }}</td>
                     <td>{{ $tip->keterangan }}</td>
                     <td>
                         <button class="btn" data-toggle="modal" data-target="#modalFormTitipan" data-mode="edit"
                             data-id="{{ $tip->id }}" data-nama_produk="{{ $tip->nama_produk }}"
                             data-nama_supplier="{{ $tip->nama_supplier }}" data-harga_beli="{{ $tip->harga_beli }}"
                             data-harga_jual="{{ $tip->harga_jual }}" data-stok="{{ $tip->stok }}"
                             data-keterangan="{{ $tip->keterangan }}"> Edit</button>
                     </td>
                     <td>
                         <form method="post" action="{{ route('titipan.destroy', $tip->id) }}"
                             style="display: inline">
                             @csrf
                             @method('DELETE')
                             <button type="button" class="btn bg-gradient-danger delete-data"
                                 data-nama_produk="{{ $tip->nama_produk }}">
                                 Delete
                             </button>
                         </form>
                     </td>
                 </tr>
             @endforeach

         </tbody>
     </table>
 </div>
