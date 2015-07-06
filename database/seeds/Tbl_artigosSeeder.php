<?php 

use Illuminate\Database\Seeder;
use App\Models\Tbl_artigos;

class Tbl_artigosSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
            DB::table('tbl_artigos')->delete();
            
            $faker = Faker\Factory::create('pt_BR');
            
            for ($i = 0; $i < 15; $i++)
            {
              Tbl_artigos::create([
                'id_autor'     => 1,
                'id_categoria' => rand(1, 4),  
                'titulo'       => $faker->word,
                'subtitulo'    => $faker->words(4, true),
                'texto'        => $faker->text,
              ]);
            }
                        
	}

}
