@extends('templates.app')


@section('content')
    <div class="container mt-5">
        <div class="row">

            <div class="col-md-12">
                <div class="card">


                    {{-- HEADER --}}
                    <div class="card-header">
                        <h5 class="title">Absensi</h5>
                    </div>
                    {{-- HEADER --}}

                    {{-- body  --}}
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#modalFormAbsensi">Add</button>

                        <a href="{{ route('export-absensi') }}" class="btn btn-success">
                            <i class="fa fa-file" aria-hidden="true"></i> Export
                        </a>

                        <a href="{{ route('absensi-pdf') }}" class="btn btn-danger">
                            <i class="fa fa-file" aria-hidden="true"></i> PDF
                        </a>

                           <!-- Button trigger modal import-->
                           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#absensiImport">
                            Import data
                        </button>


                        @include('absensi.form')
                        @include('absensi.data')


                    </div>
                    {{-- END body --}}
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')
    <script>
        // Delete
        $('.delete-data').on('click', function(e) {
            e.preventDefault()
            const data = $(this).closest('tr').find('td:eq(1)').text()
            Swal.fire({
                title: `Apakah data <span style="color:#3085d6"></span> akan dihapus?`,
                icon: "question",
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
                showCancelButton: true,
                showCloseButton: true
            }).then((result) => {
                if (result.isConfirmed)
                    $(e.target).closest('form').submit()
                else swal.close()
            })
        });


        // Edit
        $('#modalFormAbsensi').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget)
            console.log(btn.data('mode'))
            const mode = btn.data('mode')
            const nama_karyawan = btn.data('nama_karyawan')
            const tanggal_masuk = btn.data('tanggal_masuk')
            const waktu_masuk = btn.data('waktu_masuk')
            const status = btn.data('status')
            const waktu_selesai = btn.data('waktu_selesai')



            const id = btn.data('id')
            const modal = $(this)
            if (mode === 'edit') {
                modal.find('.modal-title').text('Edit Absensi');
                modal.find('#nama_karyawan').val(nama_karyawan);
                modal.find('#tanggal_masuk').val(tanggal_masuk);
                modal.find('#waktu_masuk').val(waktu_masuk);
                modal.find('#status').val(status);
                modal.find('#waktu_selesai').val(waktu_selesai);


                modal.find('.modal-body form').attr('action', '{{ url('absensi') }}/' + id)
                modal.find('#method').html('@method('PUT')');
            } else {
                modal.find('.modal-title').text('Input absensi');
                modal.find('.modal-title').text('');
                modal.find('#nama_karyawan').val('');
                modal.find('#tanggal_masuk').val('');
                modal.find('#waktu_masuk').val('');
                modal.find('#status').val('');
                modal.find('#waktu_selesai').val('');


                modal.find('.modal-body form').attr('action', '{{ url('absensi') }}');

            };

        });
        //  END Edit
    </script>
@endpush
