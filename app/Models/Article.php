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
    // protected $guarded = [
    //     'id'
    // ];

    // 3rd way: Skip it entirely - avoid using arrays that come from forms to functions like create()
    // or update()
}
