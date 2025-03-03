@extends('dashboard.layouts.index')
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Manajemen Operator</h1>
    <a href="/dashboard/manajemen-operator/create" class="btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Operator
    </a>
</div>

<!-- DataTable -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Operator</h6>

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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($operators->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            Tidak ada data Operator tersedia.
                        </td>
                    </tr>              
                    @else
                    @foreach ($operators as $operator)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$operator->name}}</td>
                        <td>{{$operator->email}}</td>
                        <td>
                            <a href="/dashboard/manajemen-operator/edit/{{$operator->id}}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="/dashboard/manajemen-operator/delete/{{$operator->id}}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this record?');">
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

@endsection
