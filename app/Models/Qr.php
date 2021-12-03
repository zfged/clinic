<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qr extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = 'qr_question';
    protected $fillable = [
        'question',
        'options',
        'answer',
        'isScanQr',
        'isReplied'
    ];
}
