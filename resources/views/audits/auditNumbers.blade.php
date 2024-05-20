@extends('welcome')

@section('content')
    <div class="container-form">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                Выберите аудит
            </a>
            @if($auditNumbers)
                @foreach($auditNumbers as $auditNumber)
                    <a href="{{ route('audits.year.contractor.audit', ['year' => $year, 'contractor' => $auditNumber['user_id'], 'audit' => $auditNumber['id']]) }}" class="list-group-item list-group-item-action">{{ $auditNumber['number'] }} от {{ $auditNumber['date'] }}</a>
                @endforeach
            @endif
        </div>
    </div>
    <div class="bottom-panel">
        <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-bottom">
            <div class="container">
                @if($isSubContractor)
                    <a class="btn btn-outline-secondary btn-sm" aria-current="page" href="{{ route('audits') }}">Вернуться назад</a>
                @else
                    <a class="btn btn-outline-secondary btn-sm" aria-current="page" href="{{ route('audits.year', ['year' => $year]) }}">Вернуться назад</a>
                @endif
            </div>
        </nav>
    </div>
@endsection

