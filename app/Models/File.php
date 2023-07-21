<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'file',
        'folder_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function getFileAttribute($value)
    {
        return $value ? url(Storage::url($value)) : null;
    }

    public function folder(): BelongsTo
    {
        return $this->belongsTo(Folder::class);
    }
}
