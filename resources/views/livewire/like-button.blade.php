<button wire:click="toggleLike" class="btn btn-outline-primary w-100">
    <i class="fas fa-thumbs-up"></i> {{ $liked ? 'Unlike' : 'Like' }} <span>{{ $likesCount }}</span>
</button>
