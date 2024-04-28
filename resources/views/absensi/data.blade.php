<table class="table table-sm">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Karyawan</th>
            <th scope="col">Tanggal Masuk</th>
            <th scope="col">Waktu Masuk</th>
            <th scope="col">Status</th>
            <th scope="col">Waktu Selesai Kerja</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($absensi as $ab)
            <tr>
                <th scope="row">{{ $i = !isset($i) ? ($i = 1) : ++$i }}</th>
                <td>{{ $ab->nama_karyawan }}</td>
                <td>{{ $ab->tanggal_masuk }}</td>
                <td>{{ $ab->waktu_masuk }}</td>
                <td>{{ $ab->status }}</td>
                <td>{{ $ab->waktu_selesai }}</td>

                {{-- Edit --}}
                <td><button class="btn" data-toggle="modal" data-target="#modalFormAbsensi" data-mode="edit"
                        data-id="{{ $ab->id }}" data-nama_karyawan="{{ $ab->nama_karyawan }}"
                        data-tanggal_masuk="{{ $ab->tanggal_masuk }}" data-waktu_masuk="{{ $ab->waktu_masuk }}"
                        data-status="{{ $ab->status }}" data-waktu_selesai="{{ $ab->waktu_selesai }}">
                        Edit</button>


                    {{-- Delete --}}
                    <form method="post" action="{{ route('absensi.destroy', $ab->id) }}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn delete-data btn-danger"
                            data-nama_karyawan="{{ $ab->nama_karyawan }}">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
