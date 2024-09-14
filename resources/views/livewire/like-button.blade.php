<aside>
    <button wire:click="toggleLike" class="btn btn-primary">
        @if ($liked)
            <i class="fas fa-thumbs-up "></i>
        @else
            <i class="far fa-thumbs-up"></i>
        @endif
        <span>{{ $likesCount }}</span>
    </button>
</aside>
