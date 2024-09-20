<?php 
namespace App\Models\Endereco;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'tb_endereco';
    protected $primaryKey = 'id';
    protected $fillable = [
        'endereco', 'cidade', 'estado', 'cliente_id', 'representante_id'
    ];

}