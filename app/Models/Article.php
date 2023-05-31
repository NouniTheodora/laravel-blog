<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // 1rst way: By using the fillable property we allow mass attribute assignment for this model.
    // For example we have an update endpoint for the user's information - in that way we ensure
    // that even if more properties are passed to this endpoint, the only ones that will be updated
    // will be ONLY the attributes that are included in the $fillable variable.
    // protected $fillable = [
    //     'title',
    //     'excerpt',
    //     'body'
    // ];

    // 2nd way: Everything is fillable, except whatever is included in the $guarded.
    protected $guarded = [];

    // 3rd way: Skip it entirely - avoid using arrays that come from forms to functions like create()
    // or update()

    public function category() // I can access it as a property
    {
        // Relationships: hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author() // If I name the function like that, it means that the foreign key is author_id
    {
        return $this->belongsTo(User::class, 'user_id'); // user_id -> the foreign key
    }

    public function scopeFilter(
        $query,
        array $filters
    ): void {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%')
        );

        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query
                ->whereHas('category', fn($query) =>
                    $query->where('slug', $category)
                )
        );
    }
}
