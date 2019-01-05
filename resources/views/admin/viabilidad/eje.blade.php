@extends('admin.plantilla.main')
@section('title','Revisiones en terreno')
@section('marca2','active')

@section('content')
    <form action="{{route('admin.importar')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}         {{ method_field('POST') }}
        <div class="form-group row">
                <label for="importar" class="col-sm-2 col-form-label">Importar</label>
                <div class="col-sm-10">
                    {!!Form::file('importar',['class'=>'form-control-plaintext','readonly'] )!!}
                </div>
          </div>
          {!!Form::submit('Subir',['class'=>'btn btn-outline-primary'])!!}
    </form>    
@endsection
<!-- Modal --><!-- Modal --><!-- Modal --><!-- Modal --><!-- Modal --><!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"><strong>IMPORTAR / EXPORTAR</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.importar')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
            
                     <div class="form-group row">
                            <label for="exportar" class="col-sm-3 col-form-label">Exportar</label>
                            <div class="col-sm-9">
                                <a href="{{route('admin.exportar')}}" class="btn btn-primary btn-sm active  " role="button" aria-pressed="true" id="exportar">Exportar</a> 
                            </div>
                     </div>
                     <div class="form-group row">
                            <label for="importar" class="col-sm-3 col-form-label">Importar</label>
                            <div class="col-sm-9">
                                  {!!Form::file('importar',['class'=>'form-control-plaintext','readonly','id'=>'importar'] )!!}
                            </div>
                     </div>
            </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        {!!Form::submit('Subir',['class'=>'btn btn-primary'])!!}
                </div>
            </form>	
        </div>
    </div>
</div>
        <!-- Modal --><!-- Modal --><!-- Modal --><!-- Modal --><!-- Modal --><!-- Modal -->