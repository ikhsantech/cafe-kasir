<div class="tabel">
                  <table class="table table-sm">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Jenis</th>
                        <th scope="col">Kategori ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tipe as $ti)
                        <tr>
                            <th scope="row">{{$i = (!isset($i)?$i=1:++$i) }}</th>
                                <td>{{$ti->nama_jenis}}</td>
                                <td>{{$ti->kategori->nama}}</td>
                                 <td>
                                    <button class="btn" data-toggle="modal" data-target="#modalFormJenis" data-mode="edit" 
                                    data-id="{{$ti->id}}"
                                    data-nama_jenis="{{$ti->nama_jenis}}"
                                    data-kategori_id="{{$ti->kategori_id}}" > Edit</button>
                                   
                                </td>
                        </tr> 
                        @endforeach

                    </tbody>
                    </table>
              </div>