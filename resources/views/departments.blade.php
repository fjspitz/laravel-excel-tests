<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Departments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="w-full whitespace-no-wrapw-full whitespace-no-wrap">
                        <thead>
                            <tr class="text-center font-bold">
                                <th class="border px-6 py-3">#</th>
                                <th class="border px-6 py-3">Name</th>
                            </tr>
                        </thead>
                        @foreach ($departments as $e)
                        <tr>
                            <td class="border px-6 py-3">{{ $e->dept_no }}</td>
                            <td class="border px-6 py-3">{{ $e->dept_name}}</td>
                        </tr>
                        @endforeach
                    </table>

                    <div class="mt-6">
                        {{$departments->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
