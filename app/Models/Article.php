<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


class Article extends Model
{
    use HasFactory;
    protected  $guarded = false;


    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        if( auth()->check() && !auth()->user()->is_admin){
            static::addGlobalScope('user', function (Builder $builder) {
                $builder->where('user_id', auth()->user()->id);
            });
        }

    }
}
