@extends('layouts.app')

@section('content')
<h2>criar/editar usuário</h2>

@isset ($user)
<pre>
    {{ $user }}
</pre>
@endisset
@endsection
