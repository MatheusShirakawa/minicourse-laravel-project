@extends('adminlte::page')

@section('title', 'Noticia')

@section('content_header')
    <h1>Noticias</h1>
@stop

@section('content')

<div class="container">
	<div class="row">
	    <p>Cadastrar Nova Noticia</p>

	    <form class="input-group form col-lg-10" method="post" @if(isset($news)) action="{{ url('/news/update/'.$news->id) }}" @else action="{{ url('/news/store') }}" @endif >
	    	@if(isset($news))<input name="_method" type="hidden" value="PUT">@endif
	    	{{ csrf_field() }}

	    	<div class="form-group">
		    	<label>
		    		Titulo
		    		<input type="text" class="form-control" required name="title" value="{{ old('title')? old('title') : isset($news) ? $news->title : "" }}">
		    	</label>
	    	</div>

	    	<div class="form-group">
	    		<label>
	    			Categoria
	    			{{-- {{ dd($categories) }} --}}
	    			<select class="form-control" name="category_id">
	    				@foreach($categories as $category)
	    					<option value="{{ $category->id }}">{{ $category->title }}</option>
	    				@endforeach
	    			</select>
	    		</label>
	    	</div>

	    	<div class="form-group">
		    	<label class="form-group">
		    		Subtitulo
		    		<input type="text" class="form-control" required name="subtitle" value="{{ old('subtitle')? old('subtitle') : isset($news) ? $news->subtitle : "" }}" >
		    	</label>
	    	</div>

	    	<div class="form-group">
		    	<label>
		    		Imagem
		    		<input type="file" class="form-control" required name="image">
		    	</label>
	    	</div>

	    	<div class="form-group">
		    	<label>
		    		Descricao
		    		<textarea cols="40" rows="5" class="form-control" required name="description">
		    			{{ old('description')? old('description') : isset($news) ? $news->description : "" }}
		    		</textarea>
		    	</label>
	    	</div>

	    	<div class="form-group">
	    		<button type="submit" class="btn btn-success">Cadastrar</button>
	    	</div>
	    </form>
    </div>
</div>

@stop