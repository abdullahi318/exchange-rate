<?php

namespace App\Models;

class Permission extends \Spatie\Permission\Models\Permission
{
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }
}
