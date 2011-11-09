# Plock Manager v0.5.2
[plock](https://github.com/hugodias/) é um gerenciador de clientes feito em cakephp para resolver o problema que muitas fábricas de software e agências de publicidade possuem, que é guardar e gerenciar de forma fácil e prática os dados de todos seus clientes.


Ele tem: 
-----

* Estrutura feita em MVC com [CakePHP](http://cakephp.org/)
* CSS utilizando o [BOOTSTRAP](http://twitter.github.com/bootstrap/) do twitter
* Front-end construido utilizando [CoffeeScript](http://jashkenas.github.com/coffee-script/)
* Importação de arquivos XML do [Filezilla](http://filezilla-project.org/)
* Validação automática do ftp de cada cliente informando se está acessível ou não
* Cadastro de servidores relacionado aos clientes
* Verificação automática de relação entre servidor -> cliente
* Controle de usuários com regras de acesso [ admin, manager, editor, developer, designer ]

#### Para utilizar você precisa ter:
* PHP 5.1 ou superior
* MySql 5.0 ou superior
* Mode Rewrite habilitado

##### Para desenvolver
* [Node.js](http://nodejs.org/)
* [CoffeeScript](http://jashkenas.github.com/coffee-script/)


#### Instalando

* Importe o arquivo `plock_database.sql` para seu banco de dados de preferência
* Acesse o arquivo `app/config/database.php` e coloque os dados do seu banco

``` php
var $default = array(
	'driver' => 'mysql',
	'persistent' => false,
	'host' => 'localhost',
	'login' => 'root',
	'password' => '',
	'database' => 'plock',
	'prefix' => '',
);
```

* Troque a URL base no arquivo `app/config/bootstrap.php` para a URL padrão do seu site. 

``` php
# Lembre SEMPRE de colocar uma barra no final da URL do seu site
Configure::write('BASE_URL','http://www.meusite.comb.br/');
```

#### Dados de acesso rápido

Usuário: `admin`

Senha: `admin`

#### TODO
* Exportar clientes em CSV, XML e HTML
* Integrar cada cliente com suas respectivas tarefas no [BASECAMP](http://basecamphq.com/) mostrando tarefas pendentes
* Separar contatos e emails em tabelas diferentes


Twitter Bootstrap Copyright and license
---------------------

Copyright 2011 Twitter, Inc.

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this work except in compliance with the License.
You may obtain a copy of the License in the LICENSE file, or at:

   http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.

