<?php

namespace App\Observers;

use App\Models\Campaign;
use Illuminate\Support\Facades\Storage;

class CampaignObserver
{
    /**
     * Handle the Campaign "created" event.
     */
    public function created(Campaign $campaign): void
    {
        //
    }

    /**
     * Handle the Campaign "updated" event.
     */
    public function updated(Campaign $campaign): void
    {
        if ($campaign->isDirty('image')) {
            $oldImage = $campaign->getOriginal('image');

            if ($oldImage != null) {
                Storage::disk('public')->delete($oldImage);
            }
        }
    }

    /**
     * Handle the Campaign "deleted" event.
     */
    public function deleted(Campaign $campaign): void
    {
        //
    }

    /**
     * Handle the Campaign "restored" event.
     */
    public function restored(Campaign $campaign): void
    {
        //
    }

    /**
     * Handle the Campaign "force deleted" event.
     */
    public function forceDeleted(Campaign $campaign): void
    {
        if ($campaign->image != null) {
            Storage::disk('public')->delete($campaign->image);
        }
    }
}
