
                    SISTEMA DE UMA LIVRARIA. CRUD; 
                    De: Isaac Rodrigues da Silva
--------------------------------------------------------------------------------------------------------
PRIMEIROS PASSOS:
# instale um server.
=   xampp, wamp server, laragon, laravel, etc... O importante é ter instalado algum de sua preferencia.

# configure o DB
= Ligue o apache e o mysql de seu servidor. Vá em admin para abrir a tela principal do server. Importe o banco livraria_socorro.sql para o seu servidor. Irá gerar as tabelas do banco.

# conexao.php 
= Troque as define para os corretos conforme seu servidor.

---------------------------------------------------------------------------------------------------------

## //EXPLICAÇÃO

# VIEW/INDEX 
= A página index contem o layout inicial. com botoes para INCLUIR clientes e livros. E também visualizar ambos.

# VIEW/editarLivro 
= Formulário para editar os livros. Onde é levado por POST, até o arquivo controller/editarLivro;

# VIEW/editarCliente 
= Formulário para editar os clientes. Onde é levado por POST, até o arquivo controller/editarCliente;

# MODEL/banco
= Contém as funções do crud.

# MODEL/cliente 
= Contem os getters and setters do cliente;

# MODEL/livro 
= Contem os getters and setters do livro;

# CONTROLLER/editarCliente 
= contém a classe editarCliente, chamando métodos de pesquisarCliente e editarClientes. Cujo objetivo é receber os dados do cliente com os gets para exibir nos inputs. E chamar através do Post para editar os dados.

# CONTROLLER/editarLivro 
= contém a classe editarLivro, chamando métodos de pesquisarLivro e editarLivro. Cujo objetivo é receber os dados do cliente com os gets para exibir nos inputs. E chamar através do Post para editar os dados.

# CONTROLLER/excluirCliente 
= Como objetivo, excluir a tabela que contém um campo especifico definido pelo usuário. Fazendo a exclusão dos dados. Onde chama funções do arquivo model/banco.php.

# CONTROLLER/excluirLivro 
= Como objetivo, excluir a tabela que contém um campo especifico definido pelo usuário. Fazendo a exclusão dos dados. Onde chama funções do arquivo model/banco.php.

# CONTROLLER/exibir 
= Dentro da classe exibirLivros, se inicializa a funcao exibirListaLivros(). Onde contem funções do model/banco.php para fazer todo o get dos dados. Fazendo se iniciar uma $row para cada livro cadastrado, sendo da mesma forma para os Clientes.

# CONTROLLER/incluir 
= através da função incluirCliente, com os sets, faz com que recebam com o método POST, os conteúdos dos inputs. Da mesma forma para o IncluirLivros;


