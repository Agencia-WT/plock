# Plock Manager
[plock](https://github.com/hugodias/plock) é um gerenciador de clientes feito em cakephp para resolver o problema que muitas fábricas de software e agências de publicidade possue, que é guardar e gerenciar de forma fácil e prática os dados de todos seus clientes.

#### Ele tem:

* Estrutura feita em MVC com [CakePHP](http://cakephp.org/)
* CSS utilizando o [BOOTSTRAP](http://twitter.github.com/bootstrap/) do twitter
* Front-end construido utilizando [CoffeeScript](http://jashkenas.github.com/coffee-script/)
* Controle de usuários

#### Para utilizar você precisa ter:
* PHP 5.1 ou superior
* MySql 5.0 ou superior
* Mode Rewrite habilitado

#### Para começar, modifique o arquivo `/app/config/database.php` com os dados do seu banco de dados:

```php
var $default = array(
	'driver' => 'mysql',
	'persistent' => false,
	'host' => 'localhost',
	'login' => 'root',
	'password' => 'root',
	'database' => 'plock',
	'prefix' => '',
);
```
#### Crie as tabelas
Usuários
```sql
CREATE  TABLE IF NOT EXISTS `users` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `username` VARCHAR(45) NULL ,
  `password` VARCHAR(45) NULL ,
  `email` VARCHAR(45) NULL ,
  `created` VARCHAR(45) NULL ,
  `modified` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
```
Clientes
```sql
CREATE  TABLE IF NOT EXISTS `clientes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NULL ,
  `contato_1` VARCHAR(45) NULL ,
  `contato_2` VARCHAR(45) NULL ,
  `ftp` VARCHAR(45) NULL ,
  `senha_ftp` VARCHAR(45) NULL ,
  `telefone_1` VARCHAR(45) NULL ,
  `telefone_2` VARCHAR(45) NULL ,
  `telefone_3` VARCHAR(45) NULL ,
  `email_1` VARCHAR(45) NULL ,
  `senha_1` VARCHAR(45) NULL ,
  `email_2` VARCHAR(45) NULL ,
  `senha_2` VARCHAR(45) NULL ,
  `email_3` VARCHAR(45) NULL ,
  `senha_3` VARCHAR(45) NULL ,
  `facebook_user` VARCHAR(45) NULL ,
  `facebook_senha` VARCHAR(45) NULL ,
  `twitter_user` VARCHAR(45) NULL ,
  `twitter_senha` VARCHAR(45) NULL ,
  `flickr_user` VARCHAR(45) NULL ,
  `flickr_senha` VARCHAR(45) NULL ,
  `observacoes` TEXT NULL ,
  `created` VARCHAR(45) NULL ,
  `modified` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
```

