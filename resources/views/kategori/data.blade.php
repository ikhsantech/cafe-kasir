<table class="table table-sm">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $kat )
                        <tr>
                            <th scope="row">{{$i = (!isset($i)?$i=1:++$i) }}</th>
                                <td>{{$kat->nama}}</td>
                                    <td><button class="btn" data-toggle="modal" data-target="#modalFormKategori" data-mode="edit" 
                                    data-id="{{$kat->id}}"
                                    data-nama="{{$kat->nama}}"> Edit</button>
                                </td>
                        </tr>
                                   @endforeach
                    </tbody>
                    </table>