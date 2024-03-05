 <div class="tabel">
                  <table class="table table-sm" id="data-stok">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Menu ID</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stok as $sto)
                        <tr>
                                <th scope="row">{{$i = (!isset($i)?$i=1:++$i) }}</th>
                                <td>{{$sto->menu_id}}</td>
                                <td>{{$sto->jumlah}}</td>
                                <td>
                                    <button class="btn" data-toggle="modal" data-target="#modalFormStok" data-mode="edit" 
                                    data-id="{{$sto->id}}"
                                    data-menu_id="{{$sto->menu_id}}"
                                    data-jumlah="{{$sto->jumlah}}" > Edit</button>
                                </td>
                        </tr>
                        @endforeach

                    </tbody>
                    </table>
</div>