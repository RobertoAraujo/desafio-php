<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cidades')->insert([
            ['nome' => 'São Paulo', 'estado_id' => 1, 'sigla' => 'SP'],
            ['nome' => 'Rio de Janeiro', 'estado_id' => 2, 'sigla' => 'RJ'],
            ['nome' => 'Belo Horizonte', 'estado_id' => 3, 'sigla' => 'MG'],
            ['nome' => 'Curitiba', 'estado_id' => 4, 'sigla' => 'PR'],
            ['nome' => 'Porto Alegre', 'estado_id' => 5, 'sigla' => 'RS'],
            ['nome' => 'Salvador', 'estado_id' => 6, 'sigla' => 'BA'],
            ['nome' => 'Recife', 'estado_id' => 7, 'sigla' => 'PE'],
            ['nome' => 'Fortaleza', 'estado_id' => 8, 'sigla' => 'CE'],
            ['nome' => 'Brasília', 'estado_id' => 9, 'sigla' => 'DF'],
            ['nome' => 'Manaus', 'estado_id' => 10, 'sigla' => 'AM'],
            ['nome' => 'Belém', 'estado_id' => 11, 'sigla' => 'PA'],
            ['nome' => 'Goiânia', 'estado_id' => 12, 'sigla' => 'GO'],
            ['nome' => 'São Luís', 'estado_id' => 13, 'sigla' => 'MA'],
            ['nome' => 'Maceió', 'estado_id' => 14, 'sigla' => 'AL'],
            ['nome' => 'Campo Grande', 'estado_id' => 15, 'sigla' => 'MS'],
            ['nome' => 'Natal', 'estado_id' => 16, 'sigla' => 'RN'],
            ['nome' => 'Teresina', 'estado_id' => 17, 'sigla' => 'PI'],
            ['nome' => 'João Pessoa', 'estado_id' => 18, 'sigla' => 'PB'],
            ['nome' => 'Cuiabá', 'estado_id' => 19, 'sigla' => 'MT'],
            ['nome' => 'Florianópolis', 'estado_id' => 20, 'sigla' => 'SC'],
            ['nome' => 'Vitória', 'estado_id' => 21, 'sigla' => 'ES'],
            ['nome' => 'Palmas', 'estado_id' => 22, 'sigla' => 'TO'],
            ['nome' => 'Boa Vista', 'estado_id' => 23, 'sigla' => 'RR'],
            ['nome' => 'Macapá', 'estado_id' => 24, 'sigla' => 'AP'],
            ['nome' => 'Porto Velho', 'estado_id' => 25, 'sigla' => 'RO'],
            ['nome' => 'Rio Branco', 'estado_id' => 26, 'sigla' => 'AC'],
            // Adicione mais cidades aqui...
        ]);
    }
}
