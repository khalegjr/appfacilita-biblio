@extends('layouts.app')

@section('content')
    <h2>lista de gêneros</h2>
    @foreach ($genres as $genre)
        <pre>
            {{ $genre }}
        </pre>
    @endforeach
@endsection
