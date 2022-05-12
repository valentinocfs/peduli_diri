<div class="table-responsive">
    <table class="table table-striped mb-0">
        @php
            $num = ($data->perPage() * $data->currentPage()) - ($data->perPage() - 1) ;   
        @endphp
        <thead>
            <tr>
                <th>No</th>
                <th>Lokasi</th>
                <th>Suhu</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $value)
                <tr>
                    <td>{{ $num++ }}</td>
                    <td>{{ $value->lokasi }}</td>
                    <td>{{ $value->suhu }}</td>
                    <td>{{ $value->tanggal }}</td>
                    <td>{{ $value->jam }}</td>
                    <td class="text-center"> 
                        <a href="/perjalanan/{{ $value->id }}/detail" class="btn icon btn-primary border px-3">
                            <i data-feather="edit"></i>Edit
                        </a>
                        <a href="/perjalanan/{{ $value->id }}" class="btn btn-danger my-1 px-2"
                            data-bs-toggle="modal" data-id-user="{{ $value->id }}" data-bs-target="#danger" onclick="getIdUserForm(this)">
                            Hapus
                        </a>
                    </td>
                </tr>
                    @include('layouts.modalDelete')
            @endforeach
        </tbody>
    </table>
</div>

<script>
    let idPerjalanan;

    function getIdUserForm(that) {
        const formPerjalanan = document.getElementById('deletePerjalanan');
        idPerjalanan = that.getAttribute('data-id-user')

        formPerjalanan.action = `perjalanan/${ idPerjalanan }/delete`;

    }

    function btnDeletePerjalanan() {
        window.location = `perjalanan/${idPerjalanan}/delete`;
    }
</script>