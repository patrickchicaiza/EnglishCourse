@extends('layout')
@section('content')
<style>
    .container {
        max-width: 450px;
    }

    .push-top {
        margin-top: 50px;
    }
</style>
<div class="card push-top">
    <div class="card-header">
        Agregar Usuario
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form method="post" action="{{ route('students.guardar') }}" name="form1">
            <div class="form-group">
                @csrf
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" />
            </div>
            <div class="form-group">
                <label for="phone">Teléfono</label>
                <input type="tel" class="form-control" name="phone" maxlength="10" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" />
            </div>
            <div class="form-group">
                <label for="password">Clave</label>
                <input type="password" class="form-control" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener al menos 1 numero, 1 mayuscula, 1 minuscula y minimo 8 caracateres" />
            </div>
            <button type="submit" class="btn btn-block btn-danger">Crear Usuario</button>
            <button type="reset" class="btn btn-block btn-danger">Borrar</button>
        </form>
    </div>
</div>
@endsection