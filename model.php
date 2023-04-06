<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title', 'type'];

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}

class Option extends Model
{
    protected $fillable = ['text', 'question_id'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}

class Answer extends Model
{
    protected $fillable = ['text', 'question_id'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
