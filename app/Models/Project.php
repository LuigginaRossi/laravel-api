<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable= ["name", "description", "cover_img", "github_link", "completed", "type_id"];

    //un projetto corrisponde a una sola tipologia
    public function type(){
        return $this->belongsTo(Type::class);
    }
    
    //many to many:
    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }
}
