<?php

namespace App\Models;

class Role extends \Spatie\Permission\Models\Role
{
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }
}
