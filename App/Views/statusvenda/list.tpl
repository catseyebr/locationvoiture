{include file='header.tpl'}
    <div class="container">
        <div class="row">
            <h3>Listagem de Status de vendas</h3>
            <a href="/admin/statusvenda/create">Novo StatusVenda</a>
            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                {foreach $statusvendas as $stven}
                <tr>
                    <td>{$stven->getId()}</td>
                    <td>{$stven->getNome()}</td>
                    <td><a href='/admin/statusvenda/{$stven->getId()}/edit'>Editar</a> | <a href='/admin/statusvenda/{$stven->getId()}/remove'>Excluir</a></td>
                </tr>
                {/foreach}
                </tbody>
            </table>
        </div>
    </div>
{include file='footer.tpl'}
