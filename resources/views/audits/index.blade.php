@extends('welcome')

@section('content')
    <div class="container-form">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                Выберите год аудита
            </a>
            @if($years)
                @foreach($years as $year)
            <a href="{{ route('audits.year', ['year' => $year['year']]) }}" class="list-group-item list-group-item-action">{{ $year['year'] }}</a>
                @endforeach
                @endif
        </div>
    </div>
@endsection
