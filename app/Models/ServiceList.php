<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceList extends Model
{
    use HasFactory;
    protected $table =  'service_list';
    protected $fillable = ['serv_cate_id','title','description','price','duration'];
    
    public function service_category(){
        return $this->belongsTo(ServiceCategory::class, 'serv_cate_id', 'id');
    }
}
