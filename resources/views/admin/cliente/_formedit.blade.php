<div class="box-body">
    <div class="form-group">
        <label class="col-sm-2 control-label">Nome do Cliente</label>
        <div class="col-sm-8">
            <input value= "{{$clientes->name}}" type="text" name="name" id="name" class="form-control" >
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">social do Cliente</label>
        <div class="col-sm-8">
            <input value= "{{$clientes->social}}" type="text" name="social" id="social" class="form-control" >
        </div>
    </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">cnpj do Cliente</label>
        <div class="col-sm-8">
            <input value= "{{$clientes->cnpj}}" type="text" name="cnpj" id="cnpj" class="form-control" >
        </div>
    </div>
</div>


