@extends('layouts.app')

@section('content')
    <h2>fazer empréstimo</h2>

    @isset($loan)
        <pre>
            {{ $loan }}
        </pre>
    @endisset
@endsection
