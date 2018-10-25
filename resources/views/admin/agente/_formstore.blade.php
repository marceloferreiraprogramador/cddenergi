
<div class="box-body">
    <div class="form-group">
        <label class="col-sm-2 control-label">codigo_agente do Cliente</label>
        <div class="col-sm-8">
            <input required="" type="text" name="codigo_agente" id="codigo_agente" class="form-control" >
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">codigo_representante do Cliente</label>
        <div class="col-sm-8">
            <input required="" type="text" name="codigo_representante" id="codigo_representante" class="form-control" >
        </div>
    </div>

      <div style="display: none" class="form-group">
        <label class="col-sm-2 control-label">CNPJ do Cliente</label>
        <div class="col-sm-8">
            <input  value={{ $sessao->cnpj_sessions }} type="text" name="cnpj" id="cnpj" class="form-control" >
        </div>
    </div>

</div>

