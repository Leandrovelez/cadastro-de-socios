<x-app-layout>
    <x-slot name="header" style="background-color: rgb(31 41 55 / var(--tw-bg-opacity));">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dados do sócio
        </h2>
    </x-slot>
    <div class="container justify-content-center">
        <div class="card justify-content-center text-center mt-4 mb-4 rounded">
            <div class="card-body bg-light">
                <h3>Informações pessoais</h3>
                <div class="row mt-4  text-secondary">
                    <div class="col-4">
                    </div>
                    <div class="col-2 text-start">
                        <p>Nome:</p><br>
                        <p>E-mail:</p><br>
                    </div>
                    <div class="col-6 text-start">
                        <p>{{ $partner->name }}</p><br>
                        <p>{{ $partner->email }}</p><br>
                    </div>
                </div>
                <h3>Endereço</h3>
                <div class="row mt-4  text-secondary">
                    <div class="col-4">
                    </div>
                    <div class="col-2 text-start">
                        <p>Estado:</p><br>
                        <p>Cidade:</p><br>
                        <p>Bairro:</p><br>
                        <p>Rua:</p><br>
                        <p>Número:</p><br>
                        <p>Complemento:</p><br>
                    </div>
                    <div class="col-6 text-start">
                    <p>{{ $partner->state }}</p><br>
                    <p>{{ $partner->city }}</p><br>
                    <p>{{ $partner->neighborhood }}</p><br>
                    <p>{{ $partner->address }}</p><br>
                    <p>{{ $partner->number }}</p><br>
                    <p>{{ $partner->complement }}</p><br>
                    </div>
                </div>
                <a href="{{ route('dashboard') }}">
                    <div class="btn btn-primary">Voltar</div>
                </a>
            </div>
        </div>
    </div>

</x-app-layout>
    