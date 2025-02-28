<x-layout>
    <h2>{{$produto->nome}}</h2>

    <div class="bg-gray-200 p-4 rounded">
        <p><strong>Preco do Produto:</strong> R$ {{$produto->preco}}</p>
    </div>

    <div class="border-2 border-dashed bg-white px-4 pb-4 my-4 rounded">
        <h3>Informações da Unidade</h3>
        <p><strong>Endereço da Unidade:</strong> {{$produto->unidade->endereco}}</p>
        <p><strong>Cidade:</strong> {{$produto->unidade->cidade}}</p>
    </div>

    <form action="{{route('lista.deletarDado', $produto->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn my-4">Apagar Produto</button>
    </form>
</x-layout>
