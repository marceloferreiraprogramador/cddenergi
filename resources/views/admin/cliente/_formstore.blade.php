
<div class="box-body">
    <div class="form-group">
        <label class="col-sm-2 control-label">Nome do Cliente</label>
        <div class="col-sm-8">
            <input  required type="text" name="name" id="name" class="form-control" >
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Razão Social do Cliente</label>
        <div class="col-sm-8">
            <input required type="text" name="social" id="social" class="form-control" >
        </div>
    </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">CNPJ do Cliente</label>
        <div class="col-sm-8" >
            <input required pattern="[0-9]+" title="Apenas numeros" type="text" name="cnpj" id="cnpj" class="form-control" >
        </div>
    </div>
</div>
