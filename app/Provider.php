<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    /*
     * constants for status of Providers Job status
     */

    public const free = 0;
    public const busy = 1;
    public const waiting = 2;
    public const signedout = 3;

    /*
     * constants for status of Providers Admin Approval
     */

    public const approve = 0;
    public const unApprove = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id',
        'user_id',
        'license_img',
        'radius',
        'approval_status',
        'job_status',
        'withdraw_status',
        'total_earning',
        'weekly_earning',
        'overall_rating',
        'queued_job',
        'job_count'
    ];

    public function userDetails()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
