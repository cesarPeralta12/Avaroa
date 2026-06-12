<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Withdrawal extends Model
{
    use HasFactory;

    protected $table = 'withdrawals';

    protected $fillable = [
        'user_id',
        'challenge_id',
        'amount',
        'charge',
        'final_amount',
        'sent_amount',
        'bank_name',
        'account_holder',
        'account_number',
        'ifsc_code',
        'trx',
        'utr',
        'status',
        'admin_feedback',
        'processed_at',

        // Added these fields (important!)
        'approved_by',
        'approved_at',
        'rejected_by',
        'rejected_at',
        'processed_by',
    ];

    protected $casts = [
        'amount'        => 'decimal:2',
        'charge'        => 'decimal:2',
        'final_amount'  => 'decimal:2',
        'sent_amount'   => 'decimal:2',
        'status'        => 'integer',
        'processed_at'  => 'datetime',
        'approved_at'   => 'datetime',
        'rejected_at'   => 'datetime',
    ];

    // ───────────── STATUS CONSTANTS ─────────────
    public const STATUS_PENDING   = 0;
    public const STATUS_APPROVED  = 1;
    public const STATUS_REJECTED  = 2;
    public const STATUS_PROCESSED = 3;

    // ───────────── RELATIONSHIPS ─────────────

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function challenge(): BelongsTo
    {
        return $this->belongsTo(Challenge::class);
    }

    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function rejectedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'rejected_by');
    }

    public function processedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'processed_by');
    }

    // ───────────── STATUS HELPERS ─────────────

    public function isPending(): bool
    {
        return $this->status === self::STATUS_PENDING;
    }

    public function isApproved(): bool
    {
        return $this->status === self::STATUS_APPROVED;
    }

    public function isRejected(): bool
    {
        return $this->status === self::STATUS_REJECTED;
    }

    public function isProcessed(): bool
    {
        return $this->status === self::STATUS_PROCESSED;
    }

    // ───────────── ACCESSORS ─────────────

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            self::STATUS_PENDING   => 'Pending',
            self::STATUS_APPROVED  => 'Approved',
            self::STATUS_REJECTED  => 'Rejected',
            self::STATUS_PROCESSED => 'Processed',
            default                => 'Unknown',
        };
    }

    public function getStatusBadgeAttribute(): string
    {
        return match ($this->status) {
            self::STATUS_PENDING   => '<span class="badge bg-warning">Pending</span>',
            self::STATUS_APPROVED  => '<span class="badge bg-success">Approved</span>',
            self::STATUS_REJECTED  => '<span class="badge bg-danger">Rejected</span>',
            self::STATUS_PROCESSED => '<span class="badge bg-info">Processed</span>',
            default                => '<span class="badge bg-secondary">Unknown</span>',
        };
    }

    public function getChallengeNameAttribute(): string
    {
        return $this->challenge?->name ?? 'N/A';
    }

    // Optional: if you often need this in JSON responses
    // protected $appends = ['status_label', 'status_badge', 'challenge_name'];

    // ───────────── SCOPES (very useful in controllers) ─────────────

    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    public function scopeApproved($query)
    {
        return $query->where('status', self::STATUS_APPROVED);
    }

    public function scopeProcessed($query)
    {
        return $query->where('status', self::STATUS_PROCESSED);
    }

    public function scopeRejected($query)
    {
        return $query->where('status', self::STATUS_REJECTED);
    }
}
