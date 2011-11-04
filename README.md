# Plock Manager v0.4
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
* Controle de usuários

#### Para utilizar você precisa ter:
* PHP 5.1 ou superior
* MySql 5.0 ou superior
* Mode Rewrite habilitado

##### Para desenvolver
* [Node.js](http://nodejs.org/)
* [CoffeeScript](http://jashkenas.github.com/coffee-script/)


#### Instalando

Acesse o arquivo `app/config/database.php` e coloque os dados do seu banco

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

#### Crie as tabelas clientes, users, ftps, servers, tasks

``` sql
CREATE  TABLE IF NOT EXISTS `clientes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NULL DEFAULT NULL ,
  `contato_1` VARCHAR(45) NULL DEFAULT NULL ,
  `contato_2` VARCHAR(45) NULL DEFAULT NULL ,
  `site_antigo` VARCHAR(255) NOT NULL ,
  `site` VARCHAR(255) NOT NULL ,
  `telefone_1` VARCHAR(45) NULL DEFAULT NULL ,
  `telefone_2` VARCHAR(45) NULL DEFAULT NULL ,
  `telefone_3` VARCHAR(45) NULL DEFAULT NULL ,
  `email_1` VARCHAR(45) NULL DEFAULT NULL ,
  `senha_1` VARCHAR(45) NULL DEFAULT NULL ,
  `email_2` VARCHAR(45) NULL DEFAULT NULL ,
  `senha_2` VARCHAR(45) NULL DEFAULT NULL ,
  `email_3` VARCHAR(45) NULL DEFAULT NULL ,
  `senha_3` VARCHAR(45) NULL DEFAULT NULL ,
  `observacoes` TEXT NOT NULL ,
  `created` VARCHAR(45) NULL DEFAULT NULL ,
  `modified` VARCHAR(45) NULL DEFAULT NULL ,
  `servers_id` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_clientes_servers1` (`servers_id` ASC) ,
  CONSTRAINT `fk_clientes_servers1`
    FOREIGN KEY (`servers_id` )
    REFERENCES `plock`.`servers` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 257
DEFAULT CHARACTER SET = latin1
```

``` sql
CREATE  TABLE IF NOT EXISTS `users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NOT NULL ,
  `username` VARCHAR(255) NOT NULL ,
  `password` VARCHAR(40) NOT NULL ,
  `email` VARCHAR(255) NOT NULL ,
  `created` DATETIME NOT NULL ,
  `modified` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1
```


``` sql
CREATE  TABLE IF NOT EXISTS `tasks` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(45) NULL DEFAULT NULL ,
  `conteudo` TEXT NULL DEFAULT NULL ,
  `data` VARCHAR(45) NULL DEFAULT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  `clientes_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_tasks_clientes` (`clientes_id` ASC) ,
  CONSTRAINT `fk_tasks_clientes`
    FOREIGN KEY (`clientes_id` )
    REFERENCES `plock`.`clientes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
```


``` sql
CREATE  TABLE IF NOT EXISTS `ftps` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `dominio` VARCHAR(255) NULL DEFAULT NULL ,
  `host` VARCHAR(255) NULL DEFAULT NULL ,
  `username` VARCHAR(255) NULL DEFAULT NULL ,
  `password` VARCHAR(255) NULL DEFAULT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  `clientes_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_ftps_clientes1` (`clientes_id` ASC) ,
  CONSTRAINT `ftps_ibfk_1`
    FOREIGN KEY (`clientes_id` )
    REFERENCES `plock`.`clientes` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 144
DEFAULT CHARACTER SET = latin1
```

``` sql
CREATE  TABLE IF NOT EXISTS `servers` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(255) NULL DEFAULT NULL ,
  `url` VARCHAR(255) NULL DEFAULT NULL ,
  `usuario` VARCHAR(255) NULL DEFAULT NULL ,
  `senha` VARCHAR(255) NULL DEFAULT NULL ,
  `ip` VARCHAR(255) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = latin1
```


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

