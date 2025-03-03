@extends('dashboard.layouts.index')
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan Hasil Operator</h1>
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
                        <th>Nama Operator</th>
                        <th>Nama Produk</th>
                        <th>Total Completed</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($operatorReports->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            Tidak ada data laporan tersedia.
                        </td>
                    </tr>              
                    @else
                    @foreach ($operatorReports as $report)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $report->user ? $report->user->name : 'Operator tidak ditemukan/dihapus'}}</td>
                        <td>{{ $report->nama_produk }}</td>
                        <td>{{ $report->total_completed }}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
