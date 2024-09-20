<?php 
namespace App\Models\Cidades;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table = 'cidades';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nome', 'estado_id'
    ];
}