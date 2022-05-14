<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portefolio extends Model
{
    public function cv() {
    	return $this->belongsTo("App\Cv");
    }
}
