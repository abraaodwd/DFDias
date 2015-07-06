<header id="menu_principal">
    <div class="contain-to-grid">
        <nav class="top-bar" data-topbar role="navigation">
            <ul class="title-area">
                <li class="name"><a href="{{action('IndexController@index')}}"><img src="{{asset('img/dfdias_logo.png')}}" alt="DFDias Sistemas Web"  /></a></li>
                <li class="toggle-topbar menu-icon"><a href='#'><span class="burger"></span>Menu</a></li>
            </ul>
            <section class="top-bar-section">
                <ul class="right">

                    <li><a href="{{url('/')}}"><span class="fa fa-home"></span> Home</a></li>
                   {{-- <li><a href="{{url('/blog')}}"><span class="fa fa-newspaper-o"></span> Blog</a></li> --}}
                    <li><a href="{{url('/contato')}}"><span class="fa fa-envelope"></span> Contato</a></li>
                   {{-- <li><a href="{{url('/login')}}"><span class="fa fa-gears"></span> Administração</a></li> --}}
                    @if (Auth::check())
                        <li><a href="{{url('/logout')}}">Sair</a></li>
                    @endif 

                </ul>
            </section>
        </nav>
    </div>    
</header>

