@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-lg-6 offset-lg-3 col-12">
			<div class="login-form">
				<h2>Reset Password</h2>
							

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row">
                            <div class="col-12">
								<div class="form-group">
									<label>Email Address<span>*</span></label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>
                            </div>
                                

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           

                    <div class="col-12">
						<div class="form-group login-btn">
                            <button class="btn" type="submit">Send Password Reset Link</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
