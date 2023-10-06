<?php

namespace App\Livewire;

use Livewire\Component;

class SearchProduct extends Component
{

    public $query;
    public $products;

    public function mount()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->query = '';
        $this->products = [];
    }

    public function updatedQuery()
    {
        $this->products = array_filter(['1', '2', '3', '4', '5'], function ($element) {
            return $element === $this->query;
        });
    }

    public function render()
    {
        return view('livewire.search-product');
    }
}
