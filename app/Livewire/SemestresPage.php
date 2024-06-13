<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Semestre;

class SemestresPage extends Component
{
    /**
     * @var array
     */
    public $semestres;

    public function mount(){
        $this->semestres = Semestre::all();
    }
    
    public function render()
    {
        return view('livewire.semestres-page');
    }
}
