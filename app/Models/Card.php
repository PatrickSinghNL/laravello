<?php

namespace App\Models;

use App\Models\User;
use App\Models\CardList;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Card extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'order', 'list_id', 'order_id'];

    public function list(): BelongsTo
    {
        return $this->belongsTo(CardList::class, 'list_id');
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
