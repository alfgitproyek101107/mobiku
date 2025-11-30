<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'newsletter',
        'privacy_agreed',
        'status',
        'replied_at',
        'admin_notes',
    ];

    protected $casts = [
        'newsletter' => 'boolean',
        'privacy_agreed' => 'boolean',
        'replied_at' => 'datetime',
    ];

    // Scopes
    public function scopeUnread($query)
    {
        return $query->where('status', 'unread');
    }

    public function scopeRead($query)
    {
        return $query->where('status', 'read');
    }

    public function scopeReplied($query)
    {
        return $query->where('status', 'replied');
    }

    public function scopeArchived($query)
    {
        return $query->where('status', 'archived');
    }

    // Accessors
    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'unread' => 'red',
            'read' => 'yellow',
            'replied' => 'green',
            'archived' => 'gray',
            default => 'gray',
        };
    }

    public function getStatusIconAttribute()
    {
        return match($this->status) {
            'unread' => 'envelope',
            'read' => 'envelope-open',
            'replied' => 'reply',
            'archived' => 'archive',
            default => 'envelope',
        };
    }
}
