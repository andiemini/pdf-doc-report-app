<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('All Patient Reports') }}
    </h2>
</x-slot>
@section('content')
    <div class="container my-auto mx-auto py-12">
        @if(count($patients)>0)
            <div class="flex flex-col max-w-7xl mx-auto">
                <div class="overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden ">
                            <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                                <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Report Title
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Patient Name
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Date of Birth
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Gender
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Day of control
                                    </th>
                                    <th scope="col" class="p-4">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                    <th scope="col" class="p-4">
                                        <span class="sr-only">Delete</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @foreach($patients as $patient)
                                    <tr  class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <a href="{{route('patients.show', $patient->id)}}" class="text-blue-600 dark:text-blue-500 hover:underline">
                                                {{$patient->title}}
                                            </a>
                                        </td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <a href="{{route('patients.show', $patient->id)}}" class="text-blue-600 dark:text-blue-500 hover:underline">
                                                {{$patient->name}}
                                            </a>
                                        </td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <a href="{{route('patients.show', $patient->id)}}" class="text-blue-600 dark:text-blue-500 hover:underline">
                                                {{$patient->dateofbirth}}
                                            </a>
                                        </td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <a href="{{route('patients.show', $patient->id)}}" class="text-blue-600 dark:text-blue-500 hover:underline">
                                                {{$patient->gender}}
                                            </a>
                                        </td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <a href="{{route('patients.show', $patient->id)}}" class="text-blue-600 dark:text-blue-500 hover:underline">
                                                {{$patient->dayofcontrol}}
                                            </a>
                                        </td>
                                        <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                            <a href="{{route('patients.edit', $patient->id)}}" class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        </td>
                                        <td>
                                            {!!Form::open(['url' => ['patients.destroy', $patient->id], 'method' => 'POST', 'class' => 'py-4 px-6 text-sm font-medium text-right whitespace-nowrap'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'text-red-600 dark:text-red-500 hover:underline'])}}
                                            {!!Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @else
                    <p>You have no posts</p>
                @endif
            </div>
@endsection
</x-app-layout>
