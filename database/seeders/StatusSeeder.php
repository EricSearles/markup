<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            $status = [
                [
                    'nome'=>'Ativo'
                ],
                [
                    'nome'=>'Desativado'
                ],
                [
                    'nome'=>'Reservado'
                ],
                [
                    'nome'=>'Em espera'
                ],
                [
                    'nome'=>'Cancelado'
                ]
            ];
    }
}
