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

            @guest
            <a href="{{ route('show.login') }}" class="btn">Login</a>
            <a href="{{ route('show.register') }}" class="btn">Registre-se</a>
            @endguest

            @auth
            <span class="border-r-2 pr-2">Olá, {{Auth::user()->name}}</span>
            <a href="{{ route('lista.adicionar') }}">Adicionar novos produtos</a>
            <form action="{{route('logout')}}" method="POST" class="m-0">
                @csrf
                <button class="btn">Logout</button>
            </form>
            @endauth
        </nav>
    </header>

    <main class="container">
        {{$slot}}
    </main>
</body>
</html>
