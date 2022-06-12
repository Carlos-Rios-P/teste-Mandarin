<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public const BACKLOG = 0;
    public const IN_PROGRESS = 1;
    public const WAITING_CUSTOMER_APPROVAL = 2;
    public const APPROVED = 3;

    protected $fillable = [
        'name',
        'description',
        'status',
        'file_url'
    ];

    public function tag(){

        return $this->hasMany(Tag::class);
    }
}
