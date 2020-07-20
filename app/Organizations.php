<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organizations extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'phone_numbers';

    protected $fillable = [
        'phone','name','api_key','is_default','created_at', 'updated_at'
    ];
}
