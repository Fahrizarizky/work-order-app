@extends('dashboard.layouts.index')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Create Work Order</h6>
    </div>
    <div class="card-body">
        <form action="/dashboard/wo-manager/store" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
                @if ($errors->has('nama_produk'))
                <div class="text-danger">
                    @foreach ($errors->get('nama_produk') as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach
                </div>
                @endif
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                @if ($errors->has('jumlah'))
                <div class="text-danger">
                    @foreach ($errors->get('jumlah') as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach
                </div>
                @endif
            </div>
            <div class="form-group">
                <label for="tenggat_waktu">Tenggat Waktu</label>
                <input type="date" class="form-control" id="tenggat_waktu" name="tenggat_waktu" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select type="date" class="form-select" id="status" name="status" required>
                    <option selected value="Pending">Pending</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                    <option value="Canceled">Canceled</option>
                </select>
            </div>
            <div class="form-group">
                <label for="user_id">Operator</label>
                <select type="date" class="form-select" id="user_id" name="user_id" required>
                    @foreach ($operators as $operator)
                    <option value="{{$operator->id ? $operator->id : ''}}">{{$operator->name ? $operator->name : ''}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="/dashboard/wo-manager" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>
@endsection