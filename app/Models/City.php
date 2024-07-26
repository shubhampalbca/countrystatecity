<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
   
class City extends Model
{
    use HasFactory;
  
    /**
     * Write code on Method
     *
     * 
     */
    protected $fillable = [
        'name', 'state_id'
    ];


    public function dropdouns()
    {
        return $this->hasMany(Dropdoun::class);
    }
}


