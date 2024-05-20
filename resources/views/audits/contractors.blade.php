@extends('welcome')

@section('content')
    <div class="container-form">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                Выберите подрядную организацию
            </a>
            @if($contractors)
                @foreach($contractors as $contractor)
                    <a href="{{ route('audits.year.contractor', ['year' => $year['year'], 'contractor' => $contractor['id']]) }}" class="list-group-item list-group-item-action">{{ $contractor['name'] }}</a>
                @endforeach
            @endif
        </div>
    </div>
    <div class="bottom-panel">
        <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-bottom">
            <div class="container">
                <a class="btn btn-outline-secondary btn-sm" aria-current="page" href="{{ route('audits') }}">Вернуться назад</a>
            </div>
        </nav>
    </div>
@endsection
