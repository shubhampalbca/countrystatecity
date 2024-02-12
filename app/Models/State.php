<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class State extends Model
{
    use HasFactory;
  
    /**
     * Write code on Method

     */
    protected $fillable = [
        'name', 'country_id'
    ];
}