@extends('layouts.app')

@section('content')
<section class="shop login section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 offset-lg-3 col-12">
				<div class="login-form">
					<h2>Register</h2>
					<p>Please register in order to checkout more quickly</p>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                        <div class="row">
					        <div class="col-12">
						        <div class="form-group">
					    		    <label>Your Name<span style="color: #ff2c18">*</span></label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>
                                 @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           

                        <div class="col-12">
					        <div class="form-group">
					            <label>Your Email<span style="color: #ff2c18">*</span></label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            </div>
                        </div>                           
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            

                        <div class="col-12">
		        			<div class="form-group">
				    		    <label>Your Password<span style="color: #ff2c18">*</span></label>
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
						        <label>Confirm Password<span style="color: #ff2c18">*</span></label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="col-12">
					        <div class="form-group login-btn">
					            <button class="btn" type="submit">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
