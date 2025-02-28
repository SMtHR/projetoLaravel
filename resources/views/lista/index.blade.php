<x-layout>
    <h2>Produtos disponíveis</h2>

    <ul>
        @foreach($produtos as $produto)
        <li>
            <x-card href="{{ route('lista.detalhes', $produto->id) }}" :highlight="$produto['preco'] > 30">
                <div>
                    <h3>{{ $produto->nome }}</h3>
                    <p>{{$produto->unidade->cidade}}</p>
                </div>
            </x-card>
        </li>
        @endforeach
    </ul>

    {{ $produtos->links() }}
</x-layout>
