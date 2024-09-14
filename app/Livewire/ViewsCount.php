<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;

class ViewsCount extends Component
{
    public $model;
    public $viewsCount;

    public function mount($model)
    {
        $this->model = $model;

        // call method increment views
        $this->incrementViews();

        // update views count
        $this->viewsCount = $this->model->views;
    }

    public function incrementViews()
    {
        $this->model->increment('views');
    }

    public function render()
    {
        return view('livewire.views-count', [
            'viewsCount' => $this->viewsCount,
        ]);
    }
}
