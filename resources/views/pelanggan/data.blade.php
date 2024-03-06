 <div class="tabel">
     <table class="table table-sm">
         <thead>
             <tr>
                 <th scope="col">No</th>
                 <th scope="col">Nama</th>
                 <th scope="col">Email</th>
                 <th scope="col">Nomor Telepon</th>
                 <th scope="col">Alamat</th>
                 <th scope="col">Action</th>
             </tr>
         </thead>
         <tbody>
             @foreach ($pelanggan as $pel)
                 <tr>
                     <th scope="row">{{ $i = !isset($i) ? ($i = 1) : ++$i }}</th>
                     <td>{{ $pel->nama }}</td>
                     <td>{{ $pel->email }}</td>
                     <td>{{ $pel->nomor_telepon }}</td>
                     <td>{{ $pel->alamat }}</td>

                     {{-- Action --}}
                     <td><button class="btn" data-toggle="modal" data-target="#modalFormPelanggan" data-mode="edit"
                             data-id="{{ $pel->id }}" data-nama="{{ $pel->nama }}"
                             data-email="{{ $pel->email }}" data-nomor_telepon="{{ $pel->nomor_telepon }}"
                             data-alamat="{{ $pel->alamat }}"> Edit</button>


                         {{-- Delete --}}
                         <form method="post" action="{{ route('pelanggan.destroy', $pel->id) }}"
                             style="display: inline">
                             @csrf
                             @method('DELETE')
                             <button type="button" class="btn delete-data btn-danger" data-nama="{{ $pel->nama }}">
                                 Delete
                             </button>
                         </form>
                     </td>
                 </tr>
             @endforeach

         </tbody>
     </table>
 </div>
