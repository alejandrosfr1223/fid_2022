<?php

namespace App\Http\Livewire\Admin;

use App\Models\Curso;
use Livewire\Component;
use Livewire\WithPagination;

class CursosTable extends Component
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
        $cursos = Curso::where('titulo','LIKE',"%$this->search%")
            ->orWhere('ponente','LIKE',"%$this->search%")
            ->orWhere('notas','LIKE',"%$this->search%")
            ->orderBy('updated_at','DESC')
            ->paginate($this->perPage);
        return view('livewire.admin.cursos-table', compact('cursos'));
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
