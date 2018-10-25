<div class="box-body">
    <div class="form-group">
        <label class="col-sm-2 control-label">sigla_perfil do Cliente</label>
        <div class="col-sm-8">
            <input value= "{{$perfils->sigla_perfil}}" type="text" name="sigla_perfil" id="sigla_perfil" class="form-control" >
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">codigo_perfil do Cliente</label>
        <div class="col-sm-8">
            <input value= "{{$perfils->codigo_perfil}}" type="text" name="codigo_perfil" id="codigo_perfil" class="form-control" >
        </div>
    </div>

      <div style="display: none" class="form-group">
        <label class="col-sm-2 control-label">cnpj do Cliente</label>
        <div class="col-sm-8">
            <input value= "{{$perfils->cnpj}}" type="text" name="cnpj" id="cnpj" class="form-control" >
        </div>
    </div>
</div>


