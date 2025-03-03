@extends('dashboard.layouts.index')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Work Order</h6>
    </div>
    <div class="card-body">
        <form action="/dashboard/wo-manager/update/{{$workorder->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-select" id="status" name="status" required>
                    @foreach ($allstatus as $status)
                    <option {{$status === $statusname ? 'selected' : ''}} value="{{$status}}">{{$status}}</option>
                    @endforeach
                </select>
            </div>

            @can('manager-production')
            <div class="form-group">
                <label for="user_id">Operator</label>
                <select class="form-select" id="user_id" name="user_id">
                    @foreach ($operators as $operator)
                    <option {{$operator->id == $operatorid ? 'selected' : ''}} value="{{$operator->id}}" >{{$operator->name ? $operator->name : ''}}</option>
                    @endforeach
                </select>
            </div>                            
            @endcan

            @can('operator')
            <div class="form-group">
                <label for="jumlah_dikerjakan">Jumlah yang Diproses</label>
                <input type="number" class="form-select" id="jumlah_dikerjakan" name="jumlah_dikerjakan" value="{{$workorder->jumlah_dikerjakan}}" required>
            </div>
            <div class="form-group">
                <label for="catatan">Catatan</label>
                <textarea class="form-control" id="catatan" name="catatan" rows="4">{{ $workorder->catatan }}</textarea>
            </div>
            <input type="hidden" name="user_id" value={{auth()->user()->id}}>
            @endcan
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/dashboard/wo-manager" class="btn btn-secondary">Back</a>                            

        </form>
    </div>
</div>
@endsection