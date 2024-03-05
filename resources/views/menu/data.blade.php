 <div class="tabel">
                  <table class="table table-sm">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Menu</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Jenis</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menu as $men)
                            
                        <tr>
                            <th scope="row">{{$i = (!isset($i)?$i=1:++$i) }}</th>
                                <td>{{$men->nama_menu}}</td>
                                <td>{{$men->harga}}</td>
                                <td>{{$men->deskripsi}}</td>
                                <td>{{$men->tipe->nama_jenis}}</td>
                                <td><button class="btn" data-toggle="modal" data-target="#modalFormMenu" data-mode="edit" 
                                    data-id="{{$men->id}}"
                                    data-nama_menu="{{$men->nama_menu}}"
                                    data-harga="{{$men->harga}}" 
                                    data-deskripsi="{{$men->deskripsi}}"
                                    data-jenis_id="{{$men->jenis_id}}"> Edit</button>
                                </td>
                        </tr>
                        @endforeach

                    </tbody>
                    </table>
</div>