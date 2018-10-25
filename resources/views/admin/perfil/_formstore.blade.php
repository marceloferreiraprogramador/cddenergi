
<div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">sigla_perfil do Cliente</label>
            <div class="col-sm-8">
                <input required=""  type="text" name="sigla_perfil" id="sigla_perfil" class="form-control" >
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">codigo_perfil do Cliente</label>
            <div class="col-sm-8">
                <input required=""   type="text" name="codigo_perfil" id="codigo_perfil" class="form-control" >
            </div>
        </div>

          <div style="display: none" class="form-group">
            <label class="col-sm-2 control-label">CNPJ do Cliente</label>
            <div class="col-sm-8">
                <input value={{$sessao->cnpj_sessions}}  type="text" name="cnpj" id="cnpj" class="form-control" >
            </div>
        </div>
    </div>
