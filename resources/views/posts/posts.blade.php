{{--  @foreach ($posts as $post)
    <li>{{$post->title}}</li>
    <li>{{$post->activity->name}}</li>

    @foreach ($post->outcomes as $outcome)

      <li>{{$outcome->name}}</li>
        
    @endforeach

@endforeach  --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Posts') }}
        </h2>
    </x-slot>  
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                       <!-- Session Status -->
     
                      <x-auth-session-status class="mb-4" :status="session('status')" />
                      
                     <div class="flex items-center mb-2">
                      <a class="inline-flex items-center h-8 px-4 mb-2 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800" href="{{route('posts.create')}}">Add Post</a>
                     </div>
                    <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class="flex flex-col">
                             <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                 <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                                <table class="min-w-full divide-y divide-gray-400 table-auto">
                                
                                    <thead class="bg-gray-50">
                                    <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium  text-gray-900 font-bold  uppercase tracking-wider">
                                       Title
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 font-bold uppercase tracking-wider">
                                        Description
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 font-bold uppercase tracking-wider">
                                        Created at
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 font-bold uppercase tracking-wider">
                                        Activity
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 font-bold uppercase tracking-wider">
                                        Outcomes
                                    </th>
                                  
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 font-bold uppercase tracking-wider">
                                        Action
                                    </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    
                                    <!-- Loop --> 
                                    @foreach ($posts as $post)
                                    <tr>
                                          
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                       {{$post->title}}
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
                                         {{substr(strip_tags($post->description), 0, 128)}}

                                         @if (strlen(strip_tags($post->description)) > 128) 
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
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                         {{$post->created_at->format('d-m-Y')}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                         {{$post->activity->name}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                         
                                        @foreach ($post->outcomes as $outcome)
                                             <li>{{$outcome->name}}</li>   
                                        @endforeach


                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                        <a href="{{route('posts.show', ['post' => $post->id])}}" class="text-indigo-600 hover:text-indigo-900 mr-2">View</a>
                                        <a href="{{route('posts.edit', ['post' => $post->id])}}" class="text-green-600 hover:text-green-900 mr-2">Edit</a>
                                        <a href="{{route('posts.destroy', ['post' => $post->id])}}"class="text-red-600 hover:text-red-900">Delete</a>
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
