@extends('dashboard.layouts.index')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Create Operator</h6>
    </div>
    <div class="card-body">
        <form action="/dashboard/manajemen-operator/store" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" required>
                @if ($errors->has('name'))
                <div class="text-danger">
                    @foreach ($errors->get('name') as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach
                </div>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
                @if ($errors->has('email'))
                <div class="text-danger">
                    @foreach ($errors->get('email') as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach
                </div>
                @endif
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                @if ($errors->has('password'))
                <div class="text-danger">
                    @foreach ($errors->get('password') as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach
                </div>
                @endif
            </div>
            <input type="hidden" name="role" value="Operator">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="/dashboard/manajemen-operator" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>
@endsection