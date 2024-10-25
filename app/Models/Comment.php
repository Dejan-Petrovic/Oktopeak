<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'text', 'status'];

    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';
}
