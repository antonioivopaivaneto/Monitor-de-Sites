<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mx-4">
                {{ __('Endpoints do site {$site->url}') }}
            </h2>
            <a class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 ml-4 px-2 " href="{{ route('endpoints.create',$site->id) }}">+</a>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    <x-alerts />


                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-6 bg-gray-50 dark:bg-gray-800">
                                    Endpoint
                                </th>
                                <th scope="col" class="px-6 py-6 bg-gray-50 dark:bg-gray-800">
                                    Frequencia
                                </th>
                                <th scope="col" class="px-6 py-6 bg-gray-50 dark:bg-gray-800">
                                    Prox. Verificacao
                                </th>
                                <th scope="col" class="px-6 py-6 bg-gray-50 dark:bg-gray-800">
                                    Açoes
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($endpoints as $endpoint)
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td class="px-6 py-4">
                                        {{ $endpoint->endpoint }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $endpoint->frequency }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $endpoint->next_check }}
                                    </td>
                                    <td class="px-6 py-4">

                                        <a href="{{ route('endpoints.edit', [$site->id,$endpoint->id]) }}">Editar</a>
                                            <a  href="{{ route('endpoints.checks', $endpoint->id) }}">logs</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
