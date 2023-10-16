<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Url;
use Livewire\Component;

class SearchProduct extends Component
{
    
    public $query;
    public $categories;

    public function mount()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->query = '';
        $this->categories = [];
    }

    public function updatedQuery()
    {
        if ($this->query) {
            $this->categories = Product::select('categoria')->where('categoria', 'like', '%' . $this->query . '%')->distinct('categoria')->get()->toArray();
            return;
        }
        $this->categories = [];
    }

    public function render()
    {
        return view('livewire.search-product');
    }

    public function search()
    {
        return $this->redirect('search/' . $this->query);
    }
}
