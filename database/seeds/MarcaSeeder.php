<?php

use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marcas = array('COCA COLA', 'PEPSICO', 'NISSUTA', 'GENIUS','TP-LINK', 'SENTEY','KELYX', 'KINGSTON','LG', 'SONY','MIKROTIK', 'PIONNER','BAGLEY');

        for($i = 0; $i < count($marcas); $i++ )
        {
            DB::table('marcas')->insert([
                'nombre' => $marcas[$i],
            ]);
        }
    }


}
