@extends('especialidades.layout')

@section('title',__('Editar (CRUD Laravel)'))

@push('css')
<style>
    /* Personalizar layout*/
</style>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between w-100">
                        <span>@lang('Editar (CRUD Laravel)')</span>
                        <a href="{{ url('convenios') }}" class="btn-info btn-sm">
                            <i class="fa fa-arrow-left"></i> @lang('Voltar')
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {!! Form::open(['action' => ['ConvenioController@update',$convenio->id], 'method' => 'PUT'])!!}

                    <div class="form-group">
                        {!! Form::label(__('Nome do Convênio:')) !!}
                        {!! Form::text("nome_conv", $convenio->nome_conv, ["class"=>"form-control","required"=>"required"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label(__('Telefone:')) !!}
                        {!! Form::text("fone_conv", $convenio->fone_conv, ["class"=>"form-control","required"=>"required"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label(__('Site:')) !!}
                        {!! Form::text("site_conv", $convenio->site_conv, ["class"=>"form-control","required"=>"required"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label(__('Contato:')) !!}
                        {!! Form::text("contato_conv", $convenio->contato_conv, ["class"=>"form-control","required"=>"required"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label(__('Perc Consulta:')) !!}
                        {!! Form::text("perccons_conv", $convenio->perccons_conv, ["class"=>"form-control","required"=>"required"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label(__('Perc Exame:')) !!}
                        {!! Form::text("percexame_conv", $convenio->percexame_conv, ["class"=>"form-control","required"=>"required"]) !!}
                    </div>

                    <div class="well well-sm clearfix">
                        <button class="btn btn-success pull-right" title="@lang('Salvar')"
                            type="submit">@lang('Alterar')</button>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script language='JavaScript'>
    $(".mmss").focusout(function () {
        var id = $(this).attr('id');
        var vall = $(this).val();
        var regex = /[^0-9]/gm;
        const result = vall.replace(regex, ``);
        $('#' + id).val(result);
    });
</script>
@endpush
