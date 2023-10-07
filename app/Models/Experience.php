<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['formatted_end_date'];

    public function getFormattedEndDateAttribute() : ?string
    {
        if($this->end_date)
            return $this->end_date;
        return 'Present';
    }
}
