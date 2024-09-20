<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estados')->insert([
            ['nome' => 'São Paulo', 'sigla' => 'SP'],
            ['nome' => 'Rio de Janeiro', 'sigla' => 'RJ'],
            ['nome' => 'Minas Gerais', 'sigla' => 'MG'],
            ['nome' => 'Paraná', 'sigla' => 'PR'],
            ['nome' => 'Rio Grande do Sul', 'sigla' => 'RS'],
            ['nome' => 'Bahia', 'sigla' => 'BA'],
            ['nome' => 'Pernambuco', 'sigla' => 'PE'],
            ['nome' => 'Ceará', 'sigla' => 'CE'],
            ['nome' => 'Distrito Federal', 'sigla' => 'DF'],
            ['nome' => 'Amazonas', 'sigla' => 'AM'],
            ['nome' => 'Pará', 'sigla' => 'PA'],
            ['nome' => 'Goiás', 'sigla' => 'GO'],
            ['nome' => 'Maranhão', 'sigla' => 'MA'],
            ['nome' => 'Alagoas', 'sigla' => 'AL'],
            ['nome' => 'Mato Grosso do Sul', 'sigla' => 'MS'],
            ['nome' => 'Rio Grande do Norte', 'sigla' => 'RN'],
            ['nome' => 'Piauí', 'sigla' => 'PI'],
            ['nome' => 'Paraíba', 'sigla' => 'PB'],
            ['nome' => 'Mato Grosso', 'sigla' => 'MT'],
            ['nome' => 'Santa Catarina', 'sigla' => 'SC'],
            ['nome' => 'Espírito Santo', 'sigla' => 'ES'],
            ['nome' => 'Tocantins', 'sigla' => 'TO'],
            ['nome' => 'Roraima', 'sigla' => 'RR'],
            ['nome' => 'Amapá', 'sigla' => 'AP'],
            ['nome' => 'Rondônia', 'sigla' => 'RO'],
            ['nome' => 'Acre', 'sigla' => 'AC'],
            ['nome' => 'Sergipe', 'sigla' => 'SE'],

            // Adicione mais estados aqui...
        ]);
    }
}
