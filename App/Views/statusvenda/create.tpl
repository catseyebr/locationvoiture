{include file='header.tpl'}
    <div class="container">
        <div class="row">
            <h3>Novo StatusVenda</h3>
            <form name="form" method="post" action="/admin/statusvenda/store">
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome">
                </div>
                <button type="submit" class="btn btn-default">Enviar</button>
            </form>
        </div>
    </div>
{include file='footer.tpl'}