<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuRights extends Model
{
    use HasFactory;
    protected $table='menu_rights';
    protected $guarded= [];
}
