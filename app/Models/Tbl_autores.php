<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Tbl_autores extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

        /**
         * Não utiliza os campos 'created_at' e 'updated_at' por padrão
         *
         * @var boolean
         * 
         */
        public $timestamps = false;
        
	/**
	 * The database table used by the model.
	 * 
	 * @var string
	 */
	protected $table = 'tbl_autores';
        
	/**
	 * The primary key id for the table used by the model.
	 *
	 * @var string
	 */
        protected $primaryKey = 'id_autor';
        
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['nome', 'idade', 'sexo', 'email', 'senha'];
        
 	/**
	 * The attributes that may not be mass assignable.
	 *
	 * @var array
	 */       
        protected $guarded = ['id_autor'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['senha', 'remember_token'];
        
        /**
         *
         * A variável padrão para a senha é 'password'. Neste método é sobrescrito essa variável padrão para 'senha'. 
         * 
         * @return String
         * 
         */
        public function getAuthPassword() {
            return $this->senha;
        }
        
        
	/**
	 * Retorna os artigos relacionados a um autor.
	 *
	 * @return Tbl_artigos
	 */            
        public function artigos(){
            return $this->hasMany('App\Models\Tbl_artigos');
        }
        

}
