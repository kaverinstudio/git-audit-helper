@extends('welcome')

@section('content')
    <div class="container-form">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                Выберите аудит
            </a>
            @if($auditNumbers)
                @foreach($auditNumbers as $auditNumber)
                    <a href="#" class="list-group-item list-group-item-action">{{ $auditNumber['number'] }} от {{ $auditNumber['date'] }}</a>
                @endforeach
            @endif
            <ul class="nav nav-pills mt-2">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('audits.year', ['year' => $year]) }}">Вернуться назад</a>
                </li>
                </li>
            </ul>
        </div>
    </div>
@endsection

