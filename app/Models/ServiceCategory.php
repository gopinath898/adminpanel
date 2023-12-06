<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    protected $table ='servicecategories';
    protected $fillable = ['service_name','Service_description','status'];
}
