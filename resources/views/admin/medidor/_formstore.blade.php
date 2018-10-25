
<div class="box-body">
    <div class="form-group">
        <label class="col-sm-2 control-label">cod_medidor</label>
        <div class="col-sm-8">
            <input  required type="text" name="cod_medidor" id="cod_medidor" class="form-control" >
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">medidor_fontreira</label>
        <div class="col-sm-8">
            <input required type="text" name="medidor_fontreira" id="medidor_fontreira" class="form-control" >
        </div>
    </div>

      <div style="display: none"  class="form-group">
        <label class="col-sm-2 control-label">num_ativo</label>
        <div class="col-sm-8" >
            <input  value= "{{$sessao->num_ativo_sessions}}" pattern="[0-9]+" title="Apenas numeros" type="text" name="num_ativo" id="num_ativo" class="form-control" >
        </div>
    </div>
</div>

