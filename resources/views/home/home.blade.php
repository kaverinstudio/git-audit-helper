@extends('welcome')

@section('content')
    <div class="container-form">
        <form action="{{ route('login') }}" class="form" method="POST">
            @csrf
            <select class="form-select" name="email" aria-label="Выберите пользователя">
                <option selected>Выберите пользователя</option>
                @if($users)
                    @foreach($users as $user)
                <option value="{{ $user['email'] }}">{{ $user['name'] }}</option>
                    @endforeach
                @endif
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
