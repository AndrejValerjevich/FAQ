<?php

namespace FAQ;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'theme_id', 'text', 'date', 'answer', 'asking_user_name', 'asking_user_email', 'status',
    ];

}
