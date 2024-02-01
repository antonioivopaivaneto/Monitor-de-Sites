<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mx-4">
                {{ __('Logs do endpoint {$endpoint->endpoint}') }}
            </h2>
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
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-6 bg-gray-50 dark:bg-gray-800">
                                    Body
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($checks as $check)
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td class="px-6 py-4">
                                        {{ $check->status_code }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $check->response_body  ?? "-"}}
                                    </td>

                                    <td class="px-6 py-4">

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
