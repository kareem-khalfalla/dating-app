<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
    
    public function recipient(): BelongsTo
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }
}