<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Outcomes') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                           <!-- Session Status -->
     
                      <x-auth-session-status class="mb-4" :status="session('success')" />
                      
                     <div class="flex items-center mb-2">
                      <a class="inline-flex items-center h-8 px-4 mb-2 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800" href="{{route('outcomes.create')}}">Add Outcome</a>
                     </div>
                    <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class="flex flex-col">
                             <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                 <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                                <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium  text-gray-900 font-bold  uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 font-bold uppercase tracking-wider">
                                        Description
                                    </th>
                                    {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 font-bold uppercase tracking-wider">
                                        CreatedAt
                                    </th>
                                     <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 font-bold uppercase tracking-wider">
                                        UpdatedAt
                                    </th> --}}
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 font-bold uppercase tracking-wider">
                                        Action
                                    </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    
                                    <!-- Loop --> 
                                    @foreach ($outcomes as $outcome)
                                    <tr>
                                          
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                       {{$outcome->name}}
                                    </td>
                                    {{--  <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                            Jane Cooper
                                            </div>
                                            <div class="text-sm text-gray-500">
                                            jane.cooper@example.com
                                            </div>
                                        </div>
                                        </div>
                                    </td>  --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                         {{substr(strip_tags($outcome->description), 0, 128)}}

                                         @if (strlen(strip_tags($outcome->description)) > 128) 
                                         ...
                                         @endif
                                         
                                    </td>
                                    {{--  <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Regional Paradigm Technician</div>
                                        <div class="text-sm text-gray-500">Optimization</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                        </span>
                                    </td>  --}}
                                    {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ date('M j, Y H:i', strtotime($outcome->created_at))}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                         {{ date('M j, Y H:i', strtotime($outcome->updated_at))}}
                                    </td> --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                        <a href="{{route('outcomes.show', ['outcome' => $outcome->id])}}" class="text-indigo-600 hover:text-indigo-900 mr-2">View</a>
                                        <a href="{{route('outcomes.edit', ['outcome' => $outcome->id])}}" class="text-green-600 hover:text-green-900 mr-2">Edit</a>
                                        <a href="{{route('outcomes.destroy', ['outcome' => $outcome->id])}}"class="text-red-600 hover:text-red-900">Delete</a>
                                    </td>
                                    </tr>
                                    @endforeach
                                    <!-- More people... -->
                                </tbody>
                                </table>
                           
                                </div>
                            </div>
                        </div>
                     </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>