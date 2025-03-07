@extends('admin.layouts.auth')
@section('title', 'Forgot Password')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5 col-12">
        <form class="card card-md" action="{{ route('auth.store.forgot-password') }}" method="POST">
            @csrf
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Forgot password</h2>
                <p class="text-secondary mb-4">Enter your email address and your password will be reset and emailed to you.
                </p>
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email" required autofocus>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary btn-4 w-100">
                        <!-- Download SVG icon from http://tabler.io/icons/icon/mail -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-2">
                            <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z">
                            </path>
                            <path d="M3 7l9 6l9 -6"></path>
                        </svg>
                        Send me new password
                    </button>
                </div>
            </div>
        </form>
        <div class="text-center text-secondary mt-3">
            Forget it, <a href="{{ route('auth.login') }}">send me back</a> to the sign in
            screen.
        </div>
    </div>
</div>
@endsection
