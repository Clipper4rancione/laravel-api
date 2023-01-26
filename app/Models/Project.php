<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'client_name', 'slug', 'cover_image', 'cover_image_original_name', 'summary'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }

    public static function generateSlug($string)
    {
        $slug = Str::slug($string, '-');
        /*
            - salvare lo slug originale
            - controllare se esiste
            - generarne uno con in aggiunta un contataore
            -- se esiste generarne un'altro e così via fino a che se ne trova uno non esistente
        */
        $original_slug = $slug;
        $c = 1;
        $project_exists = Project::where('slug', $slug)->first();
        while ($project_exists) {
            $slug = $original_slug . '-' . $c++;
            $project_exists = Project::where('slug', $slug)->first();
        }
        return $slug;
    }
}
