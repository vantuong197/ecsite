<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
class UserCatalogue extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'publish',
        'updated_at',
        'deleted_at',
        'created_at'
    ];
    protected $table = 'user_catalogue';

    public function users(){
        return $this->hasMany(User::class, 'user_catalogue_id', 'id');
    }
}
