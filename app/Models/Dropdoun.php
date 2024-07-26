<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
   
class Dropdoun extends Model
{
    use HasFactory;
  
    /**
     * Write code on Method
     *
     * 
     */

     protected $table = 'dropdouns';
     protected $fillable = [
        'country_id', 'state_id', 'city_id','name'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }




}