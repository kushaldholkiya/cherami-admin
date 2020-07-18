<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Influencers extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'influencers';

    protected $fillable = [
        'phone','name','display_name','display_picture','status','user_id','created_at', 'updated_at'
    ];
}
