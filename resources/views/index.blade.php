@extends('master')

@section('title')
    DFDias Sistemas Web
@endsection

@section('content')
{{--
<section id="carrossel">
    <div class="row">
        <div class="small-12 column text-center">
            <h1>Desenvolvimento de Sistemas, Sites e serviços para empresas</h1>
        </div>
    </div>
</section>
--}}
<section id="conteudo">
    <div class="row">
        <header id="header_servicos" class="small-12 columns text-center">
            <h2><span class="fa fa-briefcase"></span> Serviços Prestados</h2>
        </header>
        <ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-3">
            <li>
                <article class="line-height-2">
                    <span>
                        <img src="{{asset('img/responsive_layout.jpg')}}" alt="Imagem" class="image fit"  />
                    </span>
                    <h3 class="text-center"><span class="fa fa-check-square-o"></span><br /> Desenvolvimento de Sites</h3>
                    <p>Sites desenvolvidos utilizando a tecnologia mais recente, podendo ser dinâmicos ou estáticos, adaptáveis a diversos tipos de dispositivos.</p>
                </article>
            </li>
            <li>
                <article class="line-height-2">
                    <span>
                        <img src="{{asset('img/websystem.jpg')}}"  alt="Imagem" class="image fit" />
                    </span>
                    <h3 class="text-center"><span class="fa fa-check-square-o"></span><br /> Desenvolvimento de Sistemas</h3>
                    <p>Sistemas acessíveis de qualquer lugar com acesso a internet, personalizados para potencializar seu negócio.</p>
                </article>
            </li>
            <li>
                <article class="line-height-2">
                    <span>
                        <img src="{{asset('img/desenvolvimento_remoto.jpg')}}" alt="Imagem" class="image fit" />
                    </span>
                    <h3 class="text-center"><span class="fa fa-check-square-o"></span><br /> Projetos Freelance</h3>
                    <p>Reforço para sua equipe de desenvolvimento, para agilizar projetos em andamento ou cobrir a ausência de algum membro de sua equipe.</p>
                </article>
            </li>
        </ul>    
    </div>
</section>
<section id="sobre">
    <div class="row">
        <div class="small-12 columns text-center">
            <h2><span class="fa fa-info-circle"></span> Sobre</h2>            
        </div>
        <p>
           Sou desenvolvedor web autônomo e resido em São José dos Campos/SP. Sou bacharel em Sistemas de Informação pela PUC-RS e pós-graduado em Administração de Banco de Dados Oracle pela FIAP. Possuo cerca de 7 anos de experiência em desenvolvimento de sistemas, com foco em sistemas para web e trabalho principalmente com linguagens PHP 5, CSS, HTML5, JavaScript, jQuery, SQL e com o framework PHP Laravel 5 e o framework CSS Foundation For Sites. Tenho familiaridade com ambiente Linux, especialmente Debian e Ubuntu.
           <br /><br />
           Meu currículo completo pode ser visto no <a href="https://br.linkedin.com/in/diegofdias">meu perfil do Linkedin</a>. 
        </p>        
    </div>
</section>
<!--
<section id="posts">
    <div class="row">
        <hr />
        <ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-3">
            <li>
                <h4>Blog Post 1</h4>
                <p>Nulla eget nibh viverra, faucibus ex tincidunt, fermentum orci. Cras non pulvinar arcu, sed tempor ex.</p>
            </li>
            <li>
                <h4>Blog Post 2</h4>
                <p>Quisque sed diam a orci facilisis volutpat a nec ligula. Nulla eget nibh viverra, faucibus ex tincidunt, fermentum orci.</p>
            </li>
            <li>
                <h4>Blog Post 3</h4>
                <p>Aliquam placerat pretium dolor, et viverra mauris porta eget. In purus tortor, dignissim at finibus ut, imperdiet vel turpis.</p>
            </li>
        </ul>
    </div>
</section>
-->
<section id="tecnologias">
    <div class="row">
        <div class="small-12 columns text-center">
            <h2><span class="fa fa-code"></span> Tecnologias utilizadas</h2>
        </div>
        <ul class="small-block-grid-2 medium-block-grid-6 large-block-grid-7">
            <li class="center-block">
                <a href="http://www.php.net"><img src="{{asset('img/php_grey.png')}}" alt="PHP" title="PHP" /></a>
            </li>
            <li>
                <a href="http://www.mysql.com"><img src="{{asset('img/mysql_grey.png')}}" alt="MySQL" title="MySQL" /></a>
            </li>
            <li>
                <a href="http://www.laravel.com"><img src="{{asset('img/laravel_grey.png')}}" alt="Laravel" title="Laravel" /></a>
            </li>
            <li>
                <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript"><img src="{{asset('img/javascript_grey.png')}}" alt="JavaScript" title="JavaScript" /></a>
            </li>
            <li>
                <a href="http://www.microsoft.com/pt-br/server-cloud/products/sql-server/"><img src="{{asset('img/sqlserver_logo_grey.png')}}" alt="SQL Server" title="SQL Server" /></a>
            </li>
            <li>
                <a href="http://www.jquery.com"><img src="{{asset('img/jquery_logo.png')}}" alt="jQuery" title="jQuery" /></a>
            </li>
            <li>
                <a href="http://foundation.zurb.com"><img src="{{asset('img/foundation_logo_grey.png')}}" alt="Foundation for Sites" title="Foundation for Sites" /></a>
            </li>                     
        </ul>
   </div>
</section>
@endsection