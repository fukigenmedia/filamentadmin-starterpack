<?php

namespace App\Models\System;

use App\Models\Traits\UUID;
use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    use UUID;

    protected $fillable = [
        'action',
        'subject',

        'name',
        'email',

        'url',
        'method',
        'ip',
        'agent',
    ];
}
