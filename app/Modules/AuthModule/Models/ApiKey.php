<?php

namespace App\Modules\AuthModule\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\User;

class ApiKey extends Model
{
    protected $fillable = ['user_id', 'key', 'active'];

    public static function generate(User $user): self
    {
        return self::create([
            'user_id' => $user->id,
            'key' => bin2hex(random_bytes(32)), // Str::random(40),
            'active' => true,
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
