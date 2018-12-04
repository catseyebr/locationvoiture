{include file='geral/header_home.tpl'}
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
{*{if $is_mobile}*}
{*<hr style="margin: 0 0 10px 0"/>*}
{*{/if}*}
<div class="hide_all" {if $is_mobile} style="margin-top: 59px;" {/if}>
    <div id="float_pesquisa_mbl" class="reveal-modal large" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog" style="background-color: transparent; padding: 0;">
        <a id="close_float_pesquisa_mbl" class="close-reveal-modal"></a>
        <div id="float_pesquisa_content">
            <div class="row collapse form-pesquisa-geral">
                <div class="large-12 columns tabletDeitadoIpada">
                    <div class="row form_pesquisa">
                        <form name="busca-carro_float" itemscope itemtype="http://schema.org/RentalCarReservation" id="busca-carro_float" method="get" action="https://www.carroaluguel.com/pesquisa-cidade">
                            <div class="large-6 small-12 columns col-dados1 ">
                                <div class="row">
                                    <div class="large-12 small-12 columns">
                                        <label for="retirar_cidade_float" style="color: black !important;"><strong>Retirar carro em:</strong></label>
                                        <input type="text" style="background-position: right 0.5rem center;" name="retirar_cidade_float" id="retirar_cidade_float" class="autocomplete-cidade new_imputTexto2" value="" onclick="{literal}if(this.value=='Digite a cidade'){this.value=''}{/literal}" onblur="{literal}if(this.value==''){this.value='Digite a cidade'}{/literal}"/>
                                        <input type="button" style="border: solid 1px #88c7f8 !important; border-left: none !important; margin-right: 0 !important;" name="limpa_texto" id="limpa_texto" class="new_botaoLimpador" onclick="limpador_texto_cidade_floar_mobile()">
                                        <input type="hidden" name="aero_retirada_float" id="aero_retirada_float" value="">
                                        <input type="hidden" name="sel_bairro_float" id="sel_bairro_float" value="">
                                    </div>
                                    <div class="large-6 small-12 columns">
                                        <label class="data"  style="color: black !important;">Data e hora de retirada:</label>
                                        <input type="text" style="background-image: url(/images/calendar-icon.png); background-repeat: no-repeat; background-position: 96%; border-color: #88c7f8!important;  background-color: #f6f7f9; font-size: 15px;" name="dataRetirada_float" id="dataRetirada_float" class="validate[required] data_retirada" value=""/>
                                        <select name="horaRetirada_float" style="border-color: #88c7f8!important; background-color: #f6f7f9; font-size: 15px; color: grey; background-image: url(/images/ico-relogio.png); -webkit-appearance: none; appearance: none; background-repeat: no-repeat; background-position: 96%; padding-left: 5px;" id="horaRetirada_float" class="postfix validate[required]">
                                            <option value="00:00">00:00</option>
                                            <option value="00:30">00:30</option>
                                            <option value="01:00">01:00</option>
                                            <option value="01:30">01:30</option>
                                            <option value="02:00">02:00</option>
                                            <option value="02:30">02:30</option>
                                            <option value="03:00">03:00</option>
                                            <option value="03:30">03:30</option>
                                            <option value="04:00">04:00</option>
                                            <option value="04:30">04:30</option>
                                            <option value="05:00">05:00</option>
                                            <option value="05:30">05:30</option>
                                            <option value="06:00">06:00</option>
                                            <option value="06:30">06:30</option>
                                            <option value="07:00">07:00</option>
                                            <option value="07:30">07:30</option>
                                            <option value="08:00">08:00</option>
                                            <option value="08:30">08:30</option>
                                            <option value="09:00">09:00</option>
                                            <option value="09:30">09:30</option>
                                            <option value="10:00">10:00</option>
                                            <option value="10:30">10:30</option>
                                            <option value="11:00">11:00</option>
                                            <option value="11:30">11:30</option>
                                            <option value="12:00" selected>12:00</option>
                                            <option value="12:30">12:30</option>
                                            <option value="13:00">13:00</option>
                                            <option value="13:30">13:30</option>
                                            <option value="14:00">14:00</option>
                                            <option value="14:30">14:30</option>
                                            <option value="15:00">15:00</option>
                                            <option value="15:30">15:30</option>
                                            <option value="16:00">16:00</option>
                                            <option value="16:30">16:30</option>
                                            <option value="17:00">17:00</option>
                                            <option value="17:30">17:30</option>
                                            <option value="18:00">18:00</option>
                                            <option value="18:30">18:30</option>
                                            <option value="19:00">19:00</option>
                                            <option value="19:30">19:30</option>
                                            <option value="20:00">20:00</option>
                                            <option value="20:30">20:30</option>
                                            <option value="21:00">21:00</option>
                                            <option value="21:30">21:30</option>
                                            <option value="22:00">22:00</option>
                                            <option value="22:30">22:30</option>
                                            <option value="23:00">23:00</option>
                                            <option value="23:30">23:30</option>
                                        </select>
                                    </div>
                                    <div class="large-6 small-12 columns">
                                        <label class="data"  style="color: black !important;">Data e hora de devolução:</label>
                                        <input type="text" style="background-image: url(/images/calendar-icon.png); background-repeat: no-repeat; background-position: 96%; border-color: #88c7f8!important;  background-color: #f6f7f9; font-size: 15px;" name="dataDevolucao_float" id="dataDevolucao_float" class="validate[required] date-devolucao" value=""/>
                                        <select name="horaDevolucao_float" style="border-color: #88c7f8!important; background-color: #f6f7f9; font-size: 15px; color: grey; background-image: url(/images/ico-relogio.png); -webkit-appearance: none; appearance: none; background-repeat: no-repeat; background-position: 96%; padding-left: 5px;" id="horaDevolucao_float" class="postfix validate[required]">
                                            <option value="00:00">00:00</option>
                                            <option value="00:30">00:30</option>
                                            <option value="01:00">01:00</option>
                                            <option value="01:30">01:30</option>
                                            <option value="02:00">02:00</option>
                                            <option value="02:30">02:30</option>
                                            <option value="03:00">03:00</option>
                                            <option value="03:30">03:30</option>
                                            <option value="04:00">04:00</option>
                                            <option value="04:30">04:30</option>
                                            <option value="05:00">05:00</option>
                                            <option value="05:30">05:30</option>
                                            <option value="06:00">06:00</option>
                                            <option value="06:30">06:30</option>
                                            <option value="07:00">07:00</option>
                                            <option value="07:30">07:30</option>
                                            <option value="08:00">08:00</option>
                                            <option value="08:30">08:30</option>
                                            <option value="09:00">09:00</option>
                                            <option value="09:30">09:30</option>
                                            <option value="10:00">10:00</option>
                                            <option value="10:30">10:30</option>
                                            <option value="11:00">11:00</option>
                                            <option value="11:30">11:30</option>
                                            <option value="12:00" selected>12:00</option>
                                            <option value="12:30">12:30</option>
                                            <option value="13:00">13:00</option>
                                            <option value="13:30">13:30</option>
                                            <option value="14:00">14:00</option>
                                            <option value="14:30">14:30</option>
                                            <option value="15:00">15:00</option>
                                            <option value="15:30">15:30</option>
                                            <option value="16:00">16:00</option>
                                            <option value="16:30">16:30</option>
                                            <option value="17:00">17:00</option>
                                            <option value="17:30">17:30</option>
                                            <option value="18:00">18:00</option>
                                            <option value="18:30">18:30</option>
                                            <option value="19:00">19:00</option>
                                            <option value="19:30">19:30</option>
                                            <option value="20:00">20:00</option>
                                            <option value="20:30">20:30</option>
                                            <option value="21:00">21:00</option>
                                            <option value="21:30">21:30</option>
                                            <option value="22:00">22:00</option>
                                            <option value="22:30">22:30</option>
                                            <option value="23:00">23:00</option>
                                            <option value="23:30">23:30</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="large-6 small-12 columns col-dados2" style="margin-top: -20px;">
                                <div class="row">
                                    <div class="large-12 small-12 columns arrumaTablet3">
                                        <div>
                                            <label for="devolver-outra_float"><input class="check_float" onclick="check_outro_local_float2(this)" type="checkbox" value="1" name="devolver_float" id="devolver-outra_float"/><span class="span_float"  style="color: black !important;">Devolver em uma cidade diferente</span></label>
                                            <div class="devOutro hide">
                                                <input type="text" style="background-image: url(/images/point-icon.png); background-repeat: no-repeat; background-position: right .3rem center; background-color: #f6f7f9; border: solid 1px #88c7f8 !important; border-radius: 4px !important; font-size: 15px;" name="cidade_devolucao_float" id="cidade_devolucao_float" value="" class="autocomplete-cidade"/>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn-pesquisa">
                                            <img src="/images/form_pesquisa_busca.png" alt="Pesquisar os melhores preços de aluguel de carros"/> Pesquisar os melhores preços
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="dialog-devolucao" class="reveal-modal small" data-options="closeOnBackgroundClick:false" style="display: none; border: 2px solid;">
        <p class="titulo" style="text-align: center; margin-top: 10px; color: #dd8442; font-size: 20px;">{$language.aviso_devolucao_titulo}</p>
        <a href="#" class="close-dialog-devolucao" onclick="$('#dialog-devolucao').foundation('reveal', 'close');"><img src="https://www.carroaluguel.com/images/avisoX.jpg" alt="fechar janela"></a>
        <div style="text-align: center;">
            <p>{$language.aviso_devolucao_primeiro}</p>

            <p>{$language.aviso_devolucao_segundo}</p>

            <a href="#" class="button btn-ciente" onclick="$('#dialog-devolucao').foundation('reveal', 'close');">{$language.aviso_devolucao_button}</a>

        </div>
    </div>

    <div class="row collapse" {if $is_mobile}style="margin-bottom: 20px; background-color: #f2f2f2;"{else}style="margin-bottom: 20px;"{/if}>
        {if $is_mobile}
            <h1 style="margin: 4px; margin-bottom: -40px; margin-top: 17px;">{$language.h1_mbl}</h1>
        {/if}

        <!--<div class="row collapse" style="text-align: center;">-->
        <!--{if $is_mobile}-->
        <!--{$logoLoc = "logo_locadoras_mbl"}-->
        <!--{$ajusteT = "ajuste_tam_mbl"}-->
        <!--{else}-->
        <!--{$logoLoc = "logo_locadoras"}-->
        <!--{$ajusteT = "ajuste_tam"}-->
        <!--{/if}-->

        <!--<div class="large-12 columns" {if $is_mobile}style="margin-left: -1%; margin-top: 5px;"{else}style="margin-bottom: 6px;"{/if}>-->
        <!--<div class="{$logoLoc}">-->
        <!--<img class="{$ajusteT}" src="/images/carroaluguel/locadoras/87x40/locadora-movida-rent-a-car.png">-->
        <!--</div>-->
        <!--<div class="{$logoLoc}">-->
        <!--<img class="{$ajusteT}" src="/images/carroaluguel/locadoras/87x40/locadora-localiza-rent-a-car.png"/>-->
        <!--</div>-->
        <!--<div class="{$logoLoc}">-->
        <!--<img class="{$ajusteT}" src="/images/carroaluguel/locadoras/87x40/locadora-unidas-rent-a-car.png"/>-->
        <!--</div>-->
        <!--<div class="{$logoLoc}">-->
        <!--<img class="{$ajusteT}" src="/images/carroaluguel/locadoras/87x40/locadora-alamo-rent-a-car.png">-->
        <!--</div>-->
        <!--<div class="{$logoLoc}">-->
        <!--<img class="{$ajusteT}" src="/images/carroaluguel/locadoras/87x40/locadora-avis-rent-a-car.png">-->
        <!--</div>-->
        <!--<div class="{$logoLoc}">-->
        <!--<img class="{$ajusteT}" src="/images/carroaluguel/locadoras/87x40/locadora-budget-rent-a-car.png"/>-->
        <!--</div>-->
        <!--<div class="{$logoLoc}">-->
        <!--<img class="{$ajusteT}" src="/images/carroaluguel/locadoras/87x40/locadora-foco-rent-a-car.png"/>-->
        <!--</div>-->
        <!--<div class="{$logoLoc}">-->
        <!--<img class="{$ajusteT}" src="/images/carroaluguel/locadoras/87x40/locadora-mister-car-rent-a-car.png"/>-->
        <!--</div>-->
        <!--</div>-->
    </div>
</div>


<div class="{if $is_mobile}faixa_pesquisa_header_mbl{else} faixa_pesquisa_header_v4{/if}" style="background-color: #f2f2f2;">
    <input type="hidden" name="trava_caixaPesq" id="trava_caixaPesq" value="{$trava_modalCTA}">
    <input type="hidden" name="trava_caixaBaixo" id="trava_caixaBaixo" value="{$arr_dados_cookie['cidade_dev']}">
    <input type="hidden" name="travaEspecial" id="travaEspecial" value="{$travaESPECIAL}">
    <form itemscope="" {if $is_mobile}style="background-color: #f2f2f2;"{/if} itemtype="http://schema.org/RentalCarReservation" name="busca-carro" id="busca-carro" method="get" action="https://www.carroaluguel.com/resultado">
        <div class="row" style="margin-top: 20px; {if $is_mobile} padding-top: 10px; padding-bottom: 10px; {/if}">
            <div class="small-11 large-12 small-centered medium-centered large-uncentered columns {if $is_mobile}new_fundoCaixa{/if}" style="border-radius: 4px; padding: 14px;">
                <div class="row collapse">
                    {if !$is_mobile}
                        <!--desktop-->
                        <div class="small-12 medium-5 large-5 columns">
                            <div class="row collapse tam_3" style="padding: 12px; padding-left: 22px; margin-right: 17%; width: 392px; background-color: white; border-radius: 2px; border: solid 1px #fc9a05;  min-height: 380px;">
                                <div class="small-12 columns">
                                    <span class="new_textos" style="font-size: 16px;">Selecione o local de retirada do veículo:</span>
                                </div>
                                <div class="small-12 columns">
                                    <input type="text" style="width: 91% !important; border-radius: 4px !important; border-right: solid 1px #88c7f8 !important;" name="retirar_cidade" id="retirar_cidade" class="autocomplete-cidade validate[required] new_imputTexto" value="{$arr_dados_cookie['cidade']}" onclick="{literal}if(this.value=='Digite a cidade'){this.value=''}{/literal}" onblur="{literal}if(this.value==''){this.value='Digite a cidade'}{/literal}">
                                    <input type="hidden" name="aero_retirada" id="aero_retirada" value="{$aero_var}">
                                    <input type="hidden" name="sel_bairro" id="sel_bairro" value="{$sel_bairro}">
                                    <input type="hidden" name="retirar_cidade-cid_hidden" id="retirar_cidade-cid_hidden" value="{$arr_dados_cookie['id_cid']}">
                                    <input type="hidden" name="retirar_cidade-ref_hidden" id="retirar_cidade-ref_hidden" value="cidade">
                                    <input type="hidden" name="retirar_cidade-val_hidden" id="retirar_cidade-val_hidden" value="{$arr_dados_cookie['id_cid']}">
                                    <input type="button" name="limpa_texto" id="limpa_texto" class="new_botaoLimpador2" onclick="limpador_texto_cidade()">
                                </div>
                                <div class="small-12 columns">
                                    <div class="outro_local hide">
                                        <div class="new_textos" style="margin-top: 10px; font-size: 15px;">Local diferente: </div>
                                        <input type="text" style="width: 98% !important; border-radius: 3px;" name="cidade_devolucao" id="cidade_devolucao" value="{$arr_dados_cookie['cidade_dev']}" class="autocomplete-cidade new_imputTexto_baixo outro_local"/>
                                        <input type="hidden" name="cidade_devolucao-cid_hidden" id="cidade_devolucao-cid_hidden" value="{$arr_dados_cookie['id_cid_dev']}">
                                        <input type="hidden" name="cidade_devolucao-ref_hidden" id="cidade_devolucao-ref_hidden" value="cidade">
                                        <input type="hidden" name="cidade_devolucao-val_hidden" id="cidade_devolucao-val_hidden" value="{$arr_dados_cookie['id_cid_dev']}">
                                    </div>
                                </div>
                                <div class="small-12 columns">
                                    <label for="devolver-outra" class="devolver_outra_check"><input type="checkbox" value="1" name="devolver" id="devolver-outra" onclick="check_outro_local(this)"/> <span class="texto_ne_check">{$language.pesquisa_cidade_devolucao}</span></label>
                                </div>
                                <div class="small-12 columns" style="margin-top: 10px;">
                                    <div class="new_textos"  style="font-size: 15px;"> Data e hora de retirada:</div>
                                </div>
                                <div class="small-12 columns">
                                    <div class="row collapse">
                                        <div class="small-6 columns">
                                            <input type="text" name="dataRetirada" id="dataRetirada" class="entrarDatePicker dataRetirada" value="" style="width: 92%; display: inline-block; margin-right: 5px !important;">
                                            <input type="hidden" name="dataRetirada_hdn" id="dataRetirada_hdn">
                                        </div>
                                        <div class="small-6 columns">
                                            <select style="width: 95% !important; margin-top: 4px !important;" name="horaRetirada" id="horaRetirada" class="retirada2">
                                                <option value="00:00">00:00</option>
                                                <option value="00:30">00:30</option>
                                                <option value="01:00">01:00</option>
                                                <option value="01:30">01:30</option>
                                                <option value="02:00">02:00</option>
                                                <option value="02:30">02:30</option>
                                                <option value="03:00">03:00</option>
                                                <option value="03:30">03:30</option>
                                                <option value="04:00">04:00</option>
                                                <option value="04:30">04:30</option>
                                                <option value="05:00">05:00</option>
                                                <option value="05:30">05:30</option>
                                                <option value="06:00">06:00</option>
                                                <option value="06:30">06:30</option>
                                                <option value="07:00">07:00</option>
                                                <option value="07:30">07:30</option>
                                                <option value="08:00">08:00</option>
                                                <option value="08:30">08:30</option>
                                                <option value="09:00">09:00</option>
                                                <option value="09:30">09:30</option>
                                                <option value="10:00">10:00</option>
                                                <option value="10:30">10:30</option>
                                                <option value="11:00">11:00</option>
                                                <option value="11:30">11:30</option>
                                                <option value="12:00" selected="">12:00</option>
                                                <option value="12:30">12:30</option>
                                                <option value="13:00">13:00</option>
                                                <option value="13:30">13:30</option>
                                                <option value="14:00">14:00</option>
                                                <option value="14:30">14:30</option>
                                                <option value="15:00">15:00</option>
                                                <option value="15:30">15:30</option>
                                                <option value="16:00">16:00</option>
                                                <option value="16:30">16:30</option>
                                                <option value="17:00">17:00</option>
                                                <option value="17:30">17:30</option>
                                                <option value="18:00">18:00</option>
                                                <option value="18:30">18:30</option>
                                                <option value="19:00">19:00</option>
                                                <option value="19:30">19:30</option>
                                                <option value="20:00">20:00</option>
                                                <option value="20:30">20:30</option>
                                                <option value="21:00">21:00</option>
                                                <option value="21:30">21:30</option>
                                                <option value="22:00">22:00</option>
                                                <option value="22:30">22:30</option>
                                                <option value="23:00">23:00</option>
                                                <option value="23:30">23:30</option>
                                            </select>
                                            <input type="hidden" name="horaRetirada_hdn" id="horaRetirada_hdn">
                                        </div>
                                    </div>
                                </div>
                                <div class="small-12 columns">
                                    <div class="new_textos"  style="font-size: 15px;"> Data e hora de devolução:</div>
                                </div>
                                <div class="small-12 columns">
                                    <div class="row collapse">
                                        <div class="small-6 columns">
                                            <input type="text" name="dataDevolucao" id="dataDevolucao" class="entrarDatePicker dataRetirada" value="" style="width: 92%; display: inline-block; margin-right: 5px !important;">
                                            <input type="hidden" name="dataDevolucao_hdn" id="dataDevolucao_hdn">
                                        </div>
                                        <div class="small-6 columns">
                                            <select style="width: 95% !important; margin-top: 4px !important;" name="horaDevolucao" id="horaDevolucao" class="retirada2">
                                                <option value="00:00">00:00</option>
                                                <option value="00:30">00:30</option>
                                                <option value="01:00">01:00</option>
                                                <option value="01:30">01:30</option>
                                                <option value="02:00">02:00</option>
                                                <option value="02:30">02:30</option>
                                                <option value="03:00">03:00</option>
                                                <option value="03:30">03:30</option>
                                                <option value="04:00">04:00</option>
                                                <option value="04:30">04:30</option>
                                                <option value="05:00">05:00</option>
                                                <option value="05:30">05:30</option>
                                                <option value="06:00">06:00</option>
                                                <option value="06:30">06:30</option>
                                                <option value="07:00">07:00</option>
                                                <option value="07:30">07:30</option>
                                                <option value="08:00">08:00</option>
                                                <option value="08:30">08:30</option>
                                                <option value="09:00">09:00</option>
                                                <option value="09:30">09:30</option>
                                                <option value="10:00">10:00</option>
                                                <option value="10:30">10:30</option>
                                                <option value="11:00">11:00</option>
                                                <option value="11:30">11:30</option>
                                                <option value="12:00" selected="">12:00</option>
                                                <option value="12:30">12:30</option>
                                                <option value="13:00">13:00</option>
                                                <option value="13:30">13:30</option>
                                                <option value="14:00">14:00</option>
                                                <option value="14:30">14:30</option>
                                                <option value="15:00">15:00</option>
                                                <option value="15:30">15:30</option>
                                                <option value="16:00">16:00</option>
                                                <option value="16:30">16:30</option>
                                                <option value="17:00">17:00</option>
                                                <option value="17:30">17:30</option>
                                                <option value="18:00">18:00</option>
                                                <option value="18:30">18:30</option>
                                                <option value="19:00">19:00</option>
                                                <option value="19:30">19:30</option>
                                                <option value="20:00">20:00</option>
                                                <option value="20:30">20:30</option>
                                                <option value="21:00">21:00</option>
                                                <option value="21:30">21:30</option>
                                                <option value="22:00">22:00</option>
                                                <option value="22:30">22:30</option>
                                                <option value="23:00">23:00</option>
                                                <option value="23:30">23:30</option>
                                            </select>
                                            <input type="hidden" name="horaDevolucao_hdn" id="horaDevolucao_hdn">
                                        </div>
                                    </div>
                                </div>
                                <div class="large-12 small-12 columns">
                                    <label class="data" style="color: black; margin-top: 7px; font-size: 15px;"><strong>Código promocional (opcional)</strong></label>
                                    <input type="text" placeholder="Digite seu cupom de desconto" style="color:  #808080!important; margin-top: 5px!important; font-size: 16px!important; background-color: #f6f7f9!important; background-repeat: no-repeat; background-position: right .3rem center; border-color: #88c7f8!important; background-image: url(/images/carroaluguel/hotsites/ico-cod.png); border-radius: 3px; width: 98%;" name="cod_promocional" id="cod_promocional" value=""/>
                                </div>
                                <div class="large-12 small-12 columns">
                                    <button type="submit" class="btn-pesquisa_20" style="margin-top: 15px; margin-bottom: 5px;font-weight: bold; margin-left: 0; width: 98%;">
                                        <img src="/images/form_pesquisa_busca.png" alt="Buscar">
                                        <span style="float: inherit !important;" class="tamanho_nome_botao_pesquisa"> BUSCAR VEÍCULOS </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="small-12 medium-7 large-7 columns" style="margin-right: -5%; width: 61%;">
                            <h1 style="font-family: 'Lato', sans-serif; text-transform: uppercase; color: #fa7300; font-weight: bold; font-size: 38px; line-height: 42px !important;">
                                {$language.h1}
                            </h1>
                            <h2 style="font-family: 'Lato', sans-serif; font-size: 21px; margin-left: 39px; color: #4c4c4c; margin-top: 2px;">
                                {$language.frase_h1}
                            </h2>
                            <img  style="width: 843px; max-width: 900px; margin-right: -139px;" src="/images/carroaluguel/back_car_v4.png">
                        </div>
                    {else}
                        <!--mobile-->
                        <div class="hide-for-large-up small-12 columns">
                       <span class="new_textos">
                           Selecione o local de retirada do veículo:
                       </span>
                            <input type="text" name="retirar_cidade" id="retirar_cidade" class="autocomplete-cidade validate[required] new_imputTexto input_pesquisa_ne_mbl" value="" onclick="{literal}if(this.value=='Digite a cidade'){this.value=''}{/literal}" onblur="{literal}if(this.value==''){this.value='Digite a cidade'}{/literal}">
                            <input type="button" name="limpa_texto" id="limpa_texto" class="new_botaoLimpador_mbl" onclick="limpador_retira_cidade_mbl_ne()">
                            <input type="hidden" name="aero_retirada" value="{$aero_var}">
                            <input type="hidden" name="sel_bairro" id="sel_bairro" value="{$sel_bairro}">
                            <input type="checkbox" class="check_ne_mbl" onclick="mbl_check_outro_local_ne(this)">
                            <span class="new_textoCheckBox_mbl">Devolver veículo em outra cidade</span>
                            <div class="large-12 columns outro_local_mbl hide" style="margin-top: 10px;">
                                <span class="new_textos">Local diferente</span>
                                <input type="text" name="cidade_devolucao" id="cidade_devolucao" class="autocomplete-cidade validate[required] input_pesquisa_ne_mbl_baixo">
                            </div>
                            <div class="large-12 columns" style="margin-top: 6px;">
                                <span class="new_textos">Data e hora de retirada:</span>
                            </div>
                            <div class="small-6 columns">
                                <input type="text" name="dataRetirada" id="dataRetirada" class="mbl_entrarDatePicker dataRetirada" value="">
                            </div>
                            <div class="small-6 columns">
                                <select name="horaRetirada" id="horaRetirada" class="mbl_retirada2">
                                    <option value="00:00">00:00</option>
                                    <option value="00:30">00:30</option>
                                    <option value="01:00">01:00</option>
                                    <option value="01:30">01:30</option>
                                    <option value="02:00">02:00</option>
                                    <option value="02:30">02:30</option>
                                    <option value="03:00">03:00</option>
                                    <option value="03:30">03:30</option>
                                    <option value="04:00">04:00</option>
                                    <option value="04:30">04:30</option>
                                    <option value="05:00">05:00</option>
                                    <option value="05:30">05:30</option>
                                    <option value="06:00">06:00</option>
                                    <option value="06:30">06:30</option>
                                    <option value="07:00">07:00</option>
                                    <option value="07:30">07:30</option>
                                    <option value="08:00">08:00</option>
                                    <option value="08:30">08:30</option>
                                    <option value="09:00">09:00</option>
                                    <option value="09:30">09:30</option>
                                    <option value="10:00">10:00</option>
                                    <option value="10:30">10:30</option>
                                    <option value="11:00">11:00</option>
                                    <option value="11:30">11:30</option>
                                    <option value="12:00" selected="">12:00</option>
                                    <option value="12:30">12:30</option>
                                    <option value="13:00">13:00</option>
                                    <option value="13:30">13:30</option>
                                    <option value="14:00">14:00</option>
                                    <option value="14:30">14:30</option>
                                    <option value="15:00">15:00</option>
                                    <option value="15:30">15:30</option>
                                    <option value="16:00">16:00</option>
                                    <option value="16:30">16:30</option>
                                    <option value="17:00">17:00</option>
                                    <option value="17:30">17:30</option>
                                    <option value="18:00">18:00</option>
                                    <option value="18:30">18:30</option>
                                    <option value="19:00">19:00</option>
                                    <option value="19:30">19:30</option>
                                    <option value="20:00">20:00</option>
                                    <option value="20:30">20:30</option>
                                    <option value="21:00">21:00</option>
                                    <option value="21:30">21:30</option>
                                    <option value="22:00">22:00</option>
                                    <option value="22:30">22:30</option>
                                    <option value="23:00">23:00</option>
                                    <option value="23:30">23:30</option>
                                </select>
                            </div>
                            <div class="large-12 columns" style="margin-top: 6px;">
                                <span class="new_textos">Data e hora de devolução:</span>
                            </div>
                            <div class="small-6 columns">
                                <input type="text" name="dataDevolucao" id="dataDevolucao" class="mbl_entrarDatePicker dataRetirada" value="">
                            </div>
                            <div class="small-6 columns">
                                <select name="horaDevolucao" id="horaDevolucao" class="mbl_retirada2">
                                    <option value="00:00">00:00</option>
                                    <option value="00:30">00:30</option>
                                    <option value="01:00">01:00</option>
                                    <option value="01:30">01:30</option>
                                    <option value="02:00">02:00</option>
                                    <option value="02:30">02:30</option>
                                    <option value="03:00">03:00</option>
                                    <option value="03:30">03:30</option>
                                    <option value="04:00">04:00</option>
                                    <option value="04:30">04:30</option>
                                    <option value="05:00">05:00</option>
                                    <option value="05:30">05:30</option>
                                    <option value="06:00">06:00</option>
                                    <option value="06:30">06:30</option>
                                    <option value="07:00">07:00</option>
                                    <option value="07:30">07:30</option>
                                    <option value="08:00">08:00</option>
                                    <option value="08:30">08:30</option>
                                    <option value="09:00">09:00</option>
                                    <option value="09:30">09:30</option>
                                    <option value="10:00">10:00</option>
                                    <option value="10:30">10:30</option>
                                    <option value="11:00">11:00</option>
                                    <option value="11:30">11:30</option>
                                    <option value="12:00" selected="">12:00</option>
                                    <option value="12:30">12:30</option>
                                    <option value="13:00">13:00</option>
                                    <option value="13:30">13:30</option>
                                    <option value="14:00">14:00</option>
                                    <option value="14:30">14:30</option>
                                    <option value="15:00">15:00</option>
                                    <option value="15:30">15:30</option>
                                    <option value="16:00">16:00</option>
                                    <option value="16:30">16:30</option>
                                    <option value="17:00">17:00</option>
                                    <option value="17:30">17:30</option>
                                    <option value="18:00">18:00</option>
                                    <option value="18:30">18:30</option>
                                    <option value="19:00">19:00</option>
                                    <option value="19:30">19:30</option>
                                    <option value="20:00">20:00</option>
                                    <option value="20:30">20:30</option>
                                    <option value="21:00">21:00</option>
                                    <option value="21:30">21:30</option>
                                    <option value="22:00">22:00</option>
                                    <option value="22:30">22:30</option>
                                    <option value="23:00">23:00</option>
                                    <option value="23:30">23:30</option>
                                </select>
                            </div>
                            <div class="large-12 columns" style="margin-top: 12px;">
                                <button type="submit" class="mbl_btn-pesquisa_20">
                                    <div>
                                        <img src="/images/form_pesquisa_busca.png" alt="Buscar">
                                        <span class="mbl_tamanho_nome_botao_pesquisa"> BUSCAR VEÍCULOS </span>
                                    </div>
                                </button>
                            </div>
                            <div class="large-12 columns">
                                <div class="row collapse">
                                    <div class="large-12 columns">
                                        <span class="mlb_reserve" style="font-size: 12px; color: grey;">Reserve também pelo telefone:</span>
                                    </div>

                                    <div class="large-12 columns" style="text-align: center;">
                                        <img src="/images/carroaluguel/phone-icon-nh.png" style="display: inline-block; height: 20px; width: 20px; margin-top: -20px; margin-right: 7px;">
                                        <a href="tel:40620633" class="mbl_telefone" style="font-family: sans-serif;">4062-0633</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {/if}
                </div>
            </div>
        </div>
    </form>
</div>

{if !$is_mobile}
    <div class="faixa_back_header_v3 testeoi">
        <div class="row">
            <div class="large-12 large-centered columns">
                <div class="row">
                    <div class="large-4 columns" style="margin-left: -8.5%;">
                        <img style="margin-top: 8.5%;" src="/images/carroaluguel/check_branco_v3.png">
                        <span style="display: block; margin-left: 39px; margin-top: -33px; color: white; font-size: 15px;">
                        Pague mais barato que na loja,
                    </span>
                        <span style="display: block; margin-left: 39px; margin-top: 4px; color: white; font-size: 15px;">
                        sem taxas de alteração ou cancelamento.
                    </span>
                    </div>
                    <div class="large-4 columns" style="margin-left: 12%;">
                        <img style="margin-top: 8.5%;" src="/images/carroaluguel/check_branco_v3.png">
                        <span style="display: block; margin-left: 39px; margin-top: -33px; color: white; font-size: 15px;">
                       Aluguel em menos de 3 minutos
                    </span>
                        <span style="display: block; margin-left: 39px; margin-top: 4px; color: white; font-size: 15px;">
                        de forma simples e segura.
                    </span>
                    </div>
                    <div class="large-4 columns" style="margin-right: -7%; width: 30%;">
                        <img style="margin-top: 8.5%;" src="/images/carroaluguel/check_branco_v3.png">
                        <span style="display: block; margin-left: 39px; margin-top: -33px; color: white; font-size: 15px;">
                       Não precisa usar cartão no site,
                    </span>
                        <span style="display: block; margin-left: 39px; margin-top: 4px; color: white; font-size: 15px;">
                        pague apenas quando for retirar o carro.
                    </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
{/if}

{if $is_mobile}
    <div class="row" style="margin-top: 20px;">
        <div class="large-12 columns">
            <span class="texto_ticks_mbl">3 motivos para alugar um carro:</span>
        </div>
        <div class="row collapse">
            <div class="small-9 small-centered columns">
                <div class="large-12 columns arrTabletEsp" style="margin-top: 15px">
                    <img style="width: 21px;" src="/images/carroaluguel/tax-icon-nh.png"/>
                    <div class="row collapse" style="text-align: left;  width: 88%; float: right; margin-left: 2px;">
                        <span class="tabletTam" style="display: inline; font-size: 11.5px; color: #005a9f;">Sem taxas de alteração e cancelamento;</span>
                    </div>
                </div>
                <div class="large-12 columns" style="margin-top: 10px !important;">
                    <img style="width: 21px;" src="/images/carroaluguel/car-icon-nh.png"/>
                    <div class="row collapse" style="text-align: left;  width: 88%; float: right; margin-left: 2px;">
                        <span class="tabletTam" style="display: inline; font-size: 11.5px; color: #005a9f;">Compare os melhores preços em dezenas de locadoras e reserve online;</span>
                    </div>
                </div>
                <div class="large-12 columns" style="margin-top: 10px !important;">
                    <img style="width: 21px;" src="/images/carroaluguel/price-icon-nh.png"/>
                    <div class="row collapse" style="text-align: left;  width: 88%; float: right; margin-left: 2px;">
                        <span class="tabletTam" style="display: inline; font-size: 11.5px; color: #005a9f;">Negociamos as melhores tarifas para você encontrar tudo em apenas um lugar.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
{/if}

{if !$is_mobile}
    <div class="h2_novo_fundo" style="margin-top: 20px;">
        <hr class="hr_titulo"><h2 class="h2_novo_branco">{$language.destaque_cidades_title}</h2><hr class="hr_titulo">
    </div>
    <div class="faixa_passos">
        <div class="row collapse" style="margin-bottom: 40px;">
            <div class="large-12 columns">
                <div id="cidades-slick" style="height: 230px; margin-bottom: 40px; display: none;">

                    {foreach from=$json_cidades item=cidade}
                        <div style="margin-right: 15px; margin-left: 15px; position: inherit; border: solid 1px #e0e1e1; cursor: pointer;">
                            <h3 style="padding: 10px; background: #ff7900; width: 70%; position: absolute; color: #fff; font-weight: 600; font-size: 17px; text-align: center; display: block; margin-left: 14.5%; margin-top: 40%;"><a style="color: #fcfcfc !important; font-weight: 600; font-size: 17px;" onclick="Click_float_pesquisa()">{$cidade['nome']}</a></h3>
                            <a onclick="Click_float_pesquisa()"><img src="{$cidade['imagem']}" style="width: 100%; alt="{$cidade['alt']}"></a>
                            <div>

                                <div class="hover_carrossel" onclick="Click_float_pesquisa()" itemscope="" itemtype="http://schema.org/Product" style="font-size: 14px; color: #6E6E6E; padding-top: 36px; height: 64px;">
                                    <a onclick="Click_float_pesquisa()" style="color: black;">
                                        <span style="margin-left: 10px;" itemprop="name">{$cidade["categoria"][0][1]}</span>
                                        <span style="margin-right: 10px; float: right; color: rgba(69, 122, 26, 0.8);font-size: 12px;" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                        R$ <span style="font-size: 14px;" itemprop="price">{$cidade["categoria"][0][2]}/</span>dia
                                    </span>
                                    </a>
                                </div>

                                <hr style="margin-bottom: 1px; margin-top: 1px; border: solid 1px rgba(116, 117, 118, 0.22); width: 95%;  text-align: center; margin-left: 10px;">

                                <div class="hover_carrossel" onclick="Click_float_pesquisa()" itemscope="" itemtype="http://schema.org/Product" style="font-size: 14px; color: #6E6E6E; padding-top: 10px; height: 34px;">
                                    <a onclick="Click_float_pesquisa()" style="color: black;">
                                        <span style="margin-left: 10px;" itemprop="name">{$cidade["categoria"][1][1]}</span>
                                        <span style="margin-right: 10px; float: right; color:rgba(69, 122, 26, 0.8); font-size: 12px;" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                        R$ <span style="font-size: 14px;" itemprop="price">{$cidade["categoria"][1][2]}/</span>dia
                                    </span>
                                    </a>
                                </div>

                                <hr style="margin-bottom: 1px; margin-top: 1px; border: solid 1px rgba(116, 117, 118, 0.22); width: 95%;  text-align: center; margin-left: 10px;">

                                <div class="hover_carrossel" onclick="Click_float_pesquisa()" itemscope="" itemtype="http://schema.org/Product" style="font-size: 14px; padding-top: 10px; height: 34px;">
                                    <a onclick="Click_float_pesquisa()" style="color: #000000;">
                                        <span style="margin-left: 10px;" itemprop="name">{$cidade["categoria"][2][1]}</span>
                                        <span style="margin-right: 10px; float: right; color: rgba(69, 122, 26, 0.8); font-size: 12px;" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                        R$ <span style="font-size: 14px;" itemprop="price">{$cidade["categoria"][2][2]}/</span>dia
                                    </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    {/foreach}

                </div>
                {*<div class="row collapse">*}
                {*<div class="small-8 large-centered columns">*}
                {*<div class="row collapse" style="margin: 20px 0">*}
                {*<div class="small-6 columns texto_preco_baixo">*}
                {*{$language.destaque_cidades_frase}*}
                {*</div>*}
                {*<div class="small-4 columns">*}
                {*<button class="buscar_cotacao button">{$language.destaque_cidades_button}</button>*}
                {*</div>*}
                {*<div class="small-2 columns"></div>*}
                {*</div>*}
                {*</div>*}
                {*</div>*}
            </div>
        </div>
    </div>
    <div class="row collapse">
        <div class="large-12 columns fundoCTA-desk">
            <div class="large-7 columns">
                <img src="/images/icon-info.png">
                <span class="txt_CTAdesk">Tarifas válidas para hoje, locações entre <span style="font-weight: bold;">1 e 6 dias,</span> sujeitas a alteração e disponibilidade.<span style="display: block;"> Os preços para locações superiores a 6 diárias ficam <span style="font-weight: bold;">mais baratas</span> quanto mais tempo utilizar o carro.<span style="font-weight: bold;"> Confira!</span></span></span>
            </div>
            <div class="large-5 columns">
                <button type='submit' class='botao_frota_ne' onclick='Click_float_pesquisa()'>FAÇA SUA COTAÇÃO AGORA</button>
            </div>
        </div>
    </div>
{/if}

{if !$is_mobile}
    <div class="large-12 columns" style="margin-bottom: -15px;">
        <h2 class="comentarios_title">
            Mais de 170.000 clientes satisfeitos desde 2008
        </h2>
    </div>
    <div class="faixa_passos fundo_comentarios">
        <div class="row collapse">
            <div class="large-12 columns">
                <div id="comentarios-slick" style="margin-bottom: 10px;">

                    <div>

                        <div class="comentarios_orbit comentarios_primeiro">
                            "Só tenho palavras de agradecimento, fiquei muito tranquila com a locação."
                            <br>
                            <span class="nome_comentarios">Ana Amélia - 21/03/2016</span>
                        </div>

                    </div>
                    <div>

                        <div class="comentarios_orbit comentarios_primeiro">
                            "Gostei muito do trabalho oferecido para uma locaçao rápida e de confiança."
                            <br>
                            <span class="nome_comentarios">João Paulo - 13/05/2016</span>
                        </div>

                    </div>
                    <div>

                        <div class="comentarios_orbit comentarios_primeiro">
                            "Tive muita satisfação e agilidade na minha locação, recomento a todos."
                            <br>
                            <span class="nome_comentarios">Rodrigo Yamada - 01/07/2016</span>
                        </div>

                    </div>
                    <div>

                        <div class="comentarios_orbit comentarios_primeiro">
                            "A locação aconteceu muito bem e muito rápida, me surprieendi."
                            <br>
                            <span class="nome_comentarios">Joaquina Sampaio - 19/07/2016</span>
                        </div>

                    </div>
                    <div>

                        <div class="comentarios_orbit comentarios_primeiro">
                            "O serviço oferecido pela carroaluguel.com é de uma ótima qualidade."
                            <br>
                            <span class="nome_comentarios">Larissa Schmidtz - 03/09/2016</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
{/if}


<div class="small-12 columns hide-for-small hide-for-medium">
    <div class="separador_banner_conteudo">
        <h1 class="texto_separador">
            Faça tudo de forma simples, rápida e segura
            <span class="texto_separador_baixo" style="font-weight: normal;"> Você não usa o cartão no site e não paga nada para alterar ou cancelar sua reserva.</span>
        </h1>
    </div>
</div>

<div class="show-for-medium-up" style="padding: 20px 0;">
    <div class="row">
        <div class="large-12 columns arruma_tablet" style="margin-bottom: 20px;">
            <ul>
                <li class="passo1_tamanho tablet_passos">
                    <div class="row linha_passos">
                        <div class="medium-5 large-5 medium-offset-1 large-offset-1 columns">
                            <img src="//www.carroaluguel.tur.br/images/carroaluguel/lp-locadoras/imgpassos_pesquise.jpg" alt="Pesquise no CarroAluguel">
                        </div>
                        <div class="medium-5 large-5 columns">
                            <div class="passos_block">
                                        <span class="title_passos tablet_passos2">
                                            <b>Passo 1</b> - Pesquise o menor preço
                                        </span>
                                <p>Quem aluga pela CARROALUGUEL <b>paga menos do que quem aluga direto no balcão.</b> O motivo: nós negociamos grandes volumes e por isso <b>garantimos vantagens comerciais exclusivas</b> para nossos clientes.</p>
                            </div>
                        </div>
                        <div class="medium-1 large-1 hide-for-small columns">
                        </div>
                    </div>
                </li>

                <li class="passo2_tamanho tablet_passos">
                    <div class="row linha_passos">
                        <div class="medium-5 large-5 medium-offset-1 large-offset-1 medium-pull-5 columns">
                            <div class="passos_block">
                                        <span class="title_passos tablet_passos2">
                                            <b>Passo 2</b> - Reserve seu veículo
                                        </span><p>
                                    <b>Receba o voucher da sua locação por email.</b> Se <b>precisar alterar data ou hora</b> da sua locação, sem problemas! Faça pelo site acessando sua conta. Você <b>não pagará absolutamente nada. Nenhuma taxa ou multa.</b></p>
                            </div>
                        </div>
                        <div class="medium-5 large-5 medium-push-6 columns">
                            <img src="//www.carroaluguel.tur.br/images/carroaluguel/lp-locadoras/imgpassos_reserve.jpg" alt="Reserve no CarroAluguel">
                        </div>
                        <div class="medium-1 large-1 hide-for-small columns">
                        </div>
                    </div>
                </li>

                <li class="passo3_tamanho tablet_passos">
                    <div class="row linha_passos" style="margin-bottom: -44px;">
                        <div class="medium-5 large-5 medium-offset-1 large-offset-1 medium-order-1 columns">
                            <img src="//www.carroaluguel.tur.br/images/carroaluguel/lp-locadoras/imgpassos_retire.jpg" alt="Retire seu veículo na locadora">
                        </div>
                        <div class="medium-5 large-5 medium-order-2 columns">
                            <div class="passos_block">
                                        <span class="title_passos tablet_passos2">
                                            <b>Passo 3</b> - Retire seu veículo
                                        </span>
                                <p>A locadora já <b>estará ciente da sua reserva.</b> Tudo o que você precisa fazer para retirar o carro é <b>apresentar o voucher que recebeu por e-mail e o seu cartão de crédito</b> na loja. Fácil, não?</p>
                            </div>
                        </div>
                        <div class="medium-1 large-1 hide-for-small columns">
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</div>
<div class="propaganda_maior">
    <div class="row">
        <div class="show-for-medium-up faixa_maior_buscador">
            <div class="large-12 columns">
                <div class="large-7 small-12 columns">
                    <span class="seta_voucher hide-for-medium-only" style="margin-left: 80px;  margin-top: 310px;"></span>
                    <h2 style="font-size: 2.2em; color: #005a9f; margin-bottom: 25px; font-weight: bold; line-height: 34px;">Somos o maior buscador de preços para aluguel de carros no Brasil</h2>
                    <p class="texto_prop">Quando você aluga um carro pela CARROALUGUEL usa a nossa tecnologia para pesquisar os preços das maiores locadoras do mundo: são mais de 80 empresas pesquisadas. Pesquise, escolha a melhor oferta e faça sua locação, tudo pelo nosso site.</p>
                    <p class="texto_prop">Assim que concluir sua locação você receberá por email, na forma de um Voucher, todas as informações necessárias para retirar o seu carro na locadora escolhida. Apresente o Voucher na locadora junto com seus documentos.</p>
                </div>
                <div class="large-5 small-12 columns">
                    <img src="//www.carroaluguel.tur.br/images/carroaluguel/lp-locadoras/maior_buscador.png" alt="Voucher de confirmação de reserva" title="Voucher de confirmação de reserva" style="display:block;">
                </div>
            </div>
        </div>
    </div>
</div>


{if !$is_mobile}

    <div class="h2_novo_fundo2">
        <div class="row">
            <div class="large-11 columns"><h2 class="h2_novo_branco2">Saiba o que é preciso para alugar um carro no Brasil</h2></div>
            <div class="large-1 columns">&nbsp;</div>
        </div>
    </div>
    <div class="row collapse" style="margin-top: 20px;">
        <div class="large-6 columns">
            <ul class="requisitos-carroaluguel" style="margin-right: 20px;">
                <li>
                    <span>Ter 21 anos completos;</span>
                </li>
                <li>
                    <span>Rg e CPF originais (estrangeiros: passaporte original);</span>
                </li>
                <li>
                    <span>Portar cartão de crédito de sua titularidade, dentro da validade, com limite disponível para débito da caução (*) ou o valor total da locação (o que for maior);</span>
                </li>
                {*<li>*}
                {*<span>Atenção: Cartões aceitos nas locadoras (sujeito a verificação)</span>*}
                {*<div style="display:block;margin: 10px 0;">*}
                {*<span class="sprite_cc mbl_sprite_cc_visa"></span>*}
                {*<span class="sprite_cc mbl_sprite_cc_master"></span>*}
                {*<span class="sprite_cc mbl_sprite_cc_american"></span>*}
                {*<span class="sprite_cc mbl_sprite_cc_dinners"></span>*}
                {*<span class="sprite_cc mbl_sprite_cc_elo"></span>*}
                {*</div>*}
                {*</li>*}
                <li>
                    <span>O responsável pela locação não pode ter restrição financeira no CPF;</span>
                </li>
            </ul>
        </div>

        <div class="large-6 columns">
            <ul class="requisitos-carroaluguel">
                <li>
                    <span>Apresentar carteira nacional de habilitação (CNH) original e válida, expedida há no mínimo 2 anos, estrangeiros podem apresentar carteira de habilitação emitida no país de origem (ideal que seja acompanhada de uma carteira internacional de habilitação);</span>
                </li>
                <li>
                    <span>Importante: CNH vencida, mas ainda dentro dos 30 dias permitidos pelos órgãos de trânsito não é aceita pelas locadoras de automóveis;</span>
                </li>
                <li>
                    <span>Desejável que o cliente porte um comprovante de endereço original.</span>
                </li>
            </ul>
        </div>

        <div class="large-12 columns">
            <div class="caucao_desc" style="margin-top: -10px; padding-top: 15px; padding-bottom: 0.1px;">
                <p class="texto_prop" style="text-decoration: underline">
                    *O que é a caução?
                </p>
                <p class="texto_prop">
                    Para alugar um carro é preciso autorizar o valor de uma caução no seu cartão de crédito. Ela serve para preservar tanto o serviço contratado quanto o próprio cliente, que tem o direito de estornar o valor da caução após a entrega do produto ou serviço sem danos. Lembre-se, não é possível realizar o serviço de locação caso a garantia em cartão de crédito não seja deixada na loja onde se retira o carro.
                </p>
            </div>
        </div>
    </div>
{/if}

{if $is_mobile}
    <div class="h2_novo_fundo" style="background-color: #f2f2f2;">
        <!--<hr class="hr_tituloMBL">-->
        <h2 class="h2_novo_brancoMBL">{$language.destaque_cidades_title}</h2>
        <!--<hr class="hr_tituloMBL">-->
    </div>
    <div class="fundo_carrosselMBL">
        <div class="row collapse">
            <div class="large-12 columns">
                <div id="cidades-slick-mbl" style="margin-bottom: -22px;  margin-top: 15px; background-color: #f2f2f2; height: 300px;">

                    {foreach from=$json_cidades item=cidade}
                        <div>

                            <div class="frota_mbl_quadrado comentarios_primeiro">
                                <a onclick="Click_float_pesquisa_mbl()"><img src="{$cidade['imagem']}" style="width: 100%; alt="{$cidade['alt']}"></a>
                                <h3 class="h3_mbl_frota"><a style="color: #fcfcfc !important; font-weight: 600; font-size: 17px;" onclick="Click_float_pesquisa_mbl()">{$cidade['nome']}</a></h3>
                                <div>

                                    <div class="hover_carrossel" itemscope="" itemtype="http://schema.org/Product" style="font-size: 14px; color: #6E6E6E; padding-top: 36px; height: 64px;">
                                        <a onclick="Click_float_pesquisa_mbl()" style="color: black;">
                                            <span style="font-size: 13px; margin-left: 10px;" itemprop="name">{$cidade["categoria"][0][1]}</span>
                                            <span style="margin-right: 10px; float: right; color: rgba(69, 122, 26, 0.8);font-size: 12px;" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                        R$ <span style="font-size: 13px;" itemprop="price">{$cidade["categoria"][0][2]}/</span>dia
                                    </span>
                                        </a>
                                    </div>

                                    <hr style="margin-bottom: 1px; margin-top: 1px; border: solid 1px rgba(116, 117, 118, 0.22); width: 90%;  text-align: center; margin-left: 10px;">

                                    <div class="hover_carrossel" itemscope="" itemtype="http://schema.org/Product" style="font-size: 14px; color: #6E6E6E; padding-top: 10px; height: 34px;">
                                        <a onclick="Click_float_pesquisa_mbl()" style="color: black;">
                                            <span style="font-size: 13px; margin-left: 10px;" itemprop="name">{$cidade["categoria"][1][1]}</span>
                                            <span style="margin-right: 10px; float: right; color:rgba(69, 122, 26, 0.8); font-size: 12px;" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                        R$ <span style="font-size: 13px;" itemprop="price">{$cidade["categoria"][1][2]}/</span>dia
                                    </span>
                                        </a>
                                    </div>

                                    <hr style="margin-bottom: 1px; margin-top: 1px; border: solid 1px rgba(116, 117, 118, 0.22); width: 90%;  text-align: center; margin-left: 10px;">

                                    <div class="hover_carrossel" itemscope="" itemtype="http://schema.org/Product" style="font-size: 14px; padding-top: 10px; height: 34px;">
                                        <a onclick="Click_float_pesquisa_mbl()" style="color: #000000;">
                                            <span style="font-size: 13px; margin-left: 10px;" itemprop="name">{$cidade["categoria"][2][1]}</span>
                                            <span style="margin-right: 10px; float: right; color: rgba(69, 122, 26, 0.8); font-size: 12px;" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                        R$ <span style="font-size: 13px;" itemprop="price">{$cidade["categoria"][2][2]}/</span>dia
                                    </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {/foreach}
                </div>
            </div>
        </div>
    </div>
{/if}

{if $is_mobile}
    <div class="row collapse" style="margin-top: 2%; margin-bottom: 15px;">
        <div class="large-12 columns fundoCTA-mbl">
            <div class="large-7 columns tabletTam2">
                <!--<img src="/images/icon-info.png" style="display: block; margin-left: 45%; margin-bottom: 8px;">-->
                <span class="txt_CTA-mbl">Tarifas válidas para hoje, locações entre <span style="font-weight: bold;">1 e 6 dias,</span> sujeitas a alteração e disponibilidade. Os preços para locações superiores a 6 diárias ficam cada vez <span style="font-weight: bold;">mais baratas</span> quanto mais tempo utilizar o carro.<span style="font-weight: bold;"> Confira!</span></span>
            </div>
            <div class="large-5 columns">
                <button type='submit' class='botao_frota_ne-mbl' onclick='Click_float_pesquisa_mbl()'>FAÇA SUA COTAÇÃO AGORA</button>
            </div>
        </div>
    </div>
{/if}

{if $is_mobile}
    <div class="row">
        <div class="small-12 large-12 column" style="padding: 1px 0px 0px;">
            <div class="row abas-novas-mbl">
                <div class="large-12 small-12 columns">
                    <span class="ajuste-tam-text" style="font-size: 15px;">Passo a passo para alugar um carro</span>
                    <img onclick="abas_func(1,1)" class="icon-mais-nh-1" style="float: right; margin-top: 0px; width: 19px;" src="/images/carroaluguel/mais-icon-nh.png">
                    <img onclick="abas_func(2,1)" class="icon-menos-nh-1 hide" style="float: right; margin-top: 0px; width: 19px;" src="/images/carroaluguel/menos-icon-nh.png">
                </div>
            </div>
            <div class="conteudo-abas-1 hide">
                <div class="row">
                    <div class="large-12 small-12 columns" style="padding-top: 5px;">
                    <span class="title-passo-a-passo">
                        Passo 1 - Pesquise o menor preço
                    </span>
                        <img class="tabletIpadImg" src="/images/carroaluguel/passo1-nh.png">
                        <p style="margin-bottom: 30px; margin-top: 10px; text-align: justify;font-size:13.4px;">
                            Quem aluga pela CARROALUGUEL paga menos do que quem aluga direto no balcão. O motivo: nós negociamos grandes volumes e por isso garantimos vantagens comerciais exclusivas para nossos clientes.
                        </p>

                        <span class="title-passo-a-passo">
                        Passo 2 - Reserve seu veículo
                    </span>
                        <img class="tabletIpadImg" src="/images/carroaluguel/passo2-nh.png">
                        <p style="margin-bottom: 30px; margin-top: 10px; text-align: justify;font-size:13.4px;">
                            Receba o voucher da sua locação por email. Se precisar alterar data ou hora da sua locação, sem problemas! Faça pelo site acessando sua conta. Você não pagará absolutamente nada. Nenhuma taxa ou multa.
                        </p>

                        <span class="title-passo-a-passo">
                        Passo 3 - Retire seu veículo
                    </span>
                        <img class="tabletIpadImg" src="/images/carroaluguel/passo3-nh.png">
                        <p style="margin-bottom: 30px; margin-top: 10px; text-align: justify;font-size:13.4px;">
                            A locadora já estará ciente da sua reserva. Tudo o que você precisa fazer para retirar o carro é apresentar o voucher que recebeu por e-mail e o seu cartão de crédito na loja. Fácil, não?
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 large-12 column" style="padding: 1px 0px 0px;">
            <div class="row abas-novas-mbl">
                <div class="large-12 small-12 columns">
                    <span class="ajuste-tam-text" style="font-size: 15px;">Maior buscador de aluguel de carros do Brasil</span>
                    <img onclick="abas_func(1,2)" class="icon-mais-nh-2" style="float: right; margin-top: 0px; width: 19px;" src="/images/carroaluguel/mais-icon-nh.png">
                    <img onclick="abas_func(2,2)" class="icon-menos-nh-2 hide" style="float: right; margin-top: 0px; width: 19px;" src="/images/carroaluguel/menos-icon-nh.png">
                </div>
            </div>
            <div class="conteudo-abas-2 hide">
                <div class="row">
                    <div class="large-12 small-12 columns" style="padding-top: 5px;">
                        <p style="margin-bottom: 30px; margin-top: 10px; text-align: justify;font-size:13.4px;"> Quando você aluga um carro pela CARROALUGUEL usa a nossa tecnologia para pesquisar os preços das maiores locadoras do mundo: são mais de {$nmb_locadoras} empresas pesquisadas. Pesquise, escolha a melhor oferta e faça sua locação, tudo pelo nosso site.</p>
                        <img class="tabletIpadImg2" style="margin-top: -16px;" src="/images/carroaluguel/img-propaganda.png">
                        <p style="margin-bottom: 30px; margin-top: 10px; text-align: justify;font-size:13.4px;"> Assim que concluir sua locação você receberá por email, na forma de um Voucher, todas as informações necessárias para retirar o seu carro na locadora escolhida. Apresente o Voucher na locadora junto com seus documentos.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 large-12 column" style="padding: 1px 0px 0px;">
            <div class="row abas-novas-mbl">
                <div class="large-12 small-12 columns">
                    <span class="ajuste-tam-text" style="font-size: 15px;">Saiba o que é preciso para alugar um carro</span>
                    <img onclick="abas_func(1,3)" class="icon-mais-nh-3" style="float: right; margin-top: 0px; width: 19px;" src="/images/carroaluguel/mais-icon-nh.png">
                    <img onclick="abas_func(2,3)" class="icon-menos-nh-3 hide" style="float: right; margin-top: 0px; width: 19px;" src="/images/carroaluguel/menos-icon-nh.png">
                </div>
            </div>
            <div class="conteudo-abas-3 hide">
                <div class="row">
                    <div class="large-12 small-12 columns" style="padding-top: 5px; margin-top: 15px;">
                        <div class="mbl_li">
                            <span style=" color: black; font-size: 12px;" class="mbl_text">Ter 21 anos completos;</span>
                        </div>
                        <div class="mbl_li">
                            <span style=" color: black; font-size: 12px;" class="mbl_text">RG e CPF originais (estrangeiros: passaporte original);</span>
                        </div>
                        <div class="mbl_li">
                            <span style=" color: black; font-size: 12px;" class="mbl_text">Portar cartão de crédito de sua titularidade, dentro da validade, com limite disponível para débito da caução(*) ou o valor total da locação (o que for maior);</span>
                        </div>
                        <div class="mbl_li">
                            <span style=" color: black; font-size: 12px;" class="mbl_text">Apresentar carteira nacional de habilitação (CNH) original e válida, expedida há no mínimo 2 anos, estrangeiros podem apresentar carteira de habilitação emitida no país de origem (ideal que seja acompanhada de uma carteira internacional de habilitação);</span>
                        </div>
                        <div class="mbl_li">
                            <span style=" color: black; font-size: 12px;" class="mbl_text">Importante: CNH vencida, mas ainda dentro dos 30 dias permitidos pelos órgãos de trânsito não é aceita pelas locadoras de automóveis;</span>
                        </div>
                        <div class="mbl_li">
                            <span style=" color: black; font-size: 12px;" class="mbl_text">O responsável pela locação não pode ter restrição financeira no CPF;</span>
                        </div>
                        <div class="mbl_li">
                            <span style=" color: black; font-size: 12px;" class="mbl_text">Desejável que o cliente porte um comprovante de endereço original.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 large-12 column" style="padding: 1px 0px 0px;">
            <div class="row abas-novas-mbl">
                <div class="large-12 small-12 columns">
                    <span class="ajuste-tam-text" style="font-size: 15px;">Hoje em dia é muito simples alugar um carro!</span>
                    <img onclick="abas_func(1,4)" class="icon-mais-nh-4" style="float: right; margin-top: 0px; width: 19px;" src="/images/carroaluguel/mais-icon-nh.png">
                    <img onclick="abas_func(2,4)" class="icon-menos-nh-4 hide" style="float: right; margin-top: 0px; width: 19px;" src="/images/carroaluguel/menos-icon-nh.png">
                </div>
            </div>
            <div class="conteudo-abas-4 hide">
                <div class="row">
                    <div class="large-12 small-12 columns" style="padding-top: 5px;">
                        <p style="margin-bottom: 30px; margin-top: 10px; text-align: justify;font-size:13.4px;">
                            O que antes levava vários minutos, filas e diversos procedimentos burocráticos hoje pode ser resolvido em alguns instantes, com apenas alguns cliques. Tudo pode ser feito através de nosso site na internet, garantindo que o cliente consiga ter acesso ao modelo desejado na data certa, sem qualquer complicação ou contratempo. Isso tudo facilita também para quem não tem tanto tempo e precisa garantir a eficiência máxima.
                        </p>
                        <p style="margin-bottom: 30px; margin-top: 10px; text-align: justify;font-size:13.4px;">
                            Com o aluguel de carro, você consegue resolver todos os detalhes da locação no conforto de casa e reservar o automóvel que deseja para suas viagens sem a necessidade de fornecer o número do cartão de crédito. Isso porque os pagamentos só serão efetuados diretamente nas lojas e locadoras na hora de retirar o carro para prosseguir viagem. Assim, oferecemos a melhor solução para suas reservas a partir de um processo é ágil, seguro e descomplicado.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 large-12 column" style="padding: 1px 0px 0px;">
            <div class="row abas-novas-mbl">
                <div class="large-12 small-12 columns">
                    <span class="ajuste-tam-text" style="font-size: 15px;">Aluguel de caros nos principais locais do país</span>
                    <img onclick="abas_func(1,5)" class="icon-mais-nh-5" style="float: right; margin-top: 0px; width: 19px;" src="/images/carroaluguel/mais-icon-nh.png">
                    <img onclick="abas_func(2,5)" class="icon-menos-nh-5 hide" style="float: right; margin-top: 0px; width: 19px;" src="/images/carroaluguel/menos-icon-nh.png">
                </div>
            </div>
            <div class="conteudo-abas-5 hide">
                <div class="row">
                    <div class="large-12 small-12 columns" style="padding-top: 5px;">
                        <p style="margin-bottom: 30px; margin-top: 10px; text-align: justify;font-size:13.4px;">
                            E foi-se o tempo em que era preciso se preocupar quanto ao local de destino. Atualmente, as locadoras já se espalharam pelos principais destinos do Brasil, o que torna o planejamento ainda mais rápido e prático, contando com o modelo de veículo perfeito para suas necessidades. Tudo isso seguindo a tendência de países como Estados Unidos, ao incorporar de vez o serviço na vida dos clientes.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 large-12 column" style="padding: 1px 0px 0px;">
            <div class="row abas-novas-mbl">
                <div class="large-12 small-12 columns">
                    <span class="ajuste-tam-text" style="font-size: 15px;">Compare preços de aluguel de carros</span>
                    <img onclick="abas_func(1,6)" class="icon-mais-nh-6" style="float: right; margin-top: 0px; width: 19px;" src="/images/carroaluguel/mais-icon-nh.png">
                    <img onclick="abas_func(2,6)" class="icon-menos-nh-6 hide" style="float: right; margin-top: 0px; width: 19px;" src="/images/carroaluguel/menos-icon-nh.png">
                </div>
            </div>
            <div class="conteudo-abas-6 hide">
                <div class="row">
                    <div class="large-12 small-12 columns" style="padding-top: 5px;">
                        <p style="margin-bottom: 30px; margin-top: 10px; text-align: justify;font-size:13.4px;">
                            O aluguel de veículos feito pela internet garante muito mais facilidade. Ele dá a certeza de chegar à loja com a segurança de que o modelo certo vai estar te esperando, de acordo com todas as características que você deseja aproveitar durante o período de locação. Na internet é possível ainda conseguir pesquisar os melhores preços, tudo através da ferramenta do Carro Aluguel.
                        </p>
                        <p style="margin-bottom: 30px; margin-top: 10px; text-align: justify;font-size:13.4px;">
                            Assim, viajar com a família ganha muito mais conforto e comodidade, sem a preocupação de passar aperto ou viajar de maneira indesejada. Alugar um carro é a melhor saída, seja viajando sozinho ou em grupo, já que não é preciso se preocupar com a manutenção dos veículos ou o preparo antes de viajar.
                        </p>
                        <p style="margin-bottom: 30px; margin-top: 10px; text-align: justify;font-size:13.4px;">
                            Tudo com o que você precisa se preocupar é em estar no dia, local e horário combinados para ter as chaves do seu carro alugado na mão e seguir viagem. Tenha mais autonomia, independência e liberdade para chegar onde quiser e vivenciar as melhores experiências.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
{/if}

{if $is_mobile}
    <div class="large-12 columns" style="margin-bottom: -15px;">
        <h2 class="comentarios_title_mbl">
            Mais de 170.000 clientes satisfeitos desde 2008
        </h2>
    </div>
    <div class="faixa_passos fundo_comentarios" style="background-color: #ff7900;">
        <div class="row collapse">
            <div class="large-12 columns">
                <div id="comentarios-slick-mbl" style="margin-bottom: -12px;  margin-top: -20px;">

                    <div>

                        <div class="comentarios_orbit comentarios_primeiro">
                            "Só tenho palavras de agradecimento, fiquei muito tranquila com a locação."
                            <br>
                            <span class="nome_comentarios">Ana Amélia - 21/03/2016</span>
                        </div>

                    </div>
                    <div>

                        <div class="comentarios_orbit comentarios_primeiro">
                            "Gostei muito do trabalho oferecido para uma locaçao rápida e de confiança."
                            <br>
                            <span class="nome_comentarios">João Paulo - 13/05/2016</span>
                        </div>

                    </div>
                    <div>

                        <div class="comentarios_orbit comentarios_primeiro">
                            "Tive muita satisfação e agilidade na minha locação, recomento a todos."
                            <br>
                            <span class="nome_comentarios">Rodrigo Yamada - 01/07/2016</span>
                        </div>

                    </div>
                    <div>

                        <div class="comentarios_orbit comentarios_primeiro">
                            "A locação aconteceu muito bem e muito rápida, me surprieendi."
                            <br>
                            <span class="nome_comentarios">Joaquina Sampaio - 19/07/2016</span>
                        </div>

                    </div>
                    <div>

                        <div class="comentarios_orbit comentarios_primeiro">
                            "O serviço oferecido pela carroaluguel.com é de uma ótima qualidade."
                            <br>
                            <span class="nome_comentarios">Larissa Schmidtz - 03/09/2016</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
{/if}

{if !$is_mobile}
    <div class="h2_novo_fundo2">
        <div class="row">
            <div class="large-11 columns"><h2 class="h2_novo_branco2">Sabia que hoje em dia é muito simples alugar um carro?</h2></div>
            <div class="large-1 columns">&nbsp;</div>
        </div>
    </div>
    <div class="row">
        {*<div class="large-1 columns">&nbsp;</div>*}
        <div class="large-11 columns" style="margin-top: 20px;">
            <p class="texto_prop" style="padding-left: 4px; width: 1129px;">O que antes levava vários minutos, filas e diversos procedimentos burocráticos hoje pode ser resolvido em alguns instantes, com apenas alguns cliques. Tudo pode ser feito através de nosso site na internet, garantindo que o cliente consiga ter acesso ao modelo desejado na data certa, sem qualquer complicação ou contratempo. Isso tudo facilita também para quem não tem tanto tempo e precisa garantir a eficiência máxima.</p>
            <p class="texto_prop" style="padding-left: 4px; width: 1129px;">Com o aluguel de carro, você consegue resolver todos os detalhes da locação no conforto de casa e reservar o automóvel que deseja para suas viagens sem a necessidade de fornecer o número do cartão de crédito. Isso porque os pagamentos só serão efetuados diretamente nas lojas e locadoras na hora de retirar o carro para prosseguir viagem. Assim, oferecemos a melhor solução para suas reservas a partir de um processo é ágil, seguro e descomplicado.</p>
        </div>
        <div class="large-1 columns">&nbsp;</div>
    </div>
    <div class="h2_novo_fundo2">
        <div class="row">
            <div class="large-11 columns"><h2 class="h2_novo_branco2">Aluguel de Veículos nos Principais destinos do Brasil</h2></div>
            <div class="large-1 columns">&nbsp;</div>
        </div>
    </div>
    <div class="row">
        {*<div class="large-1 columns">&nbsp;</div>*}
        <div class="large-11 columns" style="margin-top: 20px;">
            <p class="texto_prop" style="padding-left: 4px; width: 1129px;">E foi-se o tempo em que era preciso se preocupar quanto ao local de destino. Atualmente, as locadoras já se espalharam pelos principais destinos do Brasil, o que torna o planejamento ainda mais rápido e prático, contando com o modelo de veículo perfeito para suas necessidades. Tudo isso seguindo a tendência de países como Estados Unidos, ao incorporar de vez o serviço na vida dos clientes.</p>
        </div>
        <div class="large-1 columns">&nbsp;</div>
    </div>
    <div class="h2_novo_fundo2">
        <div class="row">
            <div class="large-11 columns"><h2 class="h2_novo_branco2">Compare preços de aluguel de carros</h2></div>
            <div class="large-1 columns">&nbsp;</div>
        </div>
    </div>
    <div class="row">
        {*<div class="large-1 columns">&nbsp;</div>*}
        <div class="large-11 columns" style="margin-top: 20px;">
            <p class="texto_prop" style="padding-left: 4px; width: 1129px;">O aluguel de veículos feito pela internet garante muito mais facilidade. Ele dá a certeza de chegar à loja com a segurança de que o modelo certo vai estar te esperando, de acordo com todas as características que você deseja aproveitar durante o período de locação. Na internet é possível ainda conseguir pesquisar os melhores preços, tudo através da ferramenta do Carro Aluguel.</p>
            <p class="texto_prop" style="padding-left: 4px; width: 1129px;">Assim, viajar com a família ganha muito mais conforto e comodidade, sem a preocupação de passar aperto ou viajar de maneira indesejada. Alugar um carro é a melhor saída, seja viajando sozinho ou em grupo, já que não é preciso se preocupar com a manutenção dos veículos ou o preparo antes de viajar.</p>
            <p class="texto_prop" style="padding-left: 4px; width: 1129px;">Tudo com o que você precisa se preocupar é em estar no dia, local e horário combinados para ter as chaves do seu carro alugado na mão e seguir viagem. Tenha mais autonomia, independência e liberdade para chegar onde quiser e vivenciar as melhores experiências.</p>
        </div>
        <div class="large-1 columns">&nbsp;</div>
    </div>

    <div id="float_pesquisa" class="reveal-modal large">
        <a id="close_float_pesquisa" class="close-reveal-modal"></a>
        <div id="float_pesquisa_content">
            <div class="row collapse form-pesquisa-geral">
                <div class="large-12 columns">
                    <div class="row form_pesquisa">
                        <input type="hidden" name="trava_modalCTA" id="trava_modalCTA" value="{$trava_modalCTA}">
                        <form name="busca-carro_float" itemscope itemtype="http://schema.org/RentalCarReservation" id="busca-carro_float" method="get" action="https://www.carroaluguel.com/pesquisa-cidade-tela">
                            <div class="large-6 small-12 columns col-dados1 ">
                                <div class="row">
                                    <div class="large-12 small-12 columns">
                                        <label class="new_textos" for="retirar_cidade_float" style="color:black; font-size: 15px;"><strong>Retirar carro em:</strong></label>
                                        <input type="text" style="width: 93%!important;" name="retirar_cidade_float_tela" id="retirar_cidade_float_tela" class="autocomplete-cidade new_imputTexto" value="{$arr_dados_cookie['cidade']}" onclick="{literal}if(this.value=='Digite a cidade'){this.value=''}{/literal}" onblur="{literal}if(this.value==''){this.value='Digite a cidade'}{/literal}"/>
                                        <input type="button" style="margin-right: 0 !important; border: solid 1px #88c7f8 !important;" name="limpa_texto" id="limpa_texto" class="new_botaoLimpador" onclick="limpador_texto_cidade_tela()">
                                        <input type="hidden" name="aero_retirada_float_tela" id="aero_retirada_float_tela" value="">
                                        <input type="hidden" name="sel_bairro_float_tela" id="sel_bairro_float_tela" value="">

                                        {if $trava_modalCTA}
                                            <input type="hidden" name="retirar_cidade_float_tela-cid_principal" id="retirar_cidade_float_tela-cid_principal" value="{$arr_dados_cookie['id_cid']}">
                                            <input type="hidden" name="retirar_cidade_float_tela-ref_principal" id="retirar_cidade_float_tela-ref_principal" value="{$arr_dados_cookie['tipo_cid']}">
                                            <input type="hidden" name="retirar_cidade_float_tela-val_principal" id="retirar_cidade_float_tela-val_principal" value="{$arr_dados_cookie['id_cid2']}">
                                            <input type="hidden" name="hora_retirada_hdn" id="hora_retirada_hdn" value="{$arr_dados_cookie['hora_ret']}">
                                            <input type="hidden" name="hora_devolucao_hdn" id="hora_devolucao_hdn" value="{$arr_dados_cookie['hora_dev']}">
                                        {/if}

                                    </div>
                                    <div class="large-6 small-12 columns">
                                        <label class="data" style="color:black;">Dia e hora retirada:</label>
                                        <input type="text" name="dataRetirada_float_tela" id="dataRetirada_float_tela" class="validate[required] data_retirada dataRetirada" value=""/>
                                        <input type="hidden" name="hdn_dataRetirada_float_tela" id="hdn_dataRetirada_float_tela" value="{$arr_dados_cookie['data_ret']}">
                                        <select name="horaRetirada_float_tela" id="horaRetirada_float_tela" class="postfix validate[required] new_campo_hora-tela">
                                            <option value="00:00">00:00</option>
                                            <option value="00:30">00:30</option>
                                            <option value="01:00">01:00</option>
                                            <option value="01:30">01:30</option>
                                            <option value="02:00">02:00</option>
                                            <option value="02:30">02:30</option>
                                            <option value="03:00">03:00</option>
                                            <option value="03:30">03:30</option>
                                            <option value="04:00">04:00</option>
                                            <option value="04:30">04:30</option>
                                            <option value="05:00">05:00</option>
                                            <option value="05:30">05:30</option>
                                            <option value="06:00">06:00</option>
                                            <option value="06:30">06:30</option>
                                            <option value="07:00">07:00</option>
                                            <option value="07:30">07:30</option>
                                            <option value="08:00">08:00</option>
                                            <option value="08:30">08:30</option>
                                            <option value="09:00">09:00</option>
                                            <option value="09:30">09:30</option>
                                            <option value="10:00">10:00</option>
                                            <option value="10:30">10:30</option>
                                            <option value="11:00">11:00</option>
                                            <option value="11:30">11:30</option>
                                            <option value="12:00" selected>12:00</option>
                                            <option value="12:30">12:30</option>
                                            <option value="13:00">13:00</option>
                                            <option value="13:30">13:30</option>
                                            <option value="14:00">14:00</option>
                                            <option value="14:30">14:30</option>
                                            <option value="15:00">15:00</option>
                                            <option value="15:30">15:30</option>
                                            <option value="16:00">16:00</option>
                                            <option value="16:30">16:30</option>
                                            <option value="17:00">17:00</option>
                                            <option value="17:30">17:30</option>
                                            <option value="18:00">18:00</option>
                                            <option value="18:30">18:30</option>
                                            <option value="19:00">19:00</option>
                                            <option value="19:30">19:30</option>
                                            <option value="20:00">20:00</option>
                                            <option value="20:30">20:30</option>
                                            <option value="21:00">21:00</option>
                                            <option value="21:30">21:30</option>
                                            <option value="22:00">22:00</option>
                                            <option value="22:30">22:30</option>
                                            <option value="23:00">23:00</option>
                                            <option value="23:30">23:30</option>
                                        </select>
                                    </div>
                                    <div class="large-6 small-12 columns">
                                        <label class="data new_textos" style="color:black; font-size: 15px;">Die e hora devolução:</label>
                                        <input type="text" name="dataDevolucao_float_tela" id="dataDevolucao_float_tela" class="validate[required] date-devolucao dataRetirada" value=""/>
                                        <input type="hidden" name="hdn_dataDevolucao_float_tela" id="hdn_dataDevolucao_float_tela" value="{$arr_dados_cookie['data_dev']}">
                                        <select name="horaDevolucao_float_tela" id="horaDevolucao_float_tela" class="postfix validate[required] new_campo_hora-tela">
                                            <option value="00:00">00:00</option>
                                            <option value="00:30">00:30</option>
                                            <option value="01:00">01:00</option>
                                            <option value="01:30">01:30</option>
                                            <option value="02:00">02:00</option>
                                            <option value="02:30">02:30</option>
                                            <option value="03:00">03:00</option>
                                            <option value="03:30">03:30</option>
                                            <option value="04:00">04:00</option>
                                            <option value="04:30">04:30</option>
                                            <option value="05:00">05:00</option>
                                            <option value="05:30">05:30</option>
                                            <option value="06:00">06:00</option>
                                            <option value="06:30">06:30</option>
                                            <option value="07:00">07:00</option>
                                            <option value="07:30">07:30</option>
                                            <option value="08:00">08:00</option>
                                            <option value="08:30">08:30</option>
                                            <option value="09:00">09:00</option>
                                            <option value="09:30">09:30</option>
                                            <option value="10:00">10:00</option>
                                            <option value="10:30">10:30</option>
                                            <option value="11:00">11:00</option>
                                            <option value="11:30">11:30</option>
                                            <option value="12:00" selected>12:00</option>
                                            <option value="12:30">12:30</option>
                                            <option value="13:00">13:00</option>
                                            <option value="13:30">13:30</option>
                                            <option value="14:00">14:00</option>
                                            <option value="14:30">14:30</option>
                                            <option value="15:00">15:00</option>
                                            <option value="15:30">15:30</option>
                                            <option value="16:00">16:00</option>
                                            <option value="16:30">16:30</option>
                                            <option value="17:00">17:00</option>
                                            <option value="17:30">17:30</option>
                                            <option value="18:00">18:00</option>
                                            <option value="18:30">18:30</option>
                                            <option value="19:00">19:00</option>
                                            <option value="19:30">19:30</option>
                                            <option value="20:00">20:00</option>
                                            <option value="20:30">20:30</option>
                                            <option value="21:00">21:00</option>
                                            <option value="21:30">21:30</option>
                                            <option value="22:00">22:00</option>
                                            <option value="22:30">22:30</option>
                                            <option value="23:00">23:00</option>
                                            <option value="23:30">23:30</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="large-6 small-12 columns col-dados2">
                                <div class="row">
                                    <div class="large-12 small-12 columns">
                                        <div>
                                            <label for="devolver-outra_float"><input class="check_float" onclick="check_outro_local_float2(this)" type="checkbox" value="1" name="devolver_float" id="devolver-outra_float"/></label>
                                            <span class="span_float new_textos" style="font-weight: bold; color: black; font-size: 15px; margin-top: -26px !important;">Devolver em uma cidade diferente:</span>
                                            <div class="devOutro hide">
                                                <input type="text" style="margin-top: 10px !important;" name="cidade_devolucao_float_tela" id="cidade_devolucao_float_tela" value="{$arr_dados_cookie['cidade_dev']}" class="autocomplete-cidade new_imputTexto-tela-outro"/>

                                                {if $arr_dados_cookie['cidade_dev']}
                                                    <input type="hidden" name="cidade_devolucao_float_tela-principal" id="cidade_devolucao_float_tela-principal" value="{$arr_dados_cookie['cidade_dev']}">
                                                    <input type="hidden" name="cidade_devolucao_float_tela-cid_principal" id="cidade_devolucao_float_tela-cid_principal" value="{$arr_dados_cookie['id_cid_dev']}">
                                                    <input type="hidden" name="cidade_devolucao_float_tela-ref_principal" id="cidade_devolucao_float_tela-ref_principal" value="{$arr_dados_cookie['tipo_cid_dev']}">
                                                    <input type="hidden" name="cidade_devolucao_float_tela-val_principal" id="cidade_devolucao_float_tela-val_principal" value="{$arr_dados_cookie['id_dic_dev2']}">
                                                {/if}

                                            </div>
                                        </div>
                                        <button type="submit" class="btn-pesquisa" style="margin-top: 82px;">
                                            <img src="/images/form_pesquisa_busca.png" alt="Pesquisar os melhores preços de aluguel de carros"/> Pesquisar os melhores preços
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="caixa_float" style="z-index: 2;">
        <input type="hidden" name="trava_modalFloat" id="trava_modalFloat" value="{$trava_modalCTA}">
        <div class="row collapse nova_float">
            <form name="busca-carro_caixafloat" itemscope itemtype="http://schema.org/RentalCarReservation" id="busca-carro_caixafloat" method="get" action="https://www.carroaluguel.com/pesquisa-cidade-float">

                <div class="row collapse">
                    <div class="large-4 columns">
                        <span class="texto_pesquisa_ne">Local de retirada:</span>
                        <input type="text" name="retirar_cidade_caixafloat" id="retirar_cidade_caixafloat" class="autocomplete-cidade validate[required] input_pesquisa_ne" value="{$arr_dados_cookie['cidade']}" onclick="{literal}if(this.value=='Digite a cidade'){this.value=''}{/literal}" onblur="{literal}if(this.value==''){this.value='Digite a cidade'}{/literal}"/>
                        <input type="hidden" name="aero_retirada" value="{$aero_var}">
                        <input type="hidden" name="sel_bairro" id="sel_bairro" value="{$sel_bairro}">

                        {if $trava_modalCTA}
                            <input type="hidden" name="retirar_cidade_caixafloat-cid_principal" id="retirar_cidade_caixafloat-cid_principal" value="{$arr_dados_cookie['id_cid']}">
                            <input type="hidden" name="retirar_cidade_caixafloat-ref_principal" id="retirar_cidade_caixafloat-ref_principal" value="{$arr_dados_cookie['tipo_cid']}">
                            <input type="hidden" name="retirar_cidade_caixafloat-val_principal" id="retirar_cidade_caixafloat-val_principal" value="{$arr_dados_cookie['id_cid2']}">
                            <input type="hidden" name="horaRetirada_caixafloat_hdn" id="horaRetirada_caixafloat_hdn" value="{$arr_dados_cookie['hora_ret']}">
                            <input type="hidden" name="horaDevolucao_caixafloat_hdn" id="horaDevolucao_caixafloat_hdn" value="{$arr_dados_cookie['hora_dev']}">
                        {/if}

                        <div class="outro_local_float hide">

                            {if $arr_dados_cookie['cidade_dev']}
                                <input type="hidden" name="cidade_devolucao_caixafloat-principal" id="cidade_devolucao_caixafloat-principal" value="{$arr_dados_cookie['cidade_dev']}">
                                <input type="hidden" name="cidade_devolucao_caixafloat-cid_principal" id="cidade_devolucao_caixafloat-cid_principal" value="{$arr_dados_cookie['id_cid_dev']}">
                                <input type="hidden" name="cidade_devolucao_caixafloat-ref_principal" id="cidade_devolucao_caixafloat-ref_principal" value="{$arr_dados_cookie['tipo_cid_dev']}">
                                <input type="hidden" name="cidade_devolucao_caixafloat-val_principal" id="cidade_devolucao_caixafloat-val_principal" value="{$arr_dados_cookie['id_dic_dev2']}">
                            {/if}

                            <div class="texto_pesquisa_ne" style="margin-top: 10px;">Local diferente: </div>
                            <input type="text" name="cidade_devolucao_caixafloat" id="cidade_devolucao_caixafloat" value="" class="autocomplete-cidade input_pesquisa_ne_dev outro_local"/>
                        </div>

                        <label for="devolver-outra-nova" class="devolver_outra_check"><input type="checkbox" value="1" name="devolver" id="devolver-outra-nova" onclick="check_outro_local_float(this)"/> <span class="texto_ne_check">{$language.pesquisa_cidade_devolucao}</span></label>
                    </div>
                    <div class="large-5 columns">
                        <input type="button" name="limpa_texto" id="limpa_texto" class=" hide-for-small hide-for-medium botao_limpador_float" onclick="limpador_texto_cidade_float()">
                        <div class="row colapsse">
                            <div class="small-6 large-6 medium-6 columns" style="margin-left: 26px; margin-top: 2px;">
                                <div class="texto_pesquisa_ne"> Dia e horário de retirada</div>
                                <input type="text" name="dataRetirada_caixafloat" id="dataRetirada_caixafloat" class="entrarDatePicker dataRetirada" value="" style="width: 57%; display: inline-block; margin-right: 5px !important;">
                                <input type="hidden" name="hdn_dataRetirada_caixafloat" id="hdn_dataRetirada_caixafloat" value="{$arr_dados_cookie['data_ret']}">
                                <select name="horaRetirada_caixafloat" id="horaRetirada_caixafloat" class="retirada2" style="width: 38%;">
                                    <option value="00:00">00:00</option>
                                    <option value="00:30">00:30</option>
                                    <option value="01:00">01:00</option>
                                    <option value="01:30">01:30</option>
                                    <option value="02:00">02:00</option>
                                    <option value="02:30">02:30</option>
                                    <option value="03:00">03:00</option>
                                    <option value="03:30">03:30</option>
                                    <option value="04:00">04:00</option>
                                    <option value="04:30">04:30</option>
                                    <option value="05:00">05:00</option>
                                    <option value="05:30">05:30</option>
                                    <option value="06:00">06:00</option>
                                    <option value="06:30">06:30</option>
                                    <option value="07:00">07:00</option>
                                    <option value="07:30">07:30</option>
                                    <option value="08:00">08:00</option>
                                    <option value="08:30">08:30</option>
                                    <option value="09:00">09:00</option>
                                    <option value="09:30">09:30</option>
                                    <option value="10:00">10:00</option>
                                    <option value="10:30">10:30</option>
                                    <option value="11:00">11:00</option>
                                    <option value="11:30">11:30</option>
                                    <option value="12:00" selected="">12:00</option>
                                    <option value="12:30">12:30</option>
                                    <option value="13:00">13:00</option>
                                    <option value="13:30">13:30</option>
                                    <option value="14:00">14:00</option>
                                    <option value="14:30">14:30</option>
                                    <option value="15:00">15:00</option>
                                    <option value="15:30">15:30</option>
                                    <option value="16:00">16:00</option>
                                    <option value="16:30">16:30</option>
                                    <option value="17:00">17:00</option>
                                    <option value="17:30">17:30</option>
                                    <option value="18:00">18:00</option>
                                    <option value="18:30">18:30</option>
                                    <option value="19:00">19:00</option>
                                    <option value="19:30">19:30</option>
                                    <option value="20:00">20:00</option>
                                    <option value="20:30">20:30</option>
                                    <option value="21:00">21:00</option>
                                    <option value="21:30">21:30</option>
                                    <option value="22:00">22:00</option>
                                    <option value="22:30">22:30</option>
                                    <option value="23:00">23:00</option>
                                    <option value="23:30">23:30</option>
                                </select>
                            </div>
                            <div class="small-6 large-6 medium-6 columns" style="margin-right: -72px; margin-top: 2px;">
                                <div class="texto_pesquisa_ne"> Dia e horário de devolução</div>
                                <input type="text" name="dataDevolucao_caixafloat" id="dataDevolucao_caixafloat" class="entrarDatePicker dataRetirada" value="" style="width: 57%; display: inline-block; margin-right: 5px !important;">
                                <input type="hidden" name="hdn_dataDevolucao_caixafloat" id="hdn_dataDevolucao_caixafloat" value="{$arr_dados_cookie['data_dev']}">
                                <select name="horaDevolucao_caixafloat" id="horaDevolucao_caixafloat" class="retirada2" style="width:38%; z-index: 9999999; ">
                                    <option value="00:00">00:00</option>
                                    <option value="00:30">00:30</option>
                                    <option value="01:00">01:00</option>
                                    <option value="01:30">01:30</option>
                                    <option value="02:00">02:00</option>
                                    <option value="02:30">02:30</option>
                                    <option value="03:00">03:00</option>
                                    <option value="03:30">03:30</option>
                                    <option value="04:00">04:00</option>
                                    <option value="04:30">04:30</option>
                                    <option value="05:00">05:00</option>
                                    <option value="05:30">05:30</option>
                                    <option value="06:00">06:00</option>
                                    <option value="06:30">06:30</option>
                                    <option value="07:00">07:00</option>
                                    <option value="07:30">07:30</option>
                                    <option value="08:00">08:00</option>
                                    <option value="08:30">08:30</option>
                                    <option value="09:00">09:00</option>
                                    <option value="09:30">09:30</option>
                                    <option value="10:00">10:00</option>
                                    <option value="10:30">10:30</option>
                                    <option value="11:00">11:00</option>
                                    <option value="11:30">11:30</option>
                                    <option value="12:00" selected="">12:00</option>
                                    <option value="12:30">12:30</option>
                                    <option value="13:00">13:00</option>
                                    <option value="13:30">13:30</option>
                                    <option value="14:00">14:00</option>
                                    <option value="14:30">14:30</option>
                                    <option value="15:00">15:00</option>
                                    <option value="15:30">15:30</option>
                                    <option value="16:00">16:00</option>
                                    <option value="16:30">16:30</option>
                                    <option value="17:00">17:00</option>
                                    <option value="17:30">17:30</option>
                                    <option value="18:00">18:00</option>
                                    <option value="18:30">18:30</option>
                                    <option value="19:00">19:00</option>
                                    <option value="19:30">19:30</option>
                                    <option value="20:00">20:00</option>
                                    <option value="20:30">20:30</option>
                                    <option value="21:00">21:00</option>
                                    <option value="21:30">21:30</option>
                                    <option value="22:00">22:00</option>
                                    <option value="22:30">22:30</option>
                                    <option value="23:00">23:00</option>
                                    <option value="23:30">23:30</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="large-3 columns" style="z-index: 1 !important; width: 50px;">
                        <button type="submit" class="btn-pesquisa_20_2" style="font-weight:bold; margin-left: -125px;"> <span class="tamanho_nome_botao_pesquisa"> PESQUISAR </span> </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
{/if}
{*<div id="bio_ep" class="popUpBlack">*}
{*<img class="blackHeader" src="//www.carroaluguel.com/images/logo_blackFri.png"></img>*}
{*<div class="row" style="height: 95px; width: 600px; margin-top: 15px; line-height: 24px;" >*}
{*<span class="textoBlack">Receba em primeira mão as melhores ofertas e descontos em aluguel de carros do Brasil! Cadastre-se e fique por dentro!</span>*}
{*</div>*}
{*<div class="row" style="display: inline-block; color: white; font-size: 20px; margin-top: -120px; text-align: center; margin-left: -40px;">*}
{*<span style="text-align: center; display: inline-block;">E-mail:</span><input id="black_email" type="text" class="imputBlack">*}
{*</div>*}
{*<div class="row" style="display:block; text-align: center;">*}
{*<img style="margin-top:20px;" class="botaoBlack" src="//www.carroaluguel.com/images/cta-participar.png"></img>*}
{*</div>*}
{*</div>*}
{if $is_mobile}
    {include file='geral/footer_mbl_new.tpl'}
{else}
    {include file='geral/footer_new.tpl'}
{/if}
</div>
{if !$is_mobile}
    <script type="text/javascript">

        {*bioEp.init();*}
        {*$("#bio_ep_close").click(function(){*}
        {*bioEp.hidePopup();*}
        {*});*}

        {*$('.botaoBlack').click(function(){*}

        {*event.preventDefault();*}
        {*if($("#black_email").val() == "")*}
        {*{*}
        {*swal("O campo e-mail deve ser preenchido!");*}
        {*return false;*}
        {*}*}

        {*var data = {};*}
        {*data["news-email"] = $("#black_email").val();*}

        {*$.ajax({*}
        {*type: "POST",*}
        {*url: "https://www.carroaluguel.com/newsletter.php",*}
        {*data: data,*}
        {*success: function(r){*}
        {*var data_array = [*}
        {*{ name: 'email', value: $("#black_email").val() },*}
        {*{ name: 'identificador', value: 'Black-Friday' },*}
        {*{ name: 'token_rdstation', value: '97905d7f62030465da2035e9a64ee4b9' },*}
        {*{ name: 'nome', value: '' }*}
        {*];*}

        {*RdIntegration.post(data_array, function () { swal('E-mail cadastrado com sucesso!'); });*}
        {*$("#black_email").val("");*}
        {*}*}
        {*});*}
        {*});*}


        $("#newsletter-ok").click(function(){

            if($("#email").val() == "")
            {
                alert("O campo e-mail deve ser preenchido!");
                return false;
            }

            var data = {};
            data["news-email"] = $("#email").val();

            $.ajax({
                type: "POST",
                url: "https://www.carroaluguel.com/newsletter.php",
                data: data,
                success: function(r){
                    var data_array = [
                        { name: 'email', value: $("#email").val() },
                        { name: 'identificador', value: 'Página Inicial Home' },
                        { name: 'token_rdstation', value: '97905d7f62030465da2035e9a64ee4b9' },
                        { name: 'nome', value: '' },
                        { name: 'link', value: 'teste'}
                    ];

                    RdIntegration.post(data_array, function () { alert('E-mail cadastrado com sucesso!'); });
                    $("#email").val("");
                }
            });

        });

        $(document).ready(function(){

            $("object").each(function(index, value){

                if($(this).attr("type") == "application/gas-events-uni")
                {
                    $(this).remove();
                }

            });
        });

    </script>
    <script type="text/javascript">

        $(document).ready(function () {

            $(function(){

                $(window).scroll(function(){
                    if($(document).scrollTop() > '900'){
                        $('#caixa_float').show();
                    }else{
                        $('#caixa_float').hide();
                    }
                });
            });

            $("#cidades-slick").slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                prevArrow: "<button type='button' class='prevCiddades'></button>",
                nextArrow: "<button type='button' class='nextCidades'></button>",
            }).show();

            $("#comentarios-slick").slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1
            }).show();

            $('#caixa_float').hide();

        });


        {literal}
        jQuery.fn.toggleText = function (a, b) {
            return this.html(this.html().replace(new RegExp("(" + a + "|" + b + ")"), function (x) {
                return (x == a) ? b : a;
            }));
        }
        {/literal}

    </script>
{else}
    <script type="text/javascript">

        $(document).ready(function () {


            $(function(){

                $(window).scroll(function(){
                    if($(document).scrollTop() > '10'){
                        $('#gn-menu').hide();
                    }else{
                        $('#gn-menu').show();
                    }
                });
            });



        });

        $("#comentarios-slick-mbl").slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1
        }).show();

        $("#cidades-slick-mbl").slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: "<button type='button' class='prevCiddadesMBL'></button>",
            nextArrow: "<button type='button' class='nextCidadesMBL'></button>"
        }).show();


    </script>
{/if}
<script>
    new gnMenu( document.getElementById( 'gn-menu' ) );
</script>