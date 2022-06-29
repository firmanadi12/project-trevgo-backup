<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\TourPackage;

class Gallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tour_packages_id','image'
    ];

    protected $hidden = [
       
    ];

    public function tour_package()
    {
        return $this->belongsTo(TourPackage::class,'tour_packages_id','id');
    }
}
