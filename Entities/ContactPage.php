<?php

namespace Modules\Base\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Base\Database\Factories\ContactPageFactory;

class ContactPage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    // protected static function newFactory(): ContactPageFactory
    // {
    //     // return ContactPageFactory::new();
    // }
}
