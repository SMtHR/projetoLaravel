<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista</title>

    @vite('resources/css/app.css')
</head>
<body>

    @if(session('sucesso'))
    <div id="flash" class="p-3 text-center bg-green-50 text-green-500 font-bold">
        {{session('sucesso')}}
    </div>
    @endif
    <header>
        <nav>
            <h1>Lista de Produtos</h1>
            <a href="{{ route('lista.index') }}">Todos os produtos</a>
            <a href="{{ route('lista.adicionar') }}">Adicionar novos produtos</a>

            <a href="{{ route('show.login') }}" class="btn">Login</a>
            <a href="{{ route('show.register') }}" class="btn">Registre-se</a>

            <form action="{{route('logout')}}" method="POST" class="m-0">
                @csrf
                <button class="btn">Logout</button>
            </form>
        </nav>
    </header>

    <main class="container">
        {{$slot}}
    </main>
</body>
</html>
