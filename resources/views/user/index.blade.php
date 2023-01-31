@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-2">
                <p class="font-weight-bold text-center text-2xl">
                    Lista - <span class="text-primary">Usuários</span>
                </p>
            </div>
        </div>

        <div class="row px-4 py-6">
            <a class="ease focus:shadow-outline m-2 select-none rounded-md border border-green-500 bg-green-500 px-4 py-2 text-white transition duration-500 hover:bg-green-600 focus:outline-none"
                href="{{ route('users.create') }}">
                Cadastrar Usuário(a)
            </a>
        </div>

        <table
            class="w-full border-collapse overflow-hidden rounded-lg border border-gray-200 bg-white text-left text-sm text-gray-500 shadow-md">
            <thead class="dark:bg-dark bg-gray-50">
                <tr>
                    <th class="px-6 py-4 font-medium text-gray-900" scope="col">No</th>
                    <th class="px-6 py-4 font-medium text-gray-900" scope="col">Nome</th>
                    <th class="px-6 py-4 font-medium text-gray-900" scope="col">Email</th>
                    <th class="px-6 py-4 font-medium text-gray-900" scope="col"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                @foreach ($users as $key => $value)
                    <tr class="hover:bg-gray-50">
                        <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">{{ $value->id }}</th>
                        <td class="px-6 py-4">{{ $value->name }}</td>
                        <td class="px-6 py-4">{{ $value->email }}</td>
                        <td class="px-6 py-4">
                            <div class="flex justify-end gap-4">
                                <form action="{{ route('users.destroy', $value->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button x-data="{ tooltip: 'Delete' }">
                                        <svg class="h-6 w-6 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            x-tooltip="tooltip">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                </form>

                                <a href="{{ route('users.edit', $value->id) }}" x-data="{ tooltip: 'Edite' }">
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" x-tooltip="tooltip">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                    </svg>
                                </a>

                                <a href="{{ route('loans.create') }}" x-data="{ tooltip: 'Emprestar' }">
                                    <svg class="h-6 w-6 text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                    </svg>

                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-12">
                {{ $users->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
@endsection
