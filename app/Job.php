<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = "system_jobs";
    /*
    * constants for status of job_status
    */

    public const complete = 0;
    public const leave_for_job = 1;
    public const pending = 2;
    public const cancel = 3;
    public const accept = 4;
    public const working = 5;
    public const timeOut = 6; // when in certain time no any provider accept the job
    public const arrived = 7;
    public const requestApproval = 8;

    /*
    * constants for status of customer_approval
    */

    public const customer_approved = 1;
    public const customer_not_complete = 0;

    /**
     * Constants for auto dispatch system
     */

    public const auto_dispatched = 1;
    public const auto_dispatched_not = 0;

    /**
     * Constants for auto admin notify system
     */
    public const admin_notified = 1;
    public const admin_not_notified = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id',
        'service_id',
        'service_name',
        'service_price',
        'provider_id',
        'customer_id',
        'location_address',
        'current_situation_img',
        'after_work_img',
        'customer_approval',
        'job_status',
        'lat',
        'lng',
        'job_schedual_time',
        'edit_job',
        'feedback',
        'driver_rating',
        'customer_rating',
        'auto_dispatch'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    /**
     * Get the user that owns the request.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    /**
     * Get the provider that accept the request.
     */
    public function provider()
    {
        return $this->belongsTo(User::class, 'provider_id', 'id');
    }

    /**
     * Get the service details.
     */
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

}
