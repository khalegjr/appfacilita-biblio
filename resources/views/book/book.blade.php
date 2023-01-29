@extends('layouts.app')

@section('content')
    <h2>criar/editar livro</h2>

    @isset($book)
        <pre>
            {{ $book }}
        </pre>
    @endisset
@endsection
