<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status',
    ];

    const STATUS_TODO = 0;
    const STATUS_DOING = 1;
    const STATUS_DONE = 2;

    public static $statuses = [
        self::STATUS_TODO => '未着手',
        self::STATUS_DOING => '進行中',
        self::STATUS_DONE => '完了',
    ];
}
