# little

## O que é?
**little** é um framework desenvolvido para auxiliar novos programadores na arquitetura <a href='#mvc'>*MVC*</a>, além disso, também tem como objetivo ajudar os programadores a serem introduzidos ao uso de um framework.  

## Por que?
Muitas dúvidas surgem a cada avanço no estudo de uma linguagem, nesse caso o PHP. Pensando nessas dúvidas resolvi criar esse framework para ajudar um pouco a sanar as possíveís dúvidas que surgem.  

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

## O Framework

O framework utiliza alguns nomes em inglês para ajudar na introdução de desenvolvedores ao mundo dos frameworks, onde os principais frameworks são completamente em inglês. A pasta APP, é nela que seus arquivos deverão ficar, na qual existe subdivisões, como:  

<a href='#rotas'>Rotas</a>  
<a href='#database'>Database</a>  
<a href='#models'>Models</a>  
<a href='#view'>Views</a>  
<a href='#controllers'>Controlers<a/>  

<p id='rotas'></p>

### Rotas

Adicione suas rotas no arquivo App/web.php com a seguinte configuração:  
```php
Route::add(['/', 'Exemplo', 'hello']);
```
Onde o primeiro parametro do array é a sua uri, o segundo a sua classe que está na pasta controller e o terceiro parametro é o método desejado.  

#### Rotas Dinâmicas

Obtenha rotas dinâmicas acrescentando um @ onde será dinâmico, como no exemplo:  
```php
Route::add(['/detalhe/@', 'Start', 'detalhes']);
```

<p id='database'></p>

### Database

Abra o arquivo App/db.ini será o arquivo de configguração com o banco de dados, importante frisar que só é possível conxão utilizando o banco mysql. No arquivo você encontrará 4 itens a ser configurado:  

>HOST=localhost onde este é o caminho do banco de dados.
>
>DBNAME=exemplo onde este será o nome do database criado.
>
>USER=test código do usuário do banco.
>
>PASS=123 senha do usuário do banco.

<p id='models'></p>

### Models

Dentro da pasta App/Models/ ficará suas models, na qual sempre que uma classe represente um tabela no banco, deverá estender a classe Table:  
```php
namespace App\Models;

use Config\Model\Table;

class MyModel extends Table
```

E ainda atribuir o nome da tabela ao atributo estático **table**:  
```php
namespace App\Models;

use Config\Model\Table;

class MyModel extends Table
{
    protected $table = "mymodel";
}
```
Tornando sua classe uma Table e assim adquirindo novos métodos, como:  
*find()* - retorna a tupla de um dado especifico:  
```php
public function hello()
{
    Client::find('id', $url[1]);
}
```
Onde o primeiro parametro é a coluna do banco, e o segundo o valor que se deseja buscar.  

*all()* - retorna todos os dados da tabela:  
```php
public function hello()
{
    Client::all();
}
```

*insert()* - insere um valor no banco, retornando true se inserido:  
```php
public function hello()
{
    Client::insert(['id' => $id, 'nome' => $nome, 'email' => $email])
}
```
Um array é passado, onde o indice é a coluna do banco e a chave o valor a ser inserido.  

*delete()* - exclui determinado valor do banco, retornando true se o dado for excluído com sucesso:  
```php
public function hello()
{
    Client::delete('id', $id)
}
```
Onde o primeiro parametro é a coluna do banco, e o segundo parametro é o valor o qual se deseja excluir.  

*update()* - atualiza determinado dado do banco retornando true se atualizado com sucesso:  
```php
public function hello()
{
    Client::update("nome", $nome, 'nome', '\''.$antigoValor.'\'');
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

class Exemple extends Controller
{
}
```

As classes que estenderem de Controller, herdarão um método chamado template, seu uso será para chamar a view desejada, evitando assim o uso de require:  
```php
class Exemple extends Controller
{
    public function hello()
    {
        return $this->template('index');
    }
}
```

## MAIS

Como o framework é bem limitado, pode ser acrescido de novas funcionalidades, veja a página de [configuração do framework](https://github.com/fsoaresjunior/config), faça um fork e melhore o mesmo.  
