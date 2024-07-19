<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        "client_id",
        "name",
        "ip_address",
        "is_online",
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
