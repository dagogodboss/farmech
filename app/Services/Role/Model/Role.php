<?php

namespace App\Services\Role\Model;

use App\Services\Permissions\Model\Permission;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];


    public function permissions() {
        return $this->belongsToMany(Permission::class,'role_permissions');
    }

}
