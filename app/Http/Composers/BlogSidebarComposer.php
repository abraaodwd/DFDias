<?php namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
//use Illuminate\Users\Repository as UserRepository;
use App\Models\Tbl_categorias;
use App\Models\Tbl_artigos;

class BlogSidebarComposer {

    /**
     * The blog sidebar implementation.
     *
     * @var Tbl_categorias
     */
    protected $categorias;
    
    
    protected $artigos;

    /**
     * Create a new composer.
     *
     * @param  Tbl_categorias  $categorias
     * @return void
     */
    public function __construct(Tbl_categorias $categorias, Tbl_artigos $artigos)
    {
        // Dependencies automatically resolved by service container...
        $this->categorias = $categorias;
        $this->artigos    = $artigos;    
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('categorias', $this->categorias->all());
        $view->with('artigosPorMesAno', $this->artigos->qtdeArtigosPorMesAno());
    }

}
