{include file='header.tpl'}
    <div class="container">
        <div class="row">
            <h3>Editar StatusVenda</h3>
            <form name="form" method="post" action="/admin/statusvenda/{$statusvenda->getId()}/update">
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" value="{$statusvenda->getNome()}" placeholder="Digite o nome">
                </div>
                <button type="submit" class="btn btn-default">Enviar</button>
            </form>
        </div>
    </div>
{include file='footer.tpl'}