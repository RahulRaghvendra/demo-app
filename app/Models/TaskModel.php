<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    use HasFactory;
    protected $table = 'task';
    protected $guarded=[];

    public function priorityBadge()
{
    $priorities = [
        3 => ['label' => 'Low', 'class' => 'badge bg-success'],
        2 => ['label' => 'Medium', 'class' => 'badge bg-warning text-dark'],
        1 => ['label' => 'High', 'class' => 'badge bg-danger'],
    ];

    $priority = $this->priority ?? 3; 
    $badge = $priorities[$priority] ?? $priorities[3];

    return "<span class=\"{$badge['class']}\">{$badge['label']}</span>";
}
public function statusBadge()
{
    $statuses = [
        1 => ['label' => 'Pending', 'class' => 'badge bg-warning text-dark'],
        2 => ['label' => 'Completed', 'class' => 'badge bg-success'],
    ];

    $status = $this->status ?? 1; // Default to Pending
    $badge = $statuses[$status] ?? $statuses[1];

    return "<span class=\"{$badge['class']}\">{$badge['label']}</span>";
}
}
