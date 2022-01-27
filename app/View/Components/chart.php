<?php

namespace App\View\Components;

use Illuminate\View\Component;

class chart extends Component
{
    public $idName;
    public $datas;
    public $y_name;
    public $y_data;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($idName,$datas)
    {
        $this->idName = $idName;
        $this->datas = $datas;
        if($this->idName=="tempchart"){
            $this->y_name="溫度";
            $this->y_data="temperature";
        }else if($this->idName=="humchart"){
            $this->y_name="溼度";
            $this->y_data="humidity";
        }else if($this->idName=="Requestschart"){
            $this->y_name="Requests";
            $this->y_data="numbers";
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.chart');
    }
}
