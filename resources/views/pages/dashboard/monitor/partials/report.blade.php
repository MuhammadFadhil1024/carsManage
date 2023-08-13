<table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Kendaraan</th>
            <th>Driver</th>
            <th>Kepala tambang</th>
            <th>Kepala kantor</th>
            <th>Tanggal pinjam</th>
            <th>Tanggal kembali</th>
            <th>Bahan bakar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usages as $index => $usage)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $usage->vehicle->vehicles_number }}</td>
                <td>{{ $usage->driver->name }}</td>
                <td>
                    @if ($usage->approved_by_head_mine == 1)
                        <span class="badge badge-success p-2">Setuju</span>
                    @endif
                </td>
                <td>
                    @if ($usage->approved_by_head_office == 1)
                        <span class="badge badge-success p-2">Setuju</span>
                    @endif
                </td>
                <td>{{ $usage->usage_date }}</td>
                <td>{{ $usage->end_of_usage_date }}</td>
                <td>{{ $usage->fuel_consumption }} Liter</td>
            </tr>
        @endforeach
        <!-- Tambahkan baris lainnya sesuai dengan data Anda -->
    </tbody>
</table>
