<?php 

namespace App\View\Components;

use Illuminate\View\Component;

class Permission extends Component
{
    public $value;
    public $or;

    public function __construct($value, $or = false)
    {
        $this->value = $value;
        $this->or = $or;
    }

    public function render()
    {
        return view('components.permission');
    }
}