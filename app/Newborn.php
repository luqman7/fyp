<?php

namespace FYP;

class Newborn extends Model
{
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
