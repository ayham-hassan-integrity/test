<?php

namespace App\Domains\Test\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Domains\Test\Models\Traits\Attribute\TestAttribute;
use App\Domains\Test\Models\Traits\Method\TestMethod;
use App\Domains\Test\Models\Traits\Relationship\TestRelationship;
use App\Domains\Test\Models\Traits\Scope\TestScope;


/**
 * Class Test.
 */
class Test extends Model
{
    use SoftDeletes,
        TestAttribute,
        TestMethod,
        TestRelationship,
        TestScope;

    /**
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'tests';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [         "test",    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];


    public $timestamps =["create_at","update_at"];

    /**
     * @var array
     */
    protected $dates = [
    "create_at",
    "update_at",
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * @var array
     */
    protected $appends = [

    ];

}