@extends('layouts.app')

@section('content')
    <h2>lista de usuários</h2>
    @foreach ($users as $user)
        <pre>
            {{ $user }}
        </pre>
    @endforeach
@endsection
