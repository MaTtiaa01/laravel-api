<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Technology;
use App\Models\Type;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'language', 'cover_img', 'type_id'];

    public function type(): BelongsTo
    {
        return $this->BelongsTo(Type::class);
    }

    /**
     * The tags that belong to the Technology
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(Technology::class);
    }
}
