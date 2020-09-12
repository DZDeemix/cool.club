<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int user_id
 */
class UserMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'message_content', 'user_id',
    ];
}
