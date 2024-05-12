@extends('welcome')

@section('content')
    <div class="container-form">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                Выберите подрядную организацию
            </a>
            @if($contractors)
                @foreach($contractors as $contractor)
                    <a href="{{ route('audits.year.contractor', ['year' => $year, 'contractor' => $contractor['id']]) }}" class="list-group-item list-group-item-action">{{ $contractor['name'] }}</a>
                @endforeach
            @endif
            <ul class="nav nav-pills mt-2">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('audits') }}">Вернуться назад</a>
                </li>
                </li>
            </ul>
        </div>
    </div>
@endsection
