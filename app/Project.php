<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'rate'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function timeEntries()
    {
        return $this->hasMany('App\TimeEntry');
    }

    /**
     * @param TimeEntry $time
     * @return Model
     */
    public function addTimeEntry(TimeEntry $time)
    {
        return $this->timeEntries()->save($time);
    }
}
