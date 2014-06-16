## Dicionário de dados

> Ferramenta criada para auxiliar na organização do dicionário de dados das base de dados já existentes.
> Um tema para o wordpress foi desenvolvido para coordenar o fluxo que um usuário precisa ter ao preencher as informações do dicionário de dados.

### Requerimentos

#### Servidor
* PHP 5.4 (ou mais recente)
* Mysql 5.1 (ou mais recente)
* Apache com mod_rewrite habilitado
* Wordpress 3.9 (ou mais recente)
* WP-cli (opcional)

#### Frontend
* NPM (v1.3.21)
* Bower (v1.3.3)
* Compass (v0.12.3)
* Grunt-cli (v0.1.13)

### Como instalar

1. Crie um banco de dados no mysql e dê as permissões ao usuário

```
mysql -u root -p -e "CREATE DATABASE IF NOT EXISTS dicionario_dados"
mysql -u root -p -e "GRANT ALL PRIVILEGES ON dicionario_dados.* TO wp@localhost IDENTIFIED BY 'wp';"
```

2. Baixe o wordpress e faça a configuração inicial

```
wp core download --locale=pt_BR
wp core config --dbname="dicionario_dados" --dbuser=external --dbpass=external --dbhost="vvv.dev"
wp core install --url=localhost:8000 --title="[homologa]Catálogo Municipal de Base de Dados" --admin_user=root --admin_password=root --admin_email=root@root.com
```

3. Ativar plugin obrigatório e o tema a ser utilizado

```
wp plugin activate timber-library
wp theme activate cmbd
```

4. Configurar o Apache para utilizar o mod_rewrite

``` 
cp .htaccess.example .htaccess 
```

5. Instalando os pacotes necessários para o frontend

```
cd wp-content/themes/cmbd/
npm install
bower install
```