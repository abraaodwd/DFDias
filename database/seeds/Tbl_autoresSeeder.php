<?php

use Illuminate\Database\Seeder;
use App\Models\Tbl_autores;
use Illuminate\Support\Facades\Hash;

class Tbl_autoresSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
            DB::table('tbl_autores')->delete();
            Tbl_autores::create([
                                                'nome'  => 'Diego Dias',
                                                'idade' => '33',
                                                'sexo'  => 'M',
                                                'email' => 'abraao82@gmail.com',
                                                'senha' => Hash::make('123456'),
                                           ]);
            
            $faker = Faker\Factory::create();

            for ($i = 0; $i < 10; $i++)
            {
              Tbl_autores::create([
                'nome'  => $faker->name,
                'idade' => rand(20,60),
                'sexo'  => rand(0, 1) ? 'M' : 'F',
                'email' => $faker->email,
                'senha' => Hash::make('123456'),
              ]);
            }
                        
	}

}
