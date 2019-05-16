@extends('adminlte::page')

@section('title', 'Categoria')

@section('content_header')
    <h1>Categoria</h1>
@stop

@section('content')

<div class="container">
	<div class="row">
		<a class="btn btn-info" href="{{ url('/categories') }}">Voltar para listagem</a>
		<br/>
		<br/>

	    @if(!isset($category))
	    	<p>Cadastrar Nova Categoria</p>
	    @else
	    	<p>Editar Categoria</p>
	    @endif

	    <form class="input-group form col-lg-10" method="post" @if(isset($category)) action="{{ url('/category/update/'.$category->id) }}" @else action="{{ url('/category/store') }}" @endif>
	    	@if(isset($category))<input name="_method" type="hidden" value="PUT">@endif
	    	{{ csrf_field() }}

	    	<div class="form-group">
		    	<label>
		    		<span class="block">Titulo</span>
		    		<input type="text" class="form-control" required name="title" value="{{ old('title') ? old('title') : isset($category) ? $category->title : "" }}">
		    	</label>
	    	</div>

	    	<div class="form-group">
		    	<label>
		    		Descricao
		    		<textarea cols="40" rows="5" class="form-control" required name="description">{{ old('description') ? old('description') : isset($category) ? $category->description : "" }}</textarea>
		    	</label>
	    	</div>

	    	<div class="form-group">
	    		<button type="submit" class="btn btn-success">Cadastrar</button>
	    	</div>
	    </form>
    </div>
</div>

@stop