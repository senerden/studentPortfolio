<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Post') }}
        </h2>
    </x-slot>
    @section('page_styles')
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    @endsection
  
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                                
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('posts.store') }}">
                        @csrf
                           <!-- Choose Activity -->                    
                        <div class = "mb-4">
                            <x-label for="activities" :value="__('Select Activity')" />

                                <select id="activities" name="activity_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                                    <option selected disabled class="text-red-500">Select Activity</option>

                                    @foreach ($activities as $activity)

                                    <option value="{{$activity->id}}">{{$activity->name}}</option>
                                        
                                    @endforeach
                                
                                </select>
                        </div>

                        <!-- Name -->
                        <div>
                            <x-label for="title" :value="__('Post Title')" />

                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" autofocus />
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')" />

                            <x-text-area name="description" id="mytextarea" rows="8"> </x-text-area>
                            {{--  <x-input id="description" class="block mt-1 w-full" type="text" rows="4" name="description"  required />  --}}
                        </div> 
                        
                        <div class="rounded-sm border-solid py-3 px-6 m-4 border-solid">
                        <div class="mt-4 text-indigo-900">Select Outcomes</div>

                        <select class="js-example-basic-multiple" style="width: 75%" name="outcomes[]" multiple="multiple">
                            @foreach ($outcomes as $outcome)
                               <option value="{{$outcome->id}}">{{$outcome->name}}</option>    
                            @endforeach       
                        </select>

                        {{--  <div class="grid grid-cols-6 gap-4">
                            @foreach ($outcomes as $outcome)

                        <div>
                            <x-label for="{{$outcome->id}}" value="{{$outcome->name}}" class="mt-4"/>
                            <x-input id="{{$outcome->id}}" class="block mt-1" type="checkbox" name="outcome_id" value="{{$outcome->id}}" autofocus />
                        </div>                    
                            @endforeach
                     
                        </div>    --}}
                        </div>             
                        </div>          
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Post') }}
                            </x-button>
                        </div>
                    </form>                   
                </div>
            </div>
        </div>
    </div>
        @section('page-scripts')

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <!--tinymce-->
        <script src="https://cdn.tiny.cloud/1/mfu67e4n6j1q0r9sjrfaffxoye54z8zxjiod4lr8jrdcgi2t/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
        tinymce.init({
                selector: 'textarea',
                plugins: 'link',
                    
            });
        </script>
                <style>
                    input:checked + svg {
                        display: block;
                    }
                </style>
                
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
                    $(document).ready(function() {
                        $('.js-example-basic-multiple').select2();
                    });
        </script>

         @endsection
</x-app-layout>
