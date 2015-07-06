<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_categorias extends Model {
        

        public $timestamps = false;
        
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tbl_categorias';
        
	/**
	 * The primary key id for the table used by the model.
	 *
	 * @var string
	 */
        protected $primaryKey = 'id_categoria';
        
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['nome'];
        
 	/**
	 * The attributes that may not be mass assignable.
	 *
	 * @var array
	 */       
        protected $guarded = ['id_categoria'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

}
