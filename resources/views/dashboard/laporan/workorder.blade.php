@extends('dashboard.layouts.index')
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan Rekapitulasi Work Order</h1>
</div>

<!-- DataTable -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Laporan</h6>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Pending</th>
                        <th>In Progress</th>
                        <th>Completed</th>
                        <th>Canceled</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($workorders->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            Tidak ada data laporan tersedia.
                        </td>
                    </tr>              
                    @else
                    @foreach($workorders as $workorder)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $workorder->nama_produk }}</td>
                            <td>{{ $workorder->status == 'Pending' ? $workorder->total_quantity : 0 }}</td>
                            <td>{{ $workorder->status == 'In Progress' ? $workorder->total_quantity : 0 }}</td>
                            <td>{{ $workorder->status == 'Completed' ? $workorder->total_quantity : 0 }}</td>
                            <td>{{ $workorder->status == 'Canceled' ? $workorder->total_quantity : 0 }}</td>
                        </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection


