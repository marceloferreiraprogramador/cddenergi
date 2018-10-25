
<div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">classe do ativo</label>
            <div class="col-sm-8">
                <input  value= "{{$ativos->class}}" type="text" name="class" id="class" class="form-control" >
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">name do ativo</label>
            <div class="col-sm-8">
                <input value= "{{$ativos->name}}" type="text" name="name" id="name" class="form-control" >
            </div>
        </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">num_ativo do ativo</label>
            <div class="col-sm-8">
                <input value= "{{$ativos->num_ativo}}" type="text" name="num_ativo" id="num_ativo" class="form-control" >
            </div>
        </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">ceg do ativo</label>
            <div class="col-sm-8">
                <input value= "{{$ativos->ceg}}" type="text" name="ceg" id="ceg" class="form-control" >
            </div>
        </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">concessionaria do ativo</label>
            <div class="col-sm-8">
                <input value= "{{$ativos->concessionaria}}" type="text" name="concessionaria" id="concessionaria" class="form-control" >
            </div>
        </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">desc_def_regulatorio do ativo</label>
            <div class="col-sm-8">
                <input value= "{{$ativos->desc_def_regulatorio}}" type="text" name="desc_def_regulatorio" id="desc_def_regulatorio" class="form-control" >
            </div>
        </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">submercado do ativo</label>
            <div class="col-sm-8">
                <input value= "{{$ativos->submercado}}" type="text" name="submercado" id="submercado" class="form-control" >
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">capacidade_instalada do ativo</label>
            <div class="col-sm-8">
                <input value= "{{$ativos->capacidade_instalada}}" type="text" name="capacidade_instalada" id="capacidade_instalada" class="form-control" >
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">quant_uni_geradora do ativo</label>
            <div class="col-sm-8">
                <input value= "{{$ativos->quant_uni_geradora}}" type="text" name="quant_uni_geradora" id="quant_uni_geradora" class="form-control" >
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">operacao_tst_apartir do ativo</label>
            <div class="col-sm-8">
                <input value= "{{$ativos->operacao_tst_apartir}}" type="text" name="operacao_tst_apartir" id="operacao_tst_apartir" class="form-control" >
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">operacao_comerc_apartir do ativo</label>
            <div class="col-sm-8">
                <input value= "{{$ativos->operacao_comerc_apartir}}" type="text" name="operacao_comerc_apartir" id="operacao_comerc_apartir" class="form-control" >
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">garantia_fisica do ativo</label>
            <div class="col-sm-8">
                <input type="RADIO" @if ($ativos->garantia_fisica != 'V') checked @endif  name="garantia_fisic" onClick="garantia_fisicaS()" id="garantia_fisic" class="form-RADIO" >Sim </br>
                <input type="RADIO" @if ($ativos->garantia_fisica == 'V') checked @endif name="garantia_fisic" onClick="garantia_fisicaN()" id="garantia_fisic" class="form-RADIO" >Não</br>
                <input value= "{{ $ativos->garantia_fisica }}" @if ($ativos->garantia_fisica != 'V')  style="display: hiden" @else style="display: none" @endif type="text" name="garantia_fisica" id="garantia_fisica" class="form-text" >

            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">f_dpi_fg do ativOOo</label>
            <div class="col-sm-8">
                <input type="RADIO" name="f_dpi_f" @if ($ativos->f_dpi_fg != 'V') checked @endif onClick="f_dpi_fgS()" id="f_dpi_f" class="form-RADIO" >Sim </br>
                <input type="RADIO" name="f_dpi_f" @if ($ativos->f_dpi_fg == 'V') checked @endif onClick="f_dpi_fgN()" id="f_dpi_f" class="form-RADIO" >Não</br>
                <input value= "{{ $ativos->f_dpi_fg }}" @if ($ativos->f_dpi_fg != 'V')  style="display: hiden" @else style="display: none" @endif type="text" name="f_dpi_fg" id="f_dpi_fg" class="form-text" >

            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">participa_mre do ativo</label>
            <div class="col-sm-8">
                <input type="RADIO" name="participa_mr"  @if ($ativos->participa_mre != 'V') checked @endif onClick="participa_mreS()" id="participa_mr" class="form-RADIO" >Sim </br>
                <input type="RADIO" name="participa_mr"  @if ($ativos->participa_mre == 'V') checked @endif onClick="participa_mreN()" id="participa_mr" class="form-RADIO" >Não</br>
                <input value= "{{ $ativos->participa_mre }}" @if ($ativos->participa_mre != 'V')  style="display: hiden" @else style="display: none" @endif type="text" name="participa_mre" id="participa_mre" class="form-text" >

            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">perdas_rede_basica do ativo</label>
            <div class="col-sm-8">
                <input type="RADIO" name="perdas_rede_basic" @if ($ativos->perdas_rede_basica != 'V') checked @endif onClick="perdas_rede_basicaS()" id="perdas_rede_basic" class="form-RADIO" >Sim </br>
                <input type="RADIO" name="perdas_rede_basic" @if ($ativos->perdas_rede_basica == 'V') checked @endif onClick="perdas_rede_basicaN()"id="perdas_rede_basic" class="form-RADIO" >Não</br>
                <input value= "{{ $ativos->perdas_rede_basica }}" @if ($ativos->perdas_rede_basica != 'V')  style="display: hiden" @else style="display: none" @endif type="text" name="perdas_rede_basica" id="perdas_rede_basica" class="form-text" >

            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">perdas_rede_compartilhada do ativo</label>
            <div class="col-sm-8">
                <input type="radio" name="perdas_rede_compartilhad"     @if ($ativos->perdas_rede_compartilhada != 'V') checked @endif onClick="perdas_rede_compartilhadaS()" id="perdas_rede_compartilhad" class="form-RADIO" >Sim</br>
                <input type="radio" name="perdas_rede_compartilhad"      @if ($ativos->perdas_rede_compartilhada == 'V') checked @endif onClick="perdas_rede_compartilhadaN()" id="perdas_rede_compartilhad" class="form-RADIO" >Não</br>
                <input value= "{{ $ativos->perdas_rede_compartilhada }}" @if ($ativos->perdas_rede_compartilhada != 'V')  style="display: hiden" @else style="display: none" @endif  type="text" name="perdas_rede_compartilhada" id="perdas_rede_compartilhada" class="form-text" >

            </div>
        </div>

        <div style="display:none" class="form-group">
            <label class="col-sm-2 control-label">id_perfil do ativo</label>
            <div class="col-sm-8">
                <input value={{ $ativos->id_perfil }} type="text" name="id_perfil" id="id_perfil" class="form-control" >
            </div>
        </div>
    </div>

    <script type="text/javascript">

        function perdas_rede_compartilhadaS() {
            $("#perdas_rede_compartilhada").show();
        }
        function perdas_rede_compartilhadaN() {
            $("#perdas_rede_compartilhada").hide();
            $("#perdas_rede_compartilhada").val('V');
        }


        function perdas_rede_basicaS() {
            $("#perdas_rede_basica").show();
        }
        function perdas_rede_basicaN() {
            $("#perdas_rede_basica").hide();
            $("#perdas_rede_basica").val('V');

        }


        function participa_mreS() {
            $("#participa_mre").show();
        }
        function participa_mreN() {
            $("#participa_mre").hide();
            $("#participa_mre").val('V');

        }


        function f_dpi_fgS() {
            $("#f_dpi_fg").show();
        }
        function f_dpi_fgN() {
            $("#f_dpi_fg").hide();
            $("#f_dpi_fg").val('V');

        }

        function garantia_fisicaS() {
            $("#garantia_fisica").show();
        }
        function garantia_fisicaN() {
            $("#garantia_fisica").hide();
            $("#garantia_fisica").val('V');

        }
    </script>
