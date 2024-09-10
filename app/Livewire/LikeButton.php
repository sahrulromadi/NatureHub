<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Request;

class LikeButton extends Component
{
    public $model;
    public $liked;

    protected function getDeviceId()
    {
        // get device id from cookie
        return Request::cookie('device_id'); 
    }

    public function mount($model)
    {
        $this->model = $model;
        $device_id = $this->getDeviceId();
        $this->liked = $this->model->likes()->where('device_id', $device_id)->exists();
    }

    public function toggleLike()
    {
        $device_id = $this->getDeviceId();

        if (!$device_id) {
            return;
        }

        if ($this->liked) {
            $this->model->likes()->where('device_id', $device_id)->delete();
        } else {
            $this->model->likes()->create([
                'device_id' => $device_id,
            ]);
        }

        $this->liked = !$this->liked;
        $this->model->refresh();
    }

    public function render()
    {
        return view('livewire.like-button', [
            'likesCount' => $this->model->likes()->count(),
        ]);
    }
}
