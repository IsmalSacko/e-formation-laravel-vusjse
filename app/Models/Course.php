<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\Authorizable;

class Course extends Model
{
    use HasFactory, Authorizable;

    protected $fillable = ['title', 'description'];


    protected $appends = ['update'];

    /**
     * Cette méthode sera declenchée au moment de l'enregistrment d'une fomation dans le controller
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($course) {
            $course->user_id = auth()->id();
        });
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * Get the value of update
     */
    public function getUpdateAttribute()
    {
        return $this->can('update_course', $this);
    }
}
