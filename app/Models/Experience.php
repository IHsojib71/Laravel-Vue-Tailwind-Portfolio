<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['formatted_start_date','formatted_end_date'];

    public function getFormattedStartDateAttribute() : ?string
    {
        if($this->start_date)
            return date('F j, Y', strtotime($this->start_date));

        return null;
    }

    public function getFormattedEndDateAttribute() : ?string
    {
        if($this->end_date)
         return date('F j, Y', strtotime($this->end_date));

        return 'Present';
    }



}
