<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

 /**
         * The roles that belong to the Business
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
         */
        public function cat()
        {
            return $this->belongsToMany(BusinessCategory::class, 'cat_business',  'business_id' , 'cat_id');
        }
        public function areas()
        {
            return $this->hasMany(AreaWeServe::class, 'business_id');
        }
        public function hours()
        {
            return $this->hasMany(OpeningHours::class, 'business_id');
        }
        public function gallery()
        {
            return $this->hasMany(BusinessGallery::class, 'business_id');
        }
        public function category()
        {
            return $this->belongsTo(BusinessCategory::class, 'cat_id');
        }
}
