<!DOCTYPE html>
<html>
<head>
    <title>Editar Tarefa</title>
</head>
<body>
<div class="container">
    <h2>Editar Tarefa</h2>

    @if ($errors->any())
        <div class="alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ route('tarefas.update', $tarefa->id) }}">
        @csrf
        @method('PUT')
        <input type="text" name="titulo" value="{{ $tarefa->titulo }}">
        <button type="submit">Atualizar</button>
        <a href="{{ route('tarefas.index') }}">Voltar</a>
    </form>
</div>
</body>
</html>
