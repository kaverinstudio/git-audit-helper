@extends('welcome')

@section('content')
    <div class="container-form">
        <form action="{{ route('login') }}" class="form" method="POST">
            @csrf
            <select class="form-select" name="email" aria-label="Пример выбора по умолчанию">
                <option selected>Откройте это меню выбора</option>
                <option value="test@test.com">ASE</option>
                <option value="2">Два</option>
                <option value="3">Три</option>
            </select>
            <div class="mb-3">
                @error('error')
                <p>{{ $message }}</p>
                @enderror
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
@endsection
