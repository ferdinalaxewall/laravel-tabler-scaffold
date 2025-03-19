@extends('admin.layouts.master')
@section('title', 'Form Administrator')

@section('content')
<x:page.header title="Form Administrator" subtitle="Users" />

<div class="card">
    <div class="card-body">
        <form action="{{ $data['action'] }}" class="row" method="POST">
            @csrf
            @method($data['method'])
            <div class="col-12 mb-3">
                <label for="name" class="form-label required">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user?->name) }}" placeholder="John Doe" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12 mb-3">
                <label for="email" class="form-label required">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user?->email) }}" placeholder="admin@example.com" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="password" class="form-label @if($data['method'] == 'POST') required @endif">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="********" @required($data['method'] == "POST")>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="password_confirmation" class="form-label @if($data['method'] == 'POST') required @endif">Password Confirmation</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="********" @required($data['method'] == "POST")>
                @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12 d-flex align-items-center justify-content-end gap-2">
                <a href="{{ route('admin.users.administrator.index') }}" class="btn btn-secondary">Close</a>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
