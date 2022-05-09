<?php

namespace App\Http\Livewire\Admin;

use App\Models\admin\Permission;
use Livewire\Component;
use Livewire\WithPagination;

class PermissionsTable extends Component
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
        $permissions = Permission::where('name','LIKE',"%$this->search%")
            ->orderBy('updated_at','DESC')
            ->paginate($this->perPage);
        return view('livewire.admin.permissions-table', compact('permissions'));
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
