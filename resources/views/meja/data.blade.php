 <div class="tabel">
                  <table class="table table-sm">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nomor Meja</th>
                        <th scope="col">Kapasitas</th>
                        <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($meja as $mej)
                            
                        <tr>
                            <th scope="row">{{$i = (!isset($i)?$i=1:++$i) }}</th>
                                <td>{{$mej->nomor_meja}}</td>
                                <td>{{$mej->kapasitas}}</td>
                                <td>{{$mej->status}}</td>
                                 <td><button class="btn" data-toggle="modal" data-target="#modalFormMeja" data-mode="edit" 
                                    data-id="{{$mej->id}}"
                                    data-nomor_meja="{{$mej->nomor_meja}}"
                                    data-kapasitas="{{$mej->kapasitas}}" 
                                    data-status="{{$mej->status}}"> Edit</button>
                                </td>
                        </tr>
                        @endforeach

                    </tbody>
                    </table>
</div>