<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class ThreadReply extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'thread_id',
        'body',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }
}
