<table class="table table-sm">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Kategori</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kategori as $kat)
            <tr>
                <th scope="row">{{ $i = !isset($i) ? ($i = 1) : ++$i }}</th>
                <td>{{ $kat->nama }}</td>
                <td><button class="btn" data-toggle="modal" data-target="#modalFormKategori" data-mode="edit"
                        data-id="{{ $kat->id }}" data-nama="{{ $kat->nama }}"> Edit</button>


                    {{-- Delete --}}
                    <form method="post" action="{{ route('kategori.destroy', $kat->id) }}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn delete-data btn-danger" data-nama="{{ $kat->nama }}">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
