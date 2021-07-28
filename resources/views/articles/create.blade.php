@extends('articles.layout')

@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Création d'un topic</h2>
    </div>
    <div class="pull-right">
      <a class="btn btn-info" href="{{ route('articles.index') }}"> Annuler</a>
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
  @method('POST')
  <div class="form-group">
    <label for="topic">Topic</label>
    <input type="text" class="form-control" placeholder="Entrer le topic" name="topic" />
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea class="ckeditor form-control" name="description"></textarea>
  </div>
  <div class="form-group">
    <label for="tags">Tags</label>
    <input type="text" class="form-control" placeholder="Entrer des tags concernant votre topic" name="tags">
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

</div>

@endsection
