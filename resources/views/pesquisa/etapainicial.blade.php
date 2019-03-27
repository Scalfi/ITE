    @extends('layouts.app')


    @section('css')
        <link href="{{ asset('css/pesquisa.css') }}" rel="stylesheet">
        <link href="{{ asset('css/panelLoader.css') }}" rel="stylesheet">
    @section('content')

    @section('sidebar')
        @parent
    @endsection

    @section('content')
        <div class="container" id="cotentStepInicial">
            <form action="/save/stepinical" method="post" id="formInicialStep">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
                <input type="hidden" name="first_step" value="1">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <strong>Fomulário etapa inicial.</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-4 col-sm-12">
                                <label for="cidade"><i class="fas fa-city"></i><strong> Cidade: </strong></label>
                                <select name="cidade_id" class="form-control form-select-sm" id="selectCidade">
                                    <option value="{{$cidade->id}}">{{$cidade->name}}</option>
                                </select>
                            <small class="text-muted">Selecione a cidade.</small>
                            </div>
                            <div class="form-group col-md-4 col-sm-12">
                                <label for="cras"><i class="fas fa-passport"></i><strong> Cras: </strong></label>
                                <select name="cras_id" class="form-control form-select-sm" id="selectCras">
                                    <option value="">Selecione...</option>
                                    @foreach ($cras as $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            <small class="text-muted">Selecione o cras.</small>
                            </div>
                            <div class="form-group col-md-4 col-sm-12" id="divBairros"></div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary float-right mt-2" id="btnStepInical"><i class="fa fa-paper-plane mr-2"></i>Próxima etapa</button>
                    </div>
                </div>
            </form>
        </div>
    @endsection

    @section('js')
        <script src="{{ asset('js/pesquisa.js') }}" defer></script>
    @section('content')

