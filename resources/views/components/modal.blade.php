<div {{ $attributes->merge(['class' => 'absolute inset-0 w-full h-full bg-opacity-25 bg-black flex justify-center items-center']) }}>
    <div class="bg-white md:max-w-xl rounded shadow-lg">
        <div class="px-6 py-4 border-b flex justify-between items-center">
            <div>{{ $title }}</div>
            <button @click="open = false">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="#64748b" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="p-6">
            {{ $slot }}

        </div>
    </div>

</div>