# little

## O que é?
**little** é um framework desenvolvido para auxiliar novos programadores na arquitetura <a href='#mvc'>*MVC*</a>, além disso, também tem como objetivo ajudar os programadores a serem introduzidos ao uso de um framework.  

## Por que?
Muitas dúvidas surgem a cada avanço no estudo de uma linguagem, nesse caso o PHP. Pensando nessas dúvidas, resolvi criar esse framework para sanar as possíveis dúvidas que surgem em relação a *MVC* e *Framework*.  

<p id='mvc'></p>

## O Que é MVC?

É nada mais que um padrão de arquitetura de software, separando sua aplicação em 3 camadas. A camada de interação do usuário(view), a camada de manipulação dos dados(model) e a camada de controle(controller).  

>Model - é camada que manipula dados. Ele é responsável pela leitura e escrita de dados, e também de suas validações.
>
>View - é a camada de interação com o usuário. Tudo o que ele ver, deve vir dessa camada.
>
>Controller - faz a interligação entre as camadas Model e View. É ele quem decide o que usar e quando usar.

## Instalação
Para usufruir dos recurso do framework tenha instalado em seu equipamento:
* PHP 7.0 >=
* MySQL
* Composer  

Caso tudo esteja certo, rode o comando abaixo, substituindo *path* pelo nome da sua aplicação:
```json
composer create-project little/little path
```    

#### Para uma melhor utilização, crie um virtualhost ou utilize o servidor embutido do PHP  

## O Framework

O framework utiliza alguns nomes em inglês para ajudar na introdução de desenvolvedores ao mundo dos frameworks, onde os principais frameworks são completamente em inglês. A pasta APP, é nela que seus arquivos deverão ficar, na qual existe subdivisões, como:  

<ul> 
    <li><a href='#rotas'>Rotas</a></li>
    <li><a href='#database'>Database</a></li>
    <li><a href='#models'>Models</a></li>
        <ul>
            <li><a href='#table'>table</a></li>
            <li><a href='#all'>all()</a></li>
            <li><a href='#find'>find()</a></li>
            <li><a href='#insert'>insert()</a></li>
            <li><a href='#delete'>delete()</a></li>
            <li><a href='#update'>update()</a></li>
        </ul> 
    <li><a href='#view'>Views</a></li>
    <li><a href='#controllers'>Controlers<a/></li>
        <ul>
            <li><a href='#view'>view</a></li>
            <li><a href='#template'>template()</a></li>
            <li><a href='#input'>input()</a></li>
            <li><a href='#get'>get()</a></li>
        </ul> 
</ul>

<p id='rotas'></p>

### Rotas

Acesse o arquivo App/web.php. Você verá algo assim:  
```php
<?php

use Config\Init\Route;

Route::add(['/', 'Example', 'hello']);
```

A primeira linha é para criar um apelido para a classe Route, evitando que a cada vez que uma nova rota for adicionada, fosse necessário escrever todo o namespace da classe.  
A linha seguinte é um exemplo de uso de uma rota.  

### Adicionando rotas
Adicione suas rotas no arquivo App/web.php com a seguinte configuração:  
```php
Route::add(['/', 'Example', 'hello']);
```
Onde o primeiro parametro do array é a sua uri, o segundo, a sua classe que está na pasta App/Controllers/ e o terceiro parametro é o método desejado.  

#### Rotas Dinâmicas

Obtenha rotas dinâmicas acrescentando um @ onde será dinâmico, como no exemplo:  
```php
Route::add(['/detalhe/@', 'Example', 'detalhe']);
```

<p id='database'></p>

### Database

Abra o arquivo App/db.ini será o arquivo de configguração com o banco de dados, **importante frisar que só é possível conexão utilizando o banco mysql**. No arquivo você encontrará 4 itens a serem configurados:  

>HOST=localhost onde este é o caminho do banco de dados.
>
>DBNAME=exemplo onde este será o nome do database criado.
>
>USER=test código do usuário do banco.
>
>PASS=123 senha do usuário do banco.

<p id='models'></p>

### Models

