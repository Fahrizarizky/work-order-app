@extends('dashboard.layouts.index')
@section('content')

@can('manager-production')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Work Order</h1>
    <a href="/dashboard/wo-manager/create" class="btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Work Order
    </a>
</div>

<!-- Filter Buttons -->
<div class="mb-3">
    <a href="/dashboard/filterpending" class="btn btn-sm btn-secondary">Pending</a>
    <a href="/dashboard/filterinprogress" class="btn btn-sm btn-primary">In Progress</a>
    <a href="/dashboard/filtercompleted" class="btn btn-sm btn-success">Completed</a>
    <a href="/dashboard/filtercanceled" class="btn btn-sm btn-danger">Canceled</a>
    <a href="/dashboard/wo-manager" class="btn btn-sm btn-info">All</a>
</div>

<!-- DataTable -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Work Order</h6>

        @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show mt-2 text-center" role="alert">
            {{ session('message' )}}
        </div>                  
        @endif

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Work Order</th>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Tenggat Waktu</th>
                        <th>Status</th>
                        <th>Operator</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($workorders->isEmpty())
                    <tr>
                        <td colspan="9" class="text-center text-muted">
                            Tidak ada data work order tersedia.
                        </td>
                    </tr>
                    @else
                    @foreach ($workorders as $workorder)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$workorder->nomor_wo}}</td>
                        <td>{{$workorder->nama_produk}}</td>
                        <td>{{$workorder->jumlah}}</td>
                        <td>{{$workorder->tenggat_waktu}}</td>
                        <td>{{$workorder->status}}</td>
                        <td>{{$workorder->user ? $workorder->user->name : 'Operator tidak ditemukan/dihapus'}}</td>
                        <td>
                            <a href="/dashboard/wo-manager/edit/{{$workorder->id}}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="/dashboard/wo-manager/show/{{$workorder->id}}" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i>
                            </a>
                            <form action="/dashboard/wo-manager/delete/{{$workorder->id}}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this record?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>   
@endcan

@can('operator')   
    <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Work Order</h1>
</div>

<!-- DataTable -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Work Order</h6>

        @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show mt-2 text-center" role="alert">
            {{ session('message' )}}
        </div>                  
        @endif

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Work Order</th>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Tenggat Waktu</th>
                        <th>Status</th>
                        <th>Oprator</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($workordersoperator->isEmpty())
                    <tr>
                        <td colspan="9" class="text-center text-muted">
                            Tidak ada data work order tersedia.
                        </td>
                    </tr>
                    @else 
                    @foreach ($workordersoperator as $workorder)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$workorder->nomor_wo}}</td>
                        <td>{{$workorder->nama_produk}}</td>
                        <td>{{$workorder->jumlah}}</td>
                        <td>{{$workorder->tenggat_waktu}}</td>
                        <td>{{$workorder->status}}</td>
                        <td>{{$workorder->user->name}}</td>
                        <td>
                            <a href="/dashboard/wo-manager/edit/{{$workorder->id}}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="/dashboard/wo-manager/show/{{$workorder->id}}" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i>
                            </a>
                            @can('manager-production')
                            <form action="/dashboard/wo-manager/delete/{{$workorder->id}}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this record?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>   
@endcan

@endsection
