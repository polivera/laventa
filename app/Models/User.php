<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    public const NAME = 'name';
    public const EMAIL = 'email';
    public const PASSWORD = 'password';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUsers($take = 20)
    {
        return User::orderBy('email')->paginate($take)->onEachSide(1);
    }

    public function new($fieldArray): User
    {
        return User::create($fieldArray);
    }

    public function change($id, $fieldArray)
    {
        return User::where('id', $id)->update($fieldArray);
    }

    public function getById($id)
    {
        return User::where('id', $id)->first();
    }

    public function getByEmail($email)
    {
        return User::where(self::EMAIL, $email)->first();
    }

    public function remove($id)
    {
        return User::where('id', $id)->delete();
    }
}
