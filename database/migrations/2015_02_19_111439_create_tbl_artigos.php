<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblArtigos extends Migration {

    
        protected $table = 'tbl_artigos';
        protected $primaryKey = 'id_artigo';
        protected $timestamps = false;
        protected $fillable = ['titulo', 'texto', 'subtitulo'];
        protected $guarded = ['id_artigo', 'id_autor', 'id_categoria'];
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('tbl_artigos', function($table)
            {
                // Chave primária da tabela tbl_artigos
                $table->increments('id_artigo');
                
                // Chave estrangeira para tabela tbl_autores
                $table->integer('id_autor')->unsigned();
                $table->foreign('id_autor')->references('id_autor')->on('tbl_autores');
                
                // Chave estrangeira para tabela tbl_categorias
                $table->integer('id_categoria')->unsigned();
                $table->foreign('id_categoria')->references('id_categoria')->on('tbl_categorias');
                
                $table->string('titulo', 200);
                $table->mediumText('texto');
                $table->string('subtitulo', 400)->nullable();
                $table->dateTime('dt_criacao');
                $table->dateTime('dt_alteracao');
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('tbl_artigos');
	}

}
