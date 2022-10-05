<?php

namespace App\Http\Livewire\Admin;

use App\Models\ContributeBook;
use Livewire\Component;
use Livewire\WithPagination;

class ContributeBooksTable extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '15']
    ];

    public $search = '';
    public $perPage = '15';

    public function render()
    {
        $books = ContributeBook::where('titulo','LIKE',"%$this->search%")
            ->orWhere('autor','LIKE',"%$this->search%")
            ->orWhere('editorial','LIKE',"%$this->search%")
            ->orWhere('isbn','LIKE',"%$this->search%")
            ->orWhere('notas','LIKE',"%$this->search%")
            ->orderBy('updated_at','DESC')
            ->paginate($this->perPage);
        return view('livewire.admin.contributebooks-table', compact('books'));
    }

    public function clear(){
        $this->search = '';
        $this->page = 1;
        $this->perPage = '15';
    }

    public function limpiar_page(){
        $this->reset('page');
    }
}
