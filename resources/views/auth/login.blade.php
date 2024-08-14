@extends('layout')

@section('title', 'Login')

@section('content')

@if($errors->any())
<div class="alert alert-danger" >
  <ul>
    @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>

</div>

@endif

<form style="max-width: 380px; margin: auto" method="POST" action="/login">
  @csrf
  <div class="form-group text-center mt-3">
  
    <img
          src="assets/Login/undraw_authentication_fsn5.svg"
          class=" mb-4"
          style="height: 200px"
        />


    <div class="form-floating mb-3">
      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="nome@examplo.com">
      <label for="floatingInput">Endereço de Email</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Senha">
      <label for="floatingPassword">Password</label>
    </div>
    <div class="checkbox">
      <label>
        <input style="margin-top:20%;" type="checkbox" value="remember-me" /> Remember me
      </label>
    </div>
    <div class="mt-3">
      <button type ="submit" class="btn btn-lg btn-primary btn-block" value="Login">Entrar</button>
    </div>
  </div>
</form>

@endsection