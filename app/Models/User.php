<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'level',
        'hp',
        'xp'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function armas()
    {
        return $this->hasMany(Arma::class);
    }

    public function itens()
    {
        return $this->hasMany(Item::class);
    }

    public function locaisVisitados()
    {
        return $this->hasMany(LocalVisitado::class);
    }

    public function npcsInteragidos()
    {
        return $this->hasMany(NpcInteragido::class);
    }

    public function quests()
    {
        return $this->hasMany(Quest::class);
    }
}
