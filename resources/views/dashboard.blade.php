<x-app-layout>
    <x-slot name="header" style="background-color: rgb(31 41 55 / var(--tw-bg-opacity));">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="container justify-content-center">
        <div class="card justify-content-center mt-4 mb-4 rounded">
            <div class="card-body bg-light">
                <div class="row">
                    <div class="col-8">
                        <h1 class="card-title">Lista de sócios</h1>
                    </div>
                    <div class="col-4">
                        <a href="{{ route('create') }}" class="float-end">
                            <div class="btn btn-primary mt-2">Adicionar</div>
                        </a>
                    </div>
                </div>
                
                <table class="table table-hover mt-4">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Tipo</th>
                            <th>CPF</th>
                            <th>CEP</th>
                            <th>Estado</th>
                            <th>Cidade</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($partners as $partner)
                        <tr>
                            <td>{{$partner->name}}</td>
                            <td>{{$partner->type}}</td>
                            <td>{{$partner->cpf}}</td>
                            <td>{{$partner->cep}}</td>
                            <td>{{$partner->state}}</td>
                            <td>{{$partner->city}}</td>
                            <td>
                                <a href="{{route('view', $partner->id)}}" class="text-decoration-none">
                                    <div class="btn btn-warning text-light" title="visualizar">
                                        <i class="fa-solid fa-eye"></i>
                                    </div>
                                </a>
                                <a href="{{route('edit', $partner->id)}}" class="text-decoration-none">
                                    <div class="btn btn-primary" title="editar">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </div>
                                </a>
                                <button type="button" class="btn btn-danger bg-danger" data-bs-toggle="modal" data-bs-target="#confirmaExclusao" title="deletar" data-id="{{ $partner->id }}" data-partner="{{ $partner->name }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                            <tr class="justify-content-center">
                                <td class="justify-content-center" colspan="7">Não foram encotrados registros</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class=" d-flex justify-content-center">
                    {{ $partners->links() }}
                </div>
            </div>
        </div>
    </div> 

     <!-- Modal -->
    <div class="modal fade" id="confirmaExclusao" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmaExclusaoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="confirmaExclusaoLabel">Confirmar exclusão</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja deletar o sócio <label id="registroId"></label>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary bg-secondary" data-bs-dismiss="modal">Cancelar</button>
                    
                    <form id="deleteForm" action="" method="GET">
                    @csrf
                        <input id="deleteConfirm" type="submit" value="Confirmar" class="btn btn-primary bg-primary" data-rota=""/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
       

        .hover:hover{
            cursor: pointer;
            color: #1F51FF;
        }

        h1{
            font-size: calc(1.375rem + 1.5vw)
        }
    </style>

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

         //Com essa função eu consigo manter o id a ser deletado e assim usar o modal do bootstrap para confirmar a exclusão,
        //que é mais bonito que o alert confirm do javascript
        $('#confirmaExclusao').on('show.bs.modal', function (event) {
                
            var button = $(event.relatedTarget);
            var idUsuario = button.data('id');
            var partner = button.data('partner');
            var rota = "{{ route('delete', 0) }}"
            rota = rota.replace('/0', '/'+idUsuario)
            
            $('#deleteConfirm').attr("data-rota", rota );
            $('#registroId').text( partner );
            
        })
        
        $(document).ready(function () {
            $("#deleteForm").submit(function (event) {
                var button = $('#deleteConfirm');
                var rotaDelete = button.data('rota');
                
                $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}",
                },
                type: "GET",
                url: rotaDelete,
                dataType: "json",
                encode: true,
                }).done(function (response) {
                    if (!response.success) {
                        toastr.error(response.message)
                    } else {
                        location.reload()
                    }
                })
    
                event.preventDefault();
            });
        });
    </script>
</x-app-layout>
