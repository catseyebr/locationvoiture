<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="lt-ie9 lt-ie8 lt-ie7" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><![endif]-->
<!--[if IE 7]>
<html class="lt-ie9 lt-ie8" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><![endif]-->
<!--[if IE 8]>
<html class="lt-ie9" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><![endif]-->
<!--[if gt IE 8]><!-->
<html xmlns="http://www.w3.org/1999/xhtml"><!--<![endif]-->
<head>
    <meta charset="utf-8"/>
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="canonical" href="{$canonical}" />
    <title>{$meta_tags->title}</title>
    <meta name="description" content="{$meta_tags->description}"/>
    <meta name="language" content="{$language.lang_cod}"/>
    <meta http-equiv="Expires" content="10080"/>
    <meta name="msvalidate.01" content="70F80D9FA0095858D6D4F583BD994C58"/>
    <meta name="globalsign-domain-verification" content="4iWADcRofMSnBYn2ZWNQj_lGVxGp7P-SjblZ_ftrSI"/>
    {literal}
        <style type="text/css">
            .picker__button--clear, .picker__button--close, .picker__button--today{
                color: #000000 !important;
            }
            .picker__select--month {
                padding:0 !important;
                font-size: .75em !important;
            }
        </style>
    {/literal}
    {$up_js}
</head>

<body>
<header>
    <div class="row collapse">
        <div class="large-4 small-6 columns">
            <div class="row collapse">
                <div class="large-12 small-12 columns">
                    <a href="http://www.carroaluguel.com">
                        <img id="logo" src="/images/carroaluguel/geral/logo.png" style="border: none; " alt="CarroAluguel.com - A melhor maneira de alugar um carro"/>
                    </a>
                </div>
            </div>
        </div>
        <div class="large-8 small-6 columns">
            <div class="row collapse">
                <div class="large-5 small-12 columns head_contato hide-for-small" onclick="window.open('https://www.carroaluguel.com/suporte/chat.php?v=2&linkid=NTYxOGMwNzUzNDA2ZTk3YmJlNmI1ZmRiZTU3MzU3MWE_','','width=600,height=760,left=0,top=0,resizable=yes,menubar=no,location=no,status=yes,scrollbars=yes')" style="cursor:pointer">
                    <div class="icon_head">
                        <span class="icon_funil icon_funil_head_question"></span>
                    </div>
                    <div class="texto_icon_head">
                        {$language.header_atendimento_bold}<br><span style="font-size:12px">{$language.header_atendimento}</span>
                    </div>
                </div>
                <div class="large-4 small-12 columns head_contato" style="margin-top:7px;cursor:pointer" onclick="window.location='https://www.carroaluguel.com/telefones-atendimento'">
                    <div class="icon_head hide-for-small">
                        <span class="icon_funil icon_funil_head_fone" style="margin-top:5px"></span>
                    </div>
                    <div class="texto_icon_head" style="line-height: normal;width:154px;">
                        <div class="hide-for-small">{$language.header_telefone_bold}</div>
                        <span id="fone_number">{$nmbfone_atendimento}</span>
                        <br><span style="font-size: 10px;">{$language.header_telefone}</span>
                    </div>
                </div>
                {if !$is_mobile}
                    <div class="large-3 small-12 columns head_contato" style="margin-top:7px;cursor:pointer" onclick="window.location='https://www.carroaluguel.com/cliente'">
                        <div class="icon_head hide-for-small" style="margin-right: 0 !important; width: 24px;">
                            <span class="icon_funil icon_funil_lock" style="margin-top:5px;"></span>
                        </div>
                        <div class="texto_icon_head" style="line-height: normal;width:75px;text-align: center;margin-top:5px;">
                            <div class="hide-for-small">{$language.header_cliente}</div>
                        </div>
                    </div>
                {/if}
            </div>
        </div>
    </div>
</header>