<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'report_type',
        'report_date',
        'total_items_sold',
        'total_revenue',
        'notes',
    ];
}