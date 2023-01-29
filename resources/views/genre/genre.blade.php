@extends('layouts.app')

@section('content')
    <h2>criar/editar gênero</h2>

    @isset($genre)
        <pre>
            {{ $genre }}
        </pre>
    @endisset
@endsection
