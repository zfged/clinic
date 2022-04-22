<?php


namespace App\Models;

use App\Models\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaborator extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'birth',
        'bio'
    ];

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
