<aside>
    <button wire:click="toggleLike" class="btn btn-primary">
        @if ($liked)
            <i class="fas fa-thumbs-up text-light me-2"></i>
        @else
            <i class="far fa-thumbs-up text-light me-2"></i>
        @endif
        <span class="text-light">{{ $likesCount }}</span>
    </button>
</aside>
