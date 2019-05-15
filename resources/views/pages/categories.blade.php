@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Categorias</h1>
@stop

@section('content')
    <p>Listagem de Categorias</p>

    @if( \Session::has("message") )
		<div class="alert alert-success">
		   <span> {{ \Session::get("message") }}</span>
		</div>
	@endif

    <table class="table table-bordered table-responsive table-hover ">
    	<thead>
	    	<tr>
	    		<th>Id</th>
	    		<th>Titulo</th>
	    		<th>Opcoes</th>
	    	</tr>
    	</thead>
    	<tbody>
    	@foreach($categories as $category)	
			<tr>
				<td>{{ $category->id }}</td>
				<td>{{ $category->title }}</td>
				<td>
					<a class="btn btn-info" href="{{ url('category/edit/'.$category->id) }}">Editar</a>
					<a class="btn btn-danger" href="{{ url('category/delete/'.$category->id ) }}">Deletar</a>
				</td>
			</tr>
    	@endforeach
    	</tbody>

    </table>

@stop