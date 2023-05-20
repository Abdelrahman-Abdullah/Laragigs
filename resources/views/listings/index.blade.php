

<x-layout>
{{--    {{dd($listings)}}--}}
    <!-- Hero -->
    <x-hero/>

    <!-- Search -->
    <x-search/>
    <div
        class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"
    >
        <!-- Items -->
        @foreach($listings as $listing)
            <x-listing :listing="$listing" />
        @endforeach

    </div>
        <div class="mt-6 px-4">
                {{$listings->links()}}
        </div>

</x-layout>

