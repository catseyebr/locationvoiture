{include file='geral/header.tpl'}
<div class="row collapse">
    <h1>Contatos da central de reservas para aluguel de carros</h1>
</div>
<div class="row">
    <div class="large-12 columns" id="telefone_regiao">
        <h2>Atendimento para sua região</h2>
        <h3>(Segunda à sexta-feira das 08:00 às 20:00)<br>(Sábado das 09:00 às 13:00)</h3>
        <a href="tel:{$nmbfone_atendimento}"><h4 id="fone_atendimento" class="h4-telefone">{$nmbfone_atendimento}</h4></a>

        <div id="id_cidade"></div>
        {if !$is_mobile}
            <p class="text-center" style="color: #000;font-size:14px;">O telefone não é da sua região? <a href="#" id="exibir-tel-cidade-form" style="text-decoration: underline">Clique aqui</a> para saber o mais próximo de você.</p>
        {else}
            <p class="text-center" style="color: #000;font-size:14px;">O telefone não é da sua região?</p>
            <a href="#" id="exibir-tel-cidade-form" class="button" style="color: #00659d;">Clique aqui para achar um contato mais próximo.</a>
        {/if}
        <form class="tel-cidade-form">
            <div class="div_seta" style="text-align: center;margin-top: -22px;margin-bottom:5px;"><span class="seta-cima"></span></div>
            <label for="estado">Estado:</label>
            <select type="text" name="estado" id="estado">
                <option class="first">Selecione o estado...</option>
                {foreach $estados as $abreviacao => $estado}
                    <option data-uf="{$abreviacao}">{$estado->getNome()}</option>
                {/foreach}
            </select>

            <label for="cidade">Cidade:</label>
            <select type="text" name="cidade" id="cidade">
                <option class="first">Selecione a cidade...</option>
                {foreach $cidades as $cidade}
                    <option data-uf="{$cidade.uf}" data-tel="{$cidade.numero}">{$cidade.nome}</option>
                {/foreach}
            </select>
        </form>

    </div>
</div>
{if !$is_mobile}
    <div class="row">
        <div class="small-4 columns">
            <a name="livezilla_chat_button" href="javascript:void(window.open('https://www.carroaluguel.com/suporte/chat.php?acid=bdeed','','width=600,height=760,left=0,top=0,resizable=yes,menubar=no,location=no,status=yes,scrollbars=yes'))" class="lz_cbl">
                <div id="chat_contato" class="box_contato">
                    <div class="row collapse head_link">
                        <div class="small-9 small-centered columns">
                            <div class="row collapse">
                                <div class="small-4 small-offset-2 columns">
                                    <span class="sprite_contato sprite_contato_chat"></span>
                                </div>
                                <div class="small-4 columns">
                                    <h2 style="margin-top:10px;">Chat</h2>
                                </div>
                                <div class="small-2 columns"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row collapse">
                        <div class="small-12 columns">
                            <p>Fale online com nossos consultores</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="small-4 columns">
            <div id="form_contato" class="box_contato">
                <div class="row collapse head_link">
                    <div class="small-9 small-centered columns">
                        <div class="row collapse">
                            <div class="small-4 columns">
                                <span class="sprite_contato sprite_contato_form"></span>
                            </div>
                            <div class="small-8 columns">
                                <h2 style="margin-top:-2px;">Formulário <br><span>de</span> contato</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row collapse">
                    <div class="small-12 columns">
                        <p>Mantenha contato através do nosso formulário</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="small-4 columns">
            <div id="click_contato" class="box_contato">
                <div class="row collapse head_link">
                    <div class="small-9 small-centered columns">
                        <div class="row collapse">
                            <div class="small-4 columns">
                                <span class="sprite_contato sprite_contato_call"></span>
                            </div>
                            <div class="small-8 columns">
                                <h2 style="margin-top:10px;">Click <span>to</span> Call</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row collapse">
                    <div class="small-12 columns">
                        <p>Clique aqui, nós ligamos para você</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row collapse">
        <div class="small-12 columns" style="text-align: center;padding: 20px;">
            <img src="/images/carroaluguel/contato/contato-carros.png" alt="Contatos da Central de reservas para aluguel de carros">
        </div>
    </div>
    <div id="formcontato" class="reveal-modal large">
        <a id="close_formcontato" class="close-reveal-modal"></a>
        <div id="formcontato_content">
            <form>
                <fieldset>
                    <legend>Formulário de Contato</legend>
                    <div class="row">
                        <div class="large-12 columns">
                            <label for="form_nome">Nome:</label>
                            <input id="form_nome" type="text" placeholder="Seu nome completo">
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-12 columns">
                            <label for="form_email">Email:</label>
                            <input id="form_email" type="text" placeholder="Seu email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-12 columns">
                            <label for="form_fone">Telefone:</label>
                            <input id="form_fone" type="text" placeholder="Seu telefone com DDD">
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-12 columns">
                            <label for="form_msg">Sua mensagem:</label>
                            <textarea id="form_msg" rows="5" placeholder="Digite aqui sua mensagem"></textarea>
                        </div>
                    </div>
                    <div class="row collapse">
                        <div class="large-4 columns">
                            <div id="btt_enviar" class="button">Enviar</div>
                        </div>
                        <div class="large-2 columns"></div>
                        <div class="large-6 columns" style="text-align: right;">
                            <img src="/images/carroaluguel/geral/logo.png" style="border: none;" alt="CarroAluguel.com - Formulário de contato"/>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    <div id="clicktocall" class="reveal-modal large">
        <a id="close_clicktocall" class="close-reveal-modal"></a>
        <div id="clicktocall_content">
            <div class="row colapse">
                <div class="large-12 columns">
                    <h4>Adobe Flash Player é necessário,<br />Horário de atendimento das 08hs às 19hs.<br />Não funciona para números de celular.</h4>
                </div>
            </div>
            <div class="row colapse" style="height: 372px;">
                <script type="text/javascript">
                    <!-- [ arquivo    , nome     , largura, altura]; -->
                    var mw = new Flash("/layum1.swf", "", "358", "372");
                    <!-- Swf transparente -->
                    mw.addParameter("wmode", "transparent");
                    <!-- esconde menu -->
                    mw.addParameter("showMenu", "false");
                    mw.write();
                </script>
            </div>
        </div>
    </div>
{/if}
{include file='geral/footer.tpl'}
