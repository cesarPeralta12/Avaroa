<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// ✅ Relationship imports (fixes Intelephense)
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'uid',
        'name',
        'username',
        'email',
        'password',
        'custom_password',
        'phone',
        'mobile_number',

        'account_balance',
        'account_type',
        'status',
        'is_active',
        'is_online',
        'last_seen',
        'ip_address',

        'membershipType',
        'membership_status',
        'membership_start_date',
        'membership_end_date',
        'renewal_due_date',
        'payment_status',
        'membership_card_number',
        'guest_access_count',

        'is_affiliate',
        'referral_code',
        'affiliate_earnings',
        'commission_rate',

        'is_system',
        'is_super_admin',
        'role',
        'permissions',
        'panel_permissions',

        'whatsapp_number',
        'about',
        'level',
        'refer',
        'refer_date',

        'facebook',
        'instagram',
        'linkedin',
        'twitter',
        'facebook_id',
        'google_id',
        'last_whatsapp_message_at',
        'country',
        'city',
        'address',
        'birth_date',
        'language',
        'id_number',
        'last_activity',
        'profile_photo',
        'player_id',
        'fcm_token',
        'is_subscribed',

        'email_verified_at',
    ];

    /**
     * Hidden attributes
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Attribute casting
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birth_date'        => 'date',
        'last_seen'         => 'datetime',
        'is_active'         => 'boolean',
        'is_online'         => 'boolean',
        'is_affiliate'      => 'boolean',
        'is_system'         => 'boolean',
        'is_super_admin'     => 'boolean',
        'is_subscribed'      => 'boolean',
        'panel_permissions'  => 'array',
    ];

    // Default panel access for assistants when no explicit permissions are set
    public const DEFAULT_ASSISTANT_PANELS = [
        'conductores' => true,
        'viajes'      => true,
        'billeteras'  => true,
        'clientes'    => false,
        'pod'         => false,
        'whatsapp'    => false,
    ];

    public function canAccessPanel(string $panel): bool
    {
        if ($this->is_super_admin) return true;
        $perms = $this->panel_permissions ?? self::DEFAULT_ASSISTANT_PANELS;
        return (bool) ($perms[$panel] ?? false);
    }

   public function trips()
    {
        return $this->hasMany(Trip::class, 'customer_id');
    }
public function driver(): HasOne
{
    return $this->hasOne(Driver::class);
}
    public function driverProfile()
    {
        return $this->hasOne(Driver::class);
    }

    public function conversationSessions()
    {
        return $this->hasMany(ConversationSession::class, 'customer_id');
    }



    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'driver_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'user_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'user_id');
    }

    public function auditLogs()
    {
        return $this->hasMany(AuditLog::class, 'user_id');
    }
    // ────────────────────────────────────────────────────────────────
    // FINANCIALS
    // ────────────────────────────────────────────────────────────────

    public function balance(): HasOne
    {
        return $this->hasOne(UserBalance::class);
    }

    public function deposits(): HasMany
    {
        return $this->hasMany(Deposit::class);
    }

    public function withdrawals(): HasMany
    {
        return $this->hasMany(Withdrawal::class);
    }





    public function getWalletBalanceAttribute(): float
    {
        return $this->balance?->balance ?? 0.00;
    }

    public function getAvailableBalanceAttribute(): float
    {
        return $this->balance?->available_balance ?? 0.00;
    }



    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    // ────────────────────────────────────────────────────────────────
    // MODEL EVENTS
    // ────────────────────────────────────────────────────────────────

    protected static function booted()
    {
        static::creating(function ($user) {
            if ($user->is_affiliate && empty($user->referral_code)) {
                $user->referral_code = strtoupper(
                    substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 10)
                );
            }
        });
    }
}
