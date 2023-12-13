<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de sócio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
    
</head>
<body>
    <div class="container justify-content-center">
        <div class="card justify-content-center mt-4 mb-4 rounded">
            <div class="card-body bg-light">
                <h1 class="card-title">Adicionar sócio</h1>
                <form method="POST" action="{{ route('partners.store') }}" class="text-secondary">
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
                            <input type="text" name="state" id="State" class="form-control" value="{{ old('state') }}" placeholder="****-***" aria-label="State" aria-describedby="addon-wrapping">
                            @if ($errors->any())
                                <small class="text-danger">{{ $errors->first('state') }}</small>
                            @endif
                        </div>
                        <div class="col-auto">
                            <label for="City" class="col-form-label">Cidade:</label>
                            <input type="text" name="city" id="City" class="form-control" value="{{ old('city') }}" placeholder="****-***" aria-label="City" aria-describedby="addon-wrapping">
                            @if ($errors->any())
                                <small class="text-danger">{{ $errors->first('city') }}</small>
                            @endif
                        </div>
                        <div class="col-auto">
                            <label for="Number" class="col-form-label">Numero:</label>
                            <input type="text" name="number" id="Number" class="form-control" value="{{ old('number') }}" placeholder="****-***" aria-label="Number" aria-describedby="addon-wrapping">
                            @if ($errors->any())
                                <small class="text-danger">{{ $errors->first('number') }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-auto">
                            <label for="Address" class="col-form-label">Endereco:</label>
                            <input type="text" name="address" id="Address" class="form-control" value="{{ old('address') }}" placeholder="****-***" aria-label="Address" aria-describedby="addon-wrapping">
                            @if ($errors->any())
                                <small class="text-danger">{{ $errors->first('address') }}</small>
                            @endif
                        </div>
                        <div class="col-auto">
                            <label for="Complement" class="col-form-label">Complemento:</label>
                            <input type="text" name="complement" id="Complement" class="form-control" value="{{ old('complement') }}" placeholder="****-***" aria-label="Complement" aria-describedby="addon-wrapping">
                            @if ($errors->any())
                                <small class="text-danger">{{ $errors->first('complement') }}</small>
                            @endif
                        </div>
                    </div>
                    <button class="btn btn-success">Salvar</button>
                    <a href="{{ route('partners.index') }}">
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
        });


    </script>
</body>
</html>