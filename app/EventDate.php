<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\EventDate
 *
 * @property int $id
 * @property int $event_id
 * @property string $start
 * @property string $end
 * @property int $free_places
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Event $event
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventDate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventDate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventDate query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventDate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventDate whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventDate whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventDate whereFreePlaces($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventDate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventDate whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventDate whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Ticket[] $tickets
 * @property-read int|null $tickets_count
 */

class EventDate extends Model
{
    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function tickets(){
        return $this->hasMany('App\Ticket');
    }
}
