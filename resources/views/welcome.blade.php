@extends('layouts.app')

@section('content')
    <div class="w-full py-6">
        <h2 class="text-center text-2xl font-bold">Página de entrada</h2>

        <section class="text justify-items-start text-justify indent-8">
            <p class="py-2">
                Página de entrada da aplicação. Esse frontend foi construído com <b>Tailwind</b>, apenas para demonstrar a
                possibilidade de construção, mas não é o foco do teste.
            </p>

            <p class="py-2">Todas as <em>features</em> estão funcionais, porém, o <b>frontend</b> não está totalmente
                funcional. Somente
                a listagem de usuários está finalizada, com a função de <em>deletar</em> funcionando e links para o que
                seriam os formulários de criar, editar e de empréstimo.</p>

            <p class="py-2">
                Apesar dos formulários e tabelas de listagem não estarem finalizados, é possível visualizar as listas de
                usuários, livros, gêneros e empréstimos nos menus.
            </p>
        </section>
    </div>
@endsection
