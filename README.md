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
