<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
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
        $users = User::where('name','LIKE',"%$this->search%")
            ->orWhere('email','LIKE',"%$this->search%")
            ->orderBy('updated_at','DESC')
            ->paginate($this->perPage);
        return view('livewire.admin.users-table', compact('users'));
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
