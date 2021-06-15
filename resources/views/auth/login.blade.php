@extends('layouts.base')

@section('content')
<div class="container">

  <div class="row justify-content-center">
  <div class="col-xxl-4 col-lg-5">
    <div class="card">

      <div class="card-header pt-4 pb-4 text-center bg-primary">
        <div class="text-center w-75 m-auto">
          <h4 class="text-center text-white pb-0 fw-bold">Login</h4>
          <p class="text-white mb-4">Entre com email e senha para acessar o painel admin.</p>
        </div>
      </div>

      <div class="card-body p-4">

        <form method="POST" action="{{ route('login') }}">
          @csrf

          <div class="mb-3">
            <label for="emailaddress" class="form-label">Email</label>
            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="emailaddress" required autofocus placeholder="Entre com seu email">
          </div>

          <div class="mb-3">
            <a href="{{ route('password.request') }}" class="text-muted float-end"><small>Esqueceu sua senha?</small></a>
            <label for="password" class="form-label">Senha</label>
            <div class="input-group input-group-merge">
              <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Entre com sua senha">
              @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="mb-3 mb-3">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="checkbox-signin" checked="">
              <label class="form-check-label" for="checkbox-signin">Lembrar</label>
            </div>
          </div>

          <div class="mb-3 mb-0 text-center">
            <button class="btn btn-primary" type="submit"> Entrar </button>
          </div>

        </form>
      </div> <!-- end card-body -->
    </div>
    <!-- end card -->

		</div> <!-- end col -->
	</div>
	<!-- end row -->

</div>
@endsection
