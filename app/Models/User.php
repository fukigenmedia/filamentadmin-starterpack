<?php

namespace App\Models;

use App\Models\Traits\LogActivities;
use App\Models\Traits\UUID;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser, HasAvatar
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use UUID;
    use HasRoles;
    use LogActivities;

    protected $fillable = [
        'name',
        'email',
        'avatar',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function canAccessFilament(): bool
    {
        if (config('app.env') === 'production') {
            return str_ends_with($this->email, env('FILAMENTADMIN_EMAIL')) && $this->hasVerifiedEmail();
        }

        return true;
    }

    public function canImpersonate()
    {
        foreach ($this->getRoleNames() as $role) {
            if (in_array($role, ['super_admin', 'admin'])) {
                return true;
            }
        }

        return false;
    }

    public function canBeImpersonated()
    {
        foreach ($this->getRoleNames() as $role) {
            if (!in_array($role, ['super_admin'])) {
                return true;
            }
        }

        return false;
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar ? Storage::url($this->avatar) : null;
    }
}
