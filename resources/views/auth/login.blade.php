@extends('layouts.app')

@section('content')
<div class="container h-100">
    {{-- <div class="row align-items-center h-100">
        <div class="col-12	col-sm-12	col-md-6	col-lg-6	col-xl-6 mx-auto">
            <div class="card" style="margin-top: 30%">
                <div class="card-header text-center">INICIAR SESIÓN</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de usuario') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="current-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 offset-md-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
            @endif
        </div>
    </div>
    </form>
</div>
</div>
</div>
</div> --}}
<section class="contact-page-section" style="background-image:url(images/background/25.jpg)">
    <div class="pattern-layer" style="background-image:url(images/background/pattern-13.png)"></div>
    <div class="container">
        <div class="row">

            <!-- Info Column -->


            <!-- Form Column -->
            <div class="form-column col-12	col-sm-12	col-md-6	col-lg-6	col-xl-6 mx-auto">
                <div class="inner-column" style="border-radius:10%">
                    <div class="title-box">
                        {{-- <div class="title">INICIAR SESIÓN</div> --}}
                        <h3>INICIAR SESIÓN</h3>
                    </div>

                    <!-- Contact Form -->
                    <div class="contact-form">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <div class="col-12">
                                    <span class="fa fa-user-circle"></span>
                                    <input class="@error('secusrtmail') is-invalid @enderror" 
                                        value="{{ old('secusrtlogu') }}" id="secusrtmail" required autocomplete="email" autofocus type="text"
                                        name="secusrtmail" placeholder="Tu correo electronico" required="">
                                    @error('secusrtmail')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                               
                            </div>

                            <div class="form-group">
                                <div class="col-12">
                                    <span class="fa fa-key"></span>
                                    <input class="@error('password') is-invalid @enderror" name="password" required
                                        autocomplete="current-password" type="password" placeholder="Tu contraseña" required="">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- 								
								<div class="form-group">
									<span class="icon flaticon-phone"></span>
									<input type="text" name="phone" placeholder="Phone Number " required="">
								</div>
								
								<div class="form-group comment-group">
									<span class="icon icon-comments"></span>
									<textarea name="message" placeholder="Write your message "></textarea>
								</div> --}}

                            <div class="form-group">
                                <button class="theme-btn submit-btn" type="submit" name="submit-form">LOGIN</button>
                                <a class="theme-btn submit-btn btn-danger text-center" href="/">VOLVER</a>
                            </div>

                        </form>

                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
</div>
@endsection