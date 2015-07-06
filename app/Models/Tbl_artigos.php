<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tbl_artigos extends Model {
        
        /**
         * Sobrescreve o nome padrão do campo de data de criação.
         * 
         * @const string 
         * 
         */
        const CREATED_AT = 'dt_criacao';
        
        /**
         * Sobrescreve o nome padrão do campo de data de alteração.
         * 
         * @const string 
         * 
         */
        const UPDATED_AT = 'dt_alteracao';

        //public $timestamps = false;
        
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tbl_artigos';
        
	/**
	 * The primary key id for the table used by the model.
	 *
	 * @var string
	 */
        protected $primaryKey = 'id_artigo';
        
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id_autor' ,'id_categoria','titulo', 'texto', 'subtitulo', 'img_capa'];
        
 	/**
	 * The attributes that may not be mass assignable.
	 *
	 * @var array
	 */       
        protected $guarded = ['id_artigo'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];
              
	/**
	 * Retorna a qual autor pertence o artigo.
	 *
	 * @return Tbl_autores
	 */         
        public function autor(){
            return $this->belongsTo('App\Models\Tbl_autores', 'id_autor');
        }

	/**
	 * Retorna a qual categoria pertence o artigo.
	 *
	 * @return Tbl_categorias
	 */            
        public function categoria(){
            return $this->belongsTo('App\Models\Tbl_categorias', 'id_categoria');
        }
        
        public function scopeQtdeArtigosPorMesAno(){
            $results = DB::select('select year(dt_criacao) as ano, month(dt_criacao) as mes, count(id_artigo) as qt_artigos
                                   from tbl_artigos
                                   group by year(dt_criacao), month(dt_criacao)');
            return $results;
        }

}
