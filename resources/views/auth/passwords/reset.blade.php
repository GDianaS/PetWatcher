@extends('layout')

@section('title', 'Resetar senha')

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
<form  style="max-width: 400px;" method="POST" action="/password_reset">
  @csrf
  <div class="form-group">
    <div class="form-floating mb-3">
      <input type="password" value='12345' name="oldpassword" class="form-control" id="floatingInput" placeholder="nome@examplo.com">
      <label for="floatingInput">Senha Atual</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" value='12345678' name="newpassword" class="form-control" id="floatingInput" placeholder="nome@examplo.com">
      <label for="floatingInput">Insira a nova senha</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" value='12345678' name="newpasswordconfirm" class="form-control" id="floatingInput" placeholder="nome@examplo.com">
      <label for="floatingInput">Confirme a senha nova</label>
    </div>
    
  </div>
  <button type="submit" class="btn btn-primary" value="Reset">Entrar</button>
</form>
@endsection