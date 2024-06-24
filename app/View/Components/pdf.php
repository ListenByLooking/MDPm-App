<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class pdf extends Component
{
    public $data;
    public $form;
    /**
     * Create a new component instance.
     */
    public function __construct($id)
    {
        $component  = DB::table('components')->select('form_name')->where('user_id',Auth::user()->id)->where('id',$id)->first();
        $this->form = $component->form_name;
        if($this->form == 'documentation')
            $this->data = DB::table($this->form)->where('component_id',$id)->get(); 
        else
            $this->data = DB::table($this->form)->where('component_id',$id)->first(); 

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $data = $this->data;
        $form = $this->form;
        return view('components.pdf',compact('data','form'));
    }
}
