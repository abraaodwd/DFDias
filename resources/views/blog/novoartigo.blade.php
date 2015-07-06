@extends('master')

@section('js')
<!-- Place inside the <head> of your HTML -->
<script type="text/javascript" src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    $(function(){
        var roxyFileman = '{{asset("js/fileman/index.html")}}';   
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'texto', {filebrowserBrowseUrl:roxyFileman,
                                    filebrowserImageBrowseUrl:roxyFileman+'?type=image',
                                    removeDialogTabs: 'link:upload;image:upload'});
    });                        
 /*   
tinymce.init({
    selector: "textarea",
    theme: "modern",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media | forecolor backcolor emoticons",
    //toolbar2: "",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
 });*/
</script>
@endsection

@section('content')
<section id="conteudo">
    @include('menuadmin')
    <div class="row">
        <div class="small-12 column">  

            @if (count($errors) > 0)
                    <div class="panel">
                        <ul class="no-bullet">
                            @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                            @endforeach 
                        </ul>
                    </div>
            @endif
            @if (Session::has('mensagem'))
                    <div class="panel">
                            <ul>
                                <li>{{ Session::get('mensagem') }}</li>
                            </ul>
                    </div>
            @endif        
            <form method="post" enctype="multipart/form-data" action="{{action('BlogController@store')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id_autor" value="{{$id_autor}}" />
                <fieldset>
                    <legend>Novo post</legend>

                    <label for="titulo">Título</label>
                    <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}" />

                    <label for="subtitulo">Subtítulo</label>
                    <input type="text" name="subtitulo" id="subtitulo" value="{{ old('subtitulo') }}" />

                    <label for="id_categoria">Categorias</label>
                    <select name="id_categoria" id="id_categoria">
                        @foreach($categorias as $categoria)
                        <option value="{{$categoria->id_categoria}}">{{$categoria->nome}}</option>
                        @endforeach
                    </select>

                    <label for="img_capa">Imagem de Capa</label>
                    <input type="file" name="img_capa" id="img_capa" />                

                    <textarea name="texto" id="texto">{{ old('texto') }}</textarea>

                    <input type="submit" value="Salvar" class="button tiny" />
                </fieldset>
            </form>

        </div>
    </div>
</section>    
@endsection
