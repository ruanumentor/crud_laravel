@extends('layouts.app')

@section('content')
<style>
    .btn-danger {
        margin-left: 10px;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Agenda') }}
                    <a href="{{ route("agenda.criar") }}" type="button" class="float-right btn btn-primary">Adicionar Agenda</a>
                </div>
                <div class="card-body">
                    @if (isset($agendas) && !$agendas->isEmpty())
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Data Planejada</th>
                                <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($agendas as $agenda)
                                    <tr>
                                        <th scope="row">{{ $agenda->id }}</th>
                                        <td>{{ $agenda->descricao }}</td>
                                        <td>{{ $agenda->data_planejada }}</td>
                                        <td class="row">
                                            <a href="{{ route("agenda.editar", $agenda->id) }}" type="button" class="btn btn-secondary">Editar</a>
                                            {!! Form::open(['class' => '', 'name'=>'form', 'route'=>['agenda.excluir', $agenda->id], 'method'=>'delete']) !!}
                                                @method('delete')
                                                @csrf         
                                                <button  type="submit" class="btn btn-danger">Excluir</button>                                    
                                            </form>
                                        </td>
                                    </tr>    
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection
