# teste-crud
 Crud em Lavarel

### Sistema e Lógica

O Sistema foi desenvolvido em Lavarel com a utilização de um banco de dados em MySQL. O Dump do Banco de Dados encontra-se na raiz do diretório. 

O sistema foi desenvolvido utilizando o pattern MVC tendo o Lavarel como Framework. O Banco de Dados está setado para o DB_Name de crud e utiliza o usuário como crud e senha crud123. Então para a utilização do sistema é necessário a criação do banco de dados, ou então a utilização do Artisan para migrar as tabelas.

A lógica do sistema é muito simples, foi utilizado o próprio sistema de rotas do Lavarel para todas as funcionalidades do CRUD.
Optei por utilizar uma biblioteca do Jquery, o DataTables para fazer as consultas e paginação por questão de tempo.

Todos as funcionalidades para os registros é feito através de acesso por rotas diretamente no backend, com excessão do método deletar que é utilizado uma requisição AJAX.

O método de deletar não é possível quando o registro é do estado de São Paulo e tem como plano o Free. 

O CRUD de Planos não foi implementado devido a documentação exigir apenas o módulo de Usuários(Clientes). No método de cadastro do cliente, existe uma lista de checkbox contendo os planos, possibilitando assim atribuir mais de um plano para o mesmo cliente.

As tabelas foram criadas com relacionamento, exigindo assim o modo InnoDB para a criação do banco de dados.

O Frontend foi utilizado o básico do Bootstrap 4, javascript puro e uma adição da biblioteca do Jquery para o Datatables.
Não foi utilizado nenhuma formatação de estilos, mantendo tudo como o padrão do Bootstrap.
