@props(['errorName'])
@error($errorName)
    <p class="text-red-500 text-sm">
        {{$message}}
    </p>
@enderror
