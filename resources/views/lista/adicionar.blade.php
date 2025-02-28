<x-layout>

    <form action="{{route('lista.guardarDados')}}" method="POST">
        @csrf

        <h2>Adicione um novo produto</h2>

        <!-- defina o nome -->
        <label for="nome">Nome do produto:</label>
        <input type="text" id="nome" name="nome" value="{{ old('nome') }}" required>

        <!-- defina o preço -->
        <label for="preco">Preço do produto</label>
        <input type="number" step="0.01" lang="pt-BR" id="preco" name="preco" value="{{ old('preco') }}" required>

        <!-- selecione uma Unidade -->
        <label for="unidade_id">Unidade</label>
        <select id="unidade_id" name="unidade_id" required>
            <option value="" disabled selected>Selecione uma unidade</option>
            @foreach($unidades as $unidade)
            <option value="{{$unidade->id}}" {{ $unidade->id == old('unidade_id') ? 'selected' : '' }}>
                {{$unidade->cidade}}
            </option>
            @endforeach
        </select>

        <button type="submit" class="btn mt-4">Adicionar Produto</button>

        <!-- validation errors -->
        @if($errors->any())
        <ul class="px-4 py-2 bg-red-100">
            @foreach($errors->all() as $error)
            <li class="my-2 text-red-500">{{$error}}</li>
            @endforeach
        </ul>
        @endif

    </form>

</x-layout>
