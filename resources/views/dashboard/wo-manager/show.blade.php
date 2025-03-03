@extends('dashboard.layouts.index')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Work Order</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nomor_wo">Nomor Work Order</label>
                    <input type="text" class="form-control" id="nomor_wo" name="nomor_wo" value="{{ $workorder->nomor_wo }}" readonly>
                </div>
                <div class="form-group">
                    <label for="nama_produk">Nama Produk</label>
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ $workorder->nama_produk }}" readonly>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah Produk</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $workorder->jumlah }}" readonly>
                </div>
                <div class="form-group">
                    <label for="jumlah_dikerjakan">Jumlah Produk yang Diproses pada status "{{$workorder->status}}"</label>
                    <input type="number" class="form-control" id="jumlah_dikerjakan" name="jumlah_dikerjakan" value="{{ $workorder->jumlah_dikerjakan ?? 0}}" readonly>
                </div>
                <div class="form-group">
                    <label for="tenggat_waktu">Tenggat Waktu</label>
                    <input type="date" class="form-control" id="tenggat_waktu" name="tenggat_waktu" value="{{ $workorder->tenggat_waktu }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" id="status" name="status" value="{{ $workorder->status }}" readonly>
                </div>
                <div class="form-group">
                    <label for="catatan">Catatan</label>
                    <textarea class="form-control" id="catatan" name="catatan" rows="4" readonly>{{ $workorder->catatan ?? 'Belum ada catatan'}}</textarea>
                </div>
                <div class="form-group">
                    <label for="operator">Operator</label>
                    <input type="text" class="form-control" id="operator" name="operator" value="{{$workorder->user ? $workorder->user->name : 'Operator tidak ditemukan/dihapus'}}" readonly>
                </div>
                <div class="form-group">
                    <label for="operator">Durasi Pengerjaan Setiap Perubahan Status</label>
                    <input type="text" class="form-control" id="operator" name="operator" value="{{ $workorder->formatted_time_spent }}" readonly>
                </div>
            </div>
        </div>
        <a href="/dashboard/wo-manager" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection
