# Teste técnico para Pessoa Desenvolvedora Back-end Plena
### by: Gabriel Teixeira de Carvalho
### Email: gt3ixeira@gmail.com

### Comandos nescessarios 
Para executar o projeto: ```./vendor/bin/sail up```

Seeders do projeto:

```php artisan db:seed --class=UserSeeder```

```php artisan db:seed --class=CidadeSeeder```

```php artisan db:seed --class=MedicoSeeder```

```php artisan db:seed --class=PacienteSeeder```

Configuração do banco de dados no .env:

```
DB_CONNECTION=mysql
DB_HOST=easy_consultation-mysql-1
DB_PORT=3306
DB_DATABASE=easyconsultationdb
DB_USERNAME=easyconsultation
DB_PASSWORD=root312@
```
