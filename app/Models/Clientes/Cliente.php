<?php 
namespace App\Models\Clientes;

use App\Models\Endereco\Endereco;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'tb_cliente';
    protected $primaryKey = 'id';
    protected $fillable = [
        'cpf', 'nome', 'data_nascimento', 'genero'
    ];

    public function endereco()
    {
        return $this->hasOne(Endereco::class, 'cliente_id');
    }

}
