<div>
    <button {{ $attributes ->merge(['class' => 'bg-blue-300 text-white rounded p-2 hover:bg-blue-600 h-[50px]'])}}>
        {{ $slot }}
        {{ $file }}
    </button>
</div>