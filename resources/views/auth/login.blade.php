@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="offset-sm-4 col-sm-4 offset-sm-4 bg-success rounded">
                                    <button type="submit" class="btn text-white fw-bold">
                                        <i class="fas fa-sign-in-alt"></i> &shy;{{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="offset-sm-4 col-sm-4 offset-sm-4 bg-primary rounded">
                                    <a href="{{route('login.facebook')}}" class="btn text-white fw-bold" title="Login pelo facebook">
                                        <i class="fab fa-facebook"></i> &shy;Login pelo Facebook
                                    </a>
                                </div>
                                <div class="offset-sm-4 col-sm-4 offset-sm-4 my-3 bg-dark rounded">
                                    <a href="{{route('login.github')}}" class="btn text-white fw-bold" title="Login pelo Github">
                                        <i class="fab fa-github"></i> &shy;Login pelo Github
                                    </a>
                                </div>
                                <div class="offset-sm-4 col-sm-4 offset-sm-4 mb-3 bg-white border border-secondary rounded">
                                    <a href="{{route('login.google')}}" class="btn text-secondary fw-bold" title="Login pelo Google">
                                        <img src="https://img.icons8.com/color/48/000000/google-logo.png" height="13.94" width="14.39"> &shy;Login pelo Google
                                    </a>
                                </div>
                                <div class="offset-sm-4 col-sm-4 offset-sm-4 my-3">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Esqueceu sua senha?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js" integrity="sha512-fzff82+8pzHnwA1mQ0dzz9/E0B+ZRizq08yZfya66INZBz86qKTCt9MLU0NCNIgaMJCgeyhujhasnFUsYMsi0Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @endpush
@endsection
