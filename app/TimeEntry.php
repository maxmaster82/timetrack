<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class TimeEntry extends Model
{
    protected $table = 'time_entries';
    
    protected $fillable = [
        'start_time',
        'end_time',
        'comment',
        'project_id',
    ];


    /**
     * @param Request $request
     * @return static
     */
    public static function fromRequest(Request $request)
    {
        $timeEntry = new static;

        $timeEntry->start_time = $request->input('start_time');

        $timeEntry->end_time = $request->input('end_time');

        $timeEntry->comment = $request->input('comment');

        return $timeEntry;

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
