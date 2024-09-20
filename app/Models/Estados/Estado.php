<?php
namespace App\Models\Estados;
use Illuminate\Database\Eloquent\Model;
class Estado extends Model
{
    protected $table = 'estados';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nome'
    ];
}