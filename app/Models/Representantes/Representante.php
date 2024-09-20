<?php
namespace App\Models\Representantes;
use App\Models\Endereco\Endereco;
use Illuminate\Database\Eloquent\Model;
class Representante extends Model
{
    protected $table = 'tb_representante';
    protected $fillable = [
        'nome',
        'cpf',
        'data_nascimento',
        'genero',
    ];
    public function endereco()
    {
        return $this->hasOne(Endereco::class);
    }
}

