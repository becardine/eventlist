@extends('layouts.main')

@section('title', 'Editando: ' . $event->title)

@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Editando: {{ $event->title }}</h1>
        <form action="/events/update/{{ $event->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group my-2">
                <label for="title">Imagem do evento:</label>
                <input type="file" id="image" name="image" class="form-control-file">
                <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}" class="img-preview">
            </div>
            <div class="form-group my-2">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento" value="{{ $event->title }}">
            </div>
            <div class="form-group my-2">
                <label for="date">Data do evento:</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $event->date->format('Y-m-d') }}">
            </div>
            <div class="form-group my-2">
                <label for="city">Cidade:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Cidade do evento" value="{{ $event->city }}">
            </div>
            <div class="form-group">
                <label for="private">O evento é privado?</label>
                <select class="form-control" id="private" name="private">
                    <option value="0">Não</option>
                    <option value="1" {{ $event->private == 1 ? "selected='selected'" : ''}}>Sim</option>
                </select>
            </div>
            <div class="form-group my-2">
                <label for="description">Descrição:</label>
                <textarea class="form-control" id="description" name="description" placeholder="O que vai acontecer no evento?">{{ $event->description }}</textarea>
            </div>
            <div class="form-group my-2">
                <label for="items">Adicione itens de infraestrutura:</label>
                <div class="form group">
                    <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
                </div>
                <div class="form group">
                    <input type="checkbox" name="items[]" value="Palco"> Palco
                </div>
                <div class="form group">
                    <input type="checkbox" name="items[]" value="Cerveja grátis"> Cerveja grátis
                </div>
                <div class="form group">
                    <input type="checkbox" name="items[]" value="Open food"> Open food
                </div>
                <div class="form group">
                    <input type="checkbox" name="items[]" value="Brindes"> Brindes
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Editar evento">
        </form>
    </div>

@endsection
