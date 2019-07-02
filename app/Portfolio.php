<?php

namespace Tour;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{

    public function filter(){
        return $this->belongsTo('Tour\Filter','filter_alias','alias');
    }
    //
}
