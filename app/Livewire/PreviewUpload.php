<?php

namespace App\Livewire;

use App\Imports\ProductsImport;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class PreviewUpload extends Component
{
    use WithFileUploads;

    public $file = '';
    public $excelArray = [];

    public function render()
    {
        return view('livewire.preview-upload');
    }

    public function updatedFile()
    {
        $this->excelArray = (new ProductsImport)->toArray($this->file);
        $this->excelArray = $this->excelArray[0];
    }
}
