@extends('layouts.app')

@section('content')


        <!-- Shop Login -->
        <section class="shop login section">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 offset-lg-3 col-12">
						<div class="login-form">
							<h2>Login</h2>
							<p>Please register in order to checkout more quickly</p>

                <!-- Form -->


                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="form" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row">

                            <div class="col-12">
								<div class="form-group">
									<label>Your Email<span>*</span></label>
                                    <input id="email" type="email" placeholder="gianni@example.it" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>
							</div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror



                            <div class="col-12">
                                <div class="form-group">
                                    <label>Your Password<span>*</span></label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                 </div>
                                </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror


                        <div class="col-12">
							<div class="form-group login-btn">
                                <button class="btn" type="submit">Login</button>
                                <a href="{{ route('register') }}" class="btn">Register</a>
                            </div>
                        </div>

                        <div class="col-12 mt-1">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ ('Forgot Your Password?') }}
                                    </a>
                                @endif
                        </div>

                    </div>
                </form>
                    <!--/ End Form -->
                </div>
            </div>
        </div>
    </div>
</section>



@endsection
