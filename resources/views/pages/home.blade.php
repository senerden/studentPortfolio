<x-home-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Reflections') }}
        </h2>
    </x-slot>

        <section class="text-gray-600 body-font overflow-hidden">
        
        @foreach($posts as $post)

        <div class="container px-5 py-24 mx-auto">
            <div class="-my-8 divide-y-2 divide-gray-100">
            <div class="py-8 flex flex-wrap md:flex-nowrap">
                <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                <span class="font-semibold title-font text-blue-700">Activity:</span>
                <span class="font-semibold title-font text-gray-700">{{$post->activity->name}}</span> <br>
                <span class="font-semibold title-font text-blue-700">Date:</span>
                <span class="mt-1 text-gray-500 text-sm">{{$post->created_at->format('d-m-Y')}}</span> <br>
                <span class="font-semibold title-font text-blue-700">Outcomes:</span>
                  @foreach ($post->outcomes as $outcome)
                       <span class="mt-1 text-gray-500 text-sm">{{$outcome->name}}</span>
                  @endforeach   
                </div>
                <div class="md:flex-grow">
                <h2 class="text-2xl font-medium text-gray-900 title-font">{{$post->title}}</h2>

                <div class="md:p-2 p-1 w-full">
                <img alt="gallery" class="w-full h-full object-cover object-center block" src="https://dummyimage.com/600x360">
                </div>
    
                <p class="leading-relaxed">{{strip_tags($post->description)}}</p>
                <a class="text-blue-500 inline-flex items-center">Learn More
                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                    <path d="M12 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
            </div>
        </div>
        </div>
        @endforeach
        </section>
</x-home-layout>