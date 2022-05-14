<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competance extends Model
{
    public function cv() {
    	return $this->belongsTo("App\Cv");
    }
}
