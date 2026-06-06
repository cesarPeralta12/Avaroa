<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailTemplate extends Model
{
    use HasFactory;
    protected $table = 'mail_templates';

    public $timestamps = false;

    private const DEFAULT_TEMPLATES = [
        'password_reset',
        'email_verification',
    ];

    protected $fillable = [
        'alias',
        'name',
        'subject',
        'body',
        'status',
        'shortcodes',
    ];

    protected $casts = [
        'shortcodes' => 'array',
        'status' => 'boolean',
    ];

    public function isDefault()
    {
        return $this->alias && in_array(strtolower($this->alias), self::DEFAULT_TEMPLATES);
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeByAlias($query, $alias)
    {
        return $query->where('alias', $alias);
    }

    public function parseShortcodes(array $data)
    {
        $body = $this->body;
        foreach ($data as $key => $value) {
            $body = str_replace("{{ $key }}", $value, $body);
        }
        return $body;
    }
}
