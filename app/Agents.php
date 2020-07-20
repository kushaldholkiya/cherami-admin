<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agents extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'agents';

    protected $fillable = [
        'name','email','password','role','dark_mode','remember_token','display_picture','device_token','user_token','last_log_in','last_log_out','created_at', 'updated_at'
    ];
}
