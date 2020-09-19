@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-lg-6 offset-lg-3 col-12">
			<div class="login-form">
				<h2>Reset Password</h2>
							


                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row">
                            <div class="col-12">
								<div class="form-group">
									<label>Email Address<span>*</span></label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                </div>
							</div>


                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        

                        <div class="col-12">
							<div class="form-group">
								<label>Password<span>*</span></label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            </div>
                        </div>


                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                        <div class="col-12">
							<div class="form-group">
								<label>Confirm Password<span>*</span></label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                             </div>
                        </div>

                        <div class="col-12">
							<div class="form-group login-btn">
                                <button type="submit" class="btn">Reset Password</button>
                            </div>
                        </div>
                      </div>  
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
