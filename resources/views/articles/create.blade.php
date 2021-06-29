@extends('articles.layout')
@section('content')

<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2>Créer un nouveau topic</h2>
		</div>
		<div class="pull-right">
			<a class="btn btn-info" href="{{ route('articles.index') }}">Annuler</a>
		</div>
	</div>
</div>

@if ($errors->any())
  <div class="alert alert-danger">
    <strong>Attention!</strong> Un ou plusieurs champs sont incorrect<br><br>
    <ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
    </ul>
  </div>
@endif

<form action="{{ route('articles.store') }}" method="POST">
@csrf
  <div class="form-group">
    <label for="topic">Topic</label>
    <input type="text" class="form-control"  placeholder="Entrer le topic" name="topic">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" rows="3" placeholder="Que souhaitez vous écrire?" name="description"></textarea>
  </div>
  <div class="form-group">
    <label for="tags">Tags</label>
    <input type="text" class="form-control" placeholder="Entrer des tags concernant votre topic" name="tags">
  </div>
  <button type="submit" class="btn btn-primary">Publier</button>
</form>

@endsection