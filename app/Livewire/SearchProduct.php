<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class SearchProduct extends Component
{
    
    public $query;
    public $categories;
    public $error;

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
            try {
                $this->error = "";
                $this->categories = [];
                $this->categories = Product::select('categoria')->where('categoria', 'like', '%' . $this->query . '%')->distinct('categoria')->get()->toArray();
            } catch (\Throwable $th) {
                $this->error = __('An error has occurred, please try again later');
            }
            return;
        }
        $this->categories = [];
    }

    public function render()
    {
        return view('livewire.search-product');
    }

    public function search($term = "")
    {
        if ($term) {
            $this->query = $term;
        }
        return $this->redirect('search/' . $this->query);
    }
}
