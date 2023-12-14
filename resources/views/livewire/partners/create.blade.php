<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Adicionar sócio
        </h2>
    </x-slot>
    <div class="container justify-content-center">
        <div class="card justify-content-center mt-4 mb-4 rounded">
            <div class="card-body bg-light">
                <form method="POST" action="{{ route('store') }}" class="text-secondary">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <label for="Name" class="col-form-label">Nome:</label>
                            <input type="text" name="name" id="Name" class="form-control" placeholder="Nome" value="{{ old('name') }}" aria-label="Nome" aria-describedby="addon-wrapping">
                            @if ($errors->any())
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            @endif
                        </div>
                        <div class="col-6">
                            <label for="Email" class="col-form-label">E-mail:</label>
                            <input type="text" name="email" id="Email" class="form-control" placeholder="E-mail" value="{{ old('email') }}" aria-label="Email" aria-describedby="addon-wrapping">
                            @if ($errors->any())
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-auto">
                            <label for="Type" class="col-form-label">Tipo:</label>
                            <select name="type" id="Type" class="form-select" aria-label="Default select example">
                                <option selected></option>
                                <option value="1">Silver</option>
                                <option value="2">Gold</option>
                            </select>
                            @if ($errors->any())
                                <small class="text-danger">{{ $errors->first('type') }}</small>
                            @endif
                        </div>
                        <div class="col-auto">
                            <label for="CPF" class="col-form-label">CPF:</label>
                            <input type="text" name="cpf" id="CPF" class="form-control" value="{{ old('cpf') }}" placeholder="***.***.***-**" aria-label="CPF" aria-describedby="addon-wrapping">
                            @if ($errors->any())
                                <small class="text-danger">{{ $errors->first('cpf') }}</small>
                            @endif
                        </div>
                        <div class="col-auto">
                            <label for="CEP" class="col-form-label">CEP:</label>
                            <input type="text" name="cep" id="CEP" class="form-control" value="{{ old('cep') }}" placeholder="****-***" aria-label="CEP" aria-describedby="addon-wrapping">
                            @if ($errors->any())
                                <small class="text-danger">{{ $errors->first('cep') }}</small>
                            @endif
                        </div>
                        <div class="col-auto">
                            <label for="State" class="col-form-label">Estado:</label>
                            @if(isset($response))

                            <input type="text" name="state" id="State" class="form-control" value="{{ $response->uf }}" aria-label="State" aria-describedby="addon-wrapping">
                            @else
                            <input type="text" name="state" id="State" class="form-control" value="{{ old('state') }}" aria-label="State" aria-describedby="addon-wrapping">
                            @endif
                            @if ($errors->any())
                                <small class="text-danger">{{ $errors->first('state') }}</small>
                            @endif
                        </div>
                        <div class="col-auto">
                            <label for="City" class="col-form-label">Cidade:</label>
                            <input type="text" name="city" id="City" class="form-control" value="{{ old('city') }}" aria-label="City" aria-describedby="addon-wrapping">
                            @if ($errors->any())
                                <small class="text-danger">{{ $errors->first('city') }}</small>
                            @endif
                        </div>
                        <div class="col-auto">
                            <label for="Neighborhood" class="col-form-label">Bairro:</label>
                            <input type="text" name="neighborhood" id="Neighborhood" class="form-control" value="{{ old('neighborhood') }}" aria-label="City" aria-describedby="addon-wrapping">
                            @if ($errors->any())
                                <small class="text-danger">{{ $errors->first('neighborhood') }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-4 mt-2">
                        <div class="col-auto">
                            <label for="Address" class="col-form-label">Endereco:</label>
                            <input type="text" name="address" id="Address" class="form-control" value="{{ old('address') }}" aria-label="Address" aria-describedby="addon-wrapping">
                            @if ($errors->any())
                                <small class="text-danger">{{ $errors->first('address') }}</small>
                            @endif
                        </div>
                        <div class="col-auto">
                            <label for="Number" class="col-form-label">Numero:</label>
                            <input type="text" name="number" id="Number" class="form-control" value="{{ old('number') }}" aria-label="Number" aria-describedby="addon-wrapping">
                            @if ($errors->any())
                                <small class="text-danger">{{ $errors->first('number') }}</small>
                            @endif
                        </div>
                        <div class="col-auto">
                            <label for="Complement" class="col-form-label">Complemento:</label>
                            <input type="text" name="complement" id="Complement" class="form-control" value="{{ old('complement') }}" aria-label="Complement" aria-describedby="addon-wrapping">
                            @if ($errors->any())
                                <small class="text-danger">{{ $errors->first('complement') }}</small>
                            @endif
                        </div>
                    </div>
                    <button class="btn btn-success">Salvar</button>
                    <a href="{{ route('dashboard') }}">
                        <div class="btn btn-primary">Voltar</div>
                    </a>
                </form>
            </div>
        </div>
    </div>
    <style>
        body{
            background-color: #D3D3D3;
        }

        .hover:hover{
            cursor: pointer;
            color: #1F51FF;
        }

        h1{
            font-size: calc(1.375rem + 1.5vw)
        }
    </style>
    {{-- toastr js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('alert-success'))
                toastr.success('{{ Session::get('alert-success') }}');
            @elseif(Session::has('message'))
                toastr.warning('{{ Session::get('message') }}');
            @endif
           
            
            $("#CEP").focusout(function (event) {
            var input = $('#CEP');
            var cep = input.val();
            var rota = "{{ route('search_cep', 0) }}"
            rota = rota.replace('/0', '/'+cep)

            $.ajax({
            type: "GET",
            url: rota,
            encode: true,
            }).done(function (response) {
                if (!response.success) {
                    toastr.error(response.data)
                } else {
                    $('#CEP').val(response.data.cep)
                    $('#State').val(response.data.uf)
                    $('#City').val(response.data.localidade)
                    $('#Address').val(response.data.logradouro)
                    $('#Neighborhood').val(response.data.bairro)
                }
            })

            event.preventDefault();
        });

        });


    </script>
</x-app-layout>