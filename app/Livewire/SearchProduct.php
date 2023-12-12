<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Rule;
use Livewire\Component;

class SearchProduct extends Component
{
    #[Rule('required')]
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
                $this->categories = Product::where(function ($q) {
                    $q->where('categoria', 'like', '%' . $this->query . '%')
                        ->orWhere('descripcion', 'like', '%' . $this->query . '%');
                })
                    ->distinct('categoria')
                    ->get(['categoria', 'descripcion'])
                    ->toArray();
                $this->categories = array_map(function ($object) {
                    $object = array_merge($object, ['htmlTag' => $object]);
                    $object['htmlTag'] =  array_map(function ($innerObject) {
                        $innerObject = preg_replace('(' . $this->query . ')', '<mark>' . $this->query . '</mark>', $innerObject);
                        $innerObject = preg_replace('(' . strtoupper($this->query) . ')', '<mark>' . strtoupper($this->query) . '</mark>', $innerObject);
                        return $innerObject;
                    }, $object['htmlTag']);
                    return $object;
                }, $this->categories);
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

    public function search($term = '')
    {
        $validated = $this->validate([
            'query' => 'required'
        ]);
        if ($term) {
            return $this->redirect('search/' . $term);
        } else if ($this->query) {
            return $this->redirect('search/' . $this->query);
        }
    }
}
