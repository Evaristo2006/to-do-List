
    <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>To-do List</title>
    </head>
    <body>
           <style>
        body { font-family: Arial; margin: 30px; background: #f4f4f4; }
        .container { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 8px; }
        input[type="text"] { width: 100%; padding: 10px; margin: 5px 0; }
        button, .btn { padding: 8px 16px; margin: 5px; border: none; cursor: pointer; }
        .success { color: green; }
        .danger { color: red; }
        .done { text-decoration: line-through; color: gray; }
    </style>

      <div class="container">
        <h2>To-Do List</h2>
        @if (@session('success'))
        <p class="success">{{session('success')}}</p>
        @endif

        <form action="{{ route('tarefas.store')}}" method="post">
            @csrf
            <input type="text" name="titulo" id="" placeholder="Nova tarefa">
            <button type="submit">Adicionar</button>
        </form>
        <ul>
            @foreach ($tarefas as $tarefa)
            <li>
                <form action="{{ route('tarefas.concluir', $tarefa->id) }}" method="post" style="display:inline;">
                    @csrf @method('PUT');
                    <button type="submit">{{$tarefa->concluidas? 'desfazer':'concluir'}}</button>
                </form>
                <span class="{{ $tarefa->concluido? 'done' : ''}}">{{$tarefa->titulo}}</span>
                <a href="{{ route('tarefas.edit', $tarefa->id) }}" class="btn">Editar</a>

                <form method="POST" action="{{ route('tarefas.destroy', $tarefa->id) }}" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="danger" type="submit" onclick="return confirm('Tem certeza?')">Excluir</button>
                </form>
            </li>

            @endforeach
        </ul>

      </div>

    </body>
    </html>


