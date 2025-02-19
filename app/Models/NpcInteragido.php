<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NpcInteragido extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'nome_npc', 'data_interacao'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
