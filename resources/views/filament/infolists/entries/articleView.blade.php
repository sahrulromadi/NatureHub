<div class="max-w-4xl mx-auto p-6 rounded-lg shadow-md bg-gray-800">
    <div class="text-center text-4xl font-bold mb-5 text-white">
        {{ $getRecord()->title }}
    </div>

    <div class="flex items-center justify-between text-white" style="margin-top: 2rem;">
        <div class="flex items-center space-x-3">
            <img src="{{ $getRecord()->author->image ? asset('storage/' . $getRecord()->author->image) : asset('img/defaultAva.jpeg') }}"
                alt="Author Avatar" class="w-10 h-10 rounded-full">
            <div class="text-sm" style="margin-left: 1rem;">
                <p class="font-semibold">{{ $getRecord()->author->name }}</p>
            </div>
        </div>
        <div class="text-sm">
            <p>{{ $getRecord()->created_at->format('F j, Y') }}</p>
        </div>
    </div>


    <div class="prose max-w-none text-white" style="margin-top: 2rem;">
        {!! $getRecord()->body !!}
    </div>
</div>
