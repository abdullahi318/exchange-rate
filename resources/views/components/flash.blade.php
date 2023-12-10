@props(['message'])

@if ($message)
    <div {{ $attributes->merge(['class' => 'font-medium text-lg text-white m-2 p-3 bg-green-500 rounded-lg dark:text-green-400']) }}>
        {{ $message }}
    </div>
@endif
