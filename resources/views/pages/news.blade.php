@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Noticias</h1>
@stop

@section('content')
    <p>Listagem de Noticias</p>

    @if( \Session::has("message") )
		<div class="alert alert-success">
		   <span> {{ \Session::get("message") }}</span>
		</div>
	@endif

    <table class="table table-bordered table-responsive table-hover ">
    	<thead>
	    	<tr>
	    		<td>Id</td>
	    		<td>Imagem</td>
	    		<td>Titulo</td>
	    		<td>Opcoes</td>
	    	</tr>
    	</thead>
    	<tbody>
    	@foreach($news as $newsItem)	
			<tr>
				<td>{{ $newsItem->id }}</td>
				<td><img src="{{ Storage::url($newsItem->image) }}"style="max-width: 80px;"></td>
				<td>{{ $newsItem->title }}</td>
				<td>
					<a class="btn btn-info" href="{{ url('/news/edit/'.$newsItem->id) }}">Editar</a>
					<a class="btn btn-danger" href="{{ url('news/delete/'.$newsItem->id)  }}">Deletar</a>
				</td>
			</tr>
    	@endforeach
    	</tbody>

    </table>

@stop