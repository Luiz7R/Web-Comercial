# Web-Comercial
## Utilizando CodeIgniter-PHP-MySQL-AJAX

* Configurações da maquina onde foi testado
* Windows Version: Windows 7 Home Basic SP1 64-bit
* versão do xampp: XAMPP Version: 7.4.1
* Control Panel Version: 3.2.4  [ Compiled: Jun 5th 2019 ]



### Antes de Começar - Instalando em Windows.

* Programas Requisitados 
   
   * Xampp 
   * Download : https://www.apachefriends.org/pt_br/download.html
	
	* phpmyAdmin
	* Download : https://www.phpmyadmin.net/
	* Instalação : Coloque a pasta phpMyAdmin dentro do htdocs, localizado em C:\xampp\htdocs.
	* Encontre a pasta PHP localizado em C:\xampp\, localizando a pasta PHP.
	* Renomeie o arquivo "php.ini-production" para php-ini. agora já renomeado abra o arquivo "php.ini",
	* no bloco de notas, Encontre a linha de texto "extension=php_mbstring.dll" e remova o ponto e vírgula.
	* Agora salve e seu servidor phpMyAdmin estará pronto para o uso.
	*
	* Tutorial explicando passo a passo com fotos: https://pt.wikihow.com/Instalar-o-phpMyAdmin-em-Seu-PC-do-Windows

<br>

Clonar o projeto 

* git clone https://github.com/Luiz7R/web.git



## Banco de Dados

Exportar o banco de dados nomeado web1.sql,

* no PHPMyAdmin. com o phpmyadmin aberto vai em importar

* Ache a seguinte parte : Procurar no seu computador: e Escolha 
o arquivo : web1.sql

* Apos selecioná-lo clique em executar

* Como mostra as imagens abaixo.

[](url)
![ImportarBancoDeDados](https://user-images.githubusercontent.com/54550561/84551243-5e6d5a80-ace3-11ea-8ae9-b9f8e71f75ed.png)

[](url)
![EscolherBancoDeDados](https://user-images.githubusercontent.com/54550561/84551344-adb38b00-ace3-11ea-802d-35819e662d52.png)

[](url)
![BancoDeDadosEscolhido](https://user-images.githubusercontent.com/54550561/84551406-ebb0af00-ace3-11ea-9cfa-90c42e83a22d.png)

[](url)
![ExecutarBanco](https://user-images.githubusercontent.com/54550561/84551420-fc612500-ace3-11ea-99b8-fc4069ae0b38.png)

### Agora que o banco de dados foi adicionado ao phpmyadmin vamos para o código!


## Instalando o código

* Após baixar o código em caso de .zip copiar a pasta web-master,
* para a pasta htdocs, localizada em C:\xampp\htdocs
* ficará assim então, C:\xampp\htdocs\web-master

### Caso tiver clonado o arquivo
* Coloque o arquivo na pasta htdocs
* localizada em C:\xampp\htdocs
* ficando assim então, C:\xampp\htdocs\web-master


## Após instalado

* Cerifique-se de ter ligado, as seguintes partes
* No XAMPP Control Panel
* Apache , MySQL, clique em start nas duas opções

* Veja as Imagens abaixo

[](url)
![LigandoXamppControl panel](https://user-images.githubusercontent.com/54550561/84552516-6f1fcf80-ace7-11ea-855e-e4e3a94d5ef9.png)

[](url)
![Ligado XamppControl panel](https://user-images.githubusercontent.com/54550561/84552534-819a0900-ace7-11ea-9aee-6b168100d7a2.png)


### Hora de entrar no site

* Essa é a pagina inicial do site

* Endereço : http://localhost/web/index.php/

* Terão as opções de logar e cadastrar.

* Apos realizar o cadastro, aparecerá os produtos

[](url)
![produtosSite](https://user-images.githubusercontent.com/54550561/84552887-afcc1880-ace8-11ea-9d76-4e79d2462d0e.png)

* Terá a opção de comprar, ao clicar em comprar o produto será adicionado ao carrinho

* Carrinho

[](url)
![Carrinho-Produtos](https://user-images.githubusercontent.com/54550561/84553450-b6f42600-acea-11ea-83b0-d0ba04f0bc67.png)

* No carrinho você pode aumentar a quantidade de um determinado produto.
* ou remover o mesmo.


### Finalizar o pedido

* Ao clicar em finalizar, vai mostrar os pedidos do carrinho 
* o valor total do pedido e a opção de escolher a forma de pagamento
* Como é seu primeiro pedido o Endereço de entrega não está cadastrado
* Então você poderar cadastrar o endereço.

[](url)
![FinalizarPedido](https://user-images.githubusercontent.com/54550561/84553865-bb6d0e80-aceb-11ea-90b0-b4ae5f05f73a.png)

* Ao clicar em fechar pedido, mostra a mensagem pedido foi realizado com sucesso
* E todas as informações do pedido

[](url)
![PedidoRealizadoComSucesso](https://user-images.githubusercontent.com/54550561/84553955-2cacc180-acec-11ea-909a-1645406d602e.png)


* E ao clicar em conta na pagina inicial , mostra os pedidos realizados , e a opção de ver o pedido em pdf, ou enviar os pedidos ao seu e-mail.  

<br>
<br>  


## Administrador

* Agora quando uma conta é administrador.
* mostra os usuários,produtos e pedidos cadastrados.
* e tem a opção de Criar, Editar e Deletar os pedidos e produtos.
* E editar e deletar os usuários.
* Navega entre os três pela barra.

* nas configurações do gmail, do email que você usará ative a opção:
* Acesso a app menos seguro, nas configurações de segurança, precisou disso 
* pra poder mandar Email pelo phpMailer, caso queira crie uma conta nova
* para evitar problemas.
* Observação antes de enviar email da lista de pedidos 
  colocar o Email do gmail no arquivo views/enviarEmail.php é também no arquivo conta.php , lá esta explicando tudo direito.


<br>

Conta usada apenas para testes 
<br>


```

Conta de administrador

Email: joao@joao.com
Senha: joao

```

<br>


[](url)
![pedidosCadastrados](https://user-images.githubusercontent.com/54550561/84554612-0b99a000-acef-11ea-8ae1-b98956d1c161.png)

[](url)
![produtosCadastrados](https://user-images.githubusercontent.com/54550561/84554650-32f06d00-acef-11ea-9d85-10c5e65c211d.png)