Dentro da pasta App/Models/ ficará suas models, na qual sempre que uma classe representar uma tabela no banco, deverá estender a classe Table:  
```php
namespace App\Models;

use Config\Model\Table;

class MyModel extends Table
```

Tornando sua classe uma Table e assim adquirindo novas funcionalidades, como:  

<p id="table"></p>

*table* - é um atributo estático no qual será atribuído o nome da tabela que se deseja utilizar:  
```php
namespace App\Models;Tornando sua classe uma Table e assim adquirindo novos métodos, como: 

use Config\Model\Table;

class MyModel extends Table
{
    protected static $table = "mymodel";
}
``` 

<p id="all"></p>
  
*all()* - retorna todos os dados da tabela:   
```php
public function hello()
{
    MyModel::all();
}
```

<p id="find"></p>
  
*find()* - retorna a tupla de um dado especifico:  
```php
public function hello()
{
    MyModel::find('id', $url[1]);
}
```  
Onde o primeiro parametro é a coluna do banco, e o segundo o valor que se deseja buscar.

<p id="insert"></p>

*insert()* - insere um valor no banco, retornando true se inserido:  
```php
public function hello()
{
    $id = 1;
    $nome = 'teste';
    $email = 'exemplo@email.com';
    MyModel::insert(['id' => $id, 'nome' => $nome, 'email' => $email])
}
```  
Um array é passado, onde o indice é a coluna do banco e a chave o valor a ser inserido.  

<p id="delete"></p>

*delete()* - exclui determinado valor do banco, retornando true se o dado for excluído com sucesso:  
```php
public function hello()
{
    MyModel::delete('id', $id)
}
```
Onde o primeiro parametro é a coluna do banco, e o segundo parametro é o valor o qual se deseja excluir.  

<p id="update"></p>

*update()* - atualiza determinado dado do banco retornando true se atualizado com sucesso:  
```php
public function hello()
{
    MyModel::update("nome", $nome, 'nome', '\''.$antigoValor.'\'');
}
```
Onde o primeiro parametro é a coluna que deseja atualizar, o segundo o valor atualizador, o terceiro a coluna na qual se deseja busca o valor, e o quarto parametro é o valor a ser atualizado.  

<p id='views'></p>

### Views
Dentro da pasta App/View/ ficaram suas views, na qual deverá ter a extensão .php  

<p id='controllers'></p>

### Controllers

Toda classe controller que for utilizada pela rota, deverá estender a classe **Controller**:  
```php
namespace App\Controllers;

use Config\Controller\Controller;

class Example extends Controller
{
}
```

As classes que estenderem de Controller, herdarão algumas propriedades descritos a seguir:  

<p id='view'></p>

*view* - atributo para enviar valores uma página de vizualização:  
```php
class Example extends Controller
{
    public function hello()
    {
        $this->view->exemplo = "Enviando dados para a view";
        return $this->template('index');
    }
}
```  

Na view você chamará o atributo igual como está na sua classe controller.

<p id='template'></p>

*template()* - método que serve para chamar a view desejada, evitando assim o uso de require:  
```php
class Example extends Controller
{
    public function hello()
    {
        return $this->template('index');
    }
}
```  

<p id='input'></p>

*input()* - método utilizado para retornar valores enviados via POST. Caso desejar pegar um valor especifico, basta passar o campo name do valor que se deseja pegar;
```php
class Example extends Controller
{
    public function hello()
    {
        $nome = $this->input('nome');
        return $this->template('index');
    }
}
```  

Caso nenhum valor seja passado por parâmetro, o método input() retornará um array com todos os valores enviados via POST.  
```php
class Example extends Controller
{
    public function hello()
    {
        $valoresDePost = $this->input();
        return $this->template('index');
    }
}
```  

<p id='get'></p>

*get()* - método para retorna valores do tipo GET. Este método retorna um array de valores do tipo GET.  
```php
class Example extends Controller
{
    public function hello()
    {
        $valoresDeGet = $this->get();
        return $this->template('index');
    }
}
``` 

## Mais Informações

Como o framework é bem limitado, pode ser acrescido de novas funcionalidades, veja a página de [configuração do framework](https://github.com/fsoaresjunior/config), faça um fork e melhore o mesmo.  
