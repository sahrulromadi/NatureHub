<div class="max-w-4xl mx-auto p-6 rounded-lg shadow-md bg-gray-800">
    <div class="text-center text-4xl font-bold mb-5 text-white">
        {{ $getRecord()->name }}
    </div>

    <div class="flex items-center justify-between text-white" style="margin-top: 2rem;">
        <div class="text-sm ml-auto">
            <p>{{ $getRecord()->created_at->format('F j, Y') }}</p>
        </div>
    </div>

    <div class="prose max-w-none text-white" style="margin-top: 2rem;">
        {!! $getRecord()->content !!}
    </div>
</div>
