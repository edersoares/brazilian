# Brazilian

A package for Laravel about Brazil.

Populate the database with brazilian states and brazilian cities.

## Installation

````bash
# Require the package
composer require edersoares/brazilian

# Install
php artisan brazilian:install
````

## Usage

Use `Brazilian\City` or `Brazilian\State` model class.

### State

- Table name: brazilian_states
- Primary key: id

| Column       | Type    | 
|--------------|---------|
| id           | integer |
| name         | string  |
| abbreviation | string  |

### City

- Table name: brazilian_cities
- Primary key: id

| Column   | Type    | 
|----------|---------|
| id       | integer |
| state_id | integer |
| name     | string  |

### Credits

The data were taken from Documents section in NF-e Portal. See [DTB 2014 Municipio](http://www.nfe.fazenda.gov.br/portal/listaConteudo.aspx?tipoConteudo=Iy/5Qol1YbE=).