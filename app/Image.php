<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Image
 *
 * @property-read \App\Event $event
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image query()
 * @mixin \Eloquent
 */
class Image extends Model
{
    public function event(){
        return $this->belongsTo('App\Event');
    }

    protected $fillable = [
        'event_id',
        'image'
    ];


}
