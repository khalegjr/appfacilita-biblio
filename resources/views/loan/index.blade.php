@extends('layouts.app')

@section('content')
    <h2>lista de empréstimos</h2>
    @foreach ($loans as $loan)
        <pre>
            {{ $loan }}
        </pre>
    @endforeach
@endsection
