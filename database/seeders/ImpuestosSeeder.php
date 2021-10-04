<?php

namespace Database\Seeders;

use App\Models\Impuesto;
use Illuminate\Database\Seeder;

class ImpuestosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $impuestos = [
            '10%',
            '5%',
            'Exenta'
        ];
        foreach($impuestos as $key => $value){
            Impuesto::create([
                'impu_descripcion' => $value
            ]);
        }
    }
}
