@extends('layouts.app')

@section('content')
    <h2>lista de livros</h2>
    @foreach ($books as $book)
        <pre>
            {{ $book }}
        </pre>
    @endforeach
@endsection
