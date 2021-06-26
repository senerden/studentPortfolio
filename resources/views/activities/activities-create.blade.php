<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Activitiy') }}
        </h2>
    </x-slot>
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

    @endsection
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                                
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('activities.store') }}">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" autofocus />
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')" />

                            <x-text-area name="description" id="mytextarea" rows="8"> </x-text-area>
                            {{--  <x-input id="description" class="block mt-1 w-full" type="text" rows="4" name="description"  required />  --}}
                        </div>

                         <!-- startDate -->
                        <div class="grid grid-cols-3 gap-4">
                        <div>
                            <x-label for="startDate" :value="__('StartDate')" class="mt-4"/>

                            <x-input id="startDate" class="block mt-1 w-full" type="date" name="startDate" autofocus />
                        </div>
                        <div>
                            <x-label for="endDate" :value="__('EndDate')" class="mt-4" />

                            <x-input id="endDate" class="block mt-1 w-full" type="date" name="endDate" autofocus />
                        </div>
                        </div>        
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Create') }}
                            </x-button>
                        </div>
                    </form>                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
