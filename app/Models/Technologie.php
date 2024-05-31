<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Technologie extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function projects(){
      return $this->BelongsToMany(Project::class);
    }
}
