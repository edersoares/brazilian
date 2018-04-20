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

Use as a model class directly or like a base model:

- `Brazilian\Bank`
- `Brazilian\State`
- `Brazilian\State`

A example for a bank custom model:

```php
use Brazilian\Bank;

class BankCustomModel extends Bank
{
    public function hasCode()
    {
        return $this->id < 1000;
    }
}
```

A example for a city custom model:

```php
use Brazilian\City;

class CityCustomModel extends City
{
    public function isCapital()
    {
        return $this->state->capital_id === $this->id;
    }
}
```

A example for a state custom model:

```php
use Brazilian\State;

class StateCustomModel extends State
{
    public function getCapitalName()
    {
        return $this->capital->name;
    }
}
```

### Tables

Below, the tables that will be created in database.

#### Bank

- Table name: brazilian_banks
- Primary key: id

| Column   | Type    |
|----------|---------|
| id       | integer |
| name     | string  |
| agencies | integer |

#### State

- Table name: brazilian_states
- Primary key: id
- Foreign key: capital_id
  - References: `Brazilian\City`

| Column       | Type    |
|--------------|---------|
| id           | integer |
| name         | string  |
| abbreviation | string  |
| capital_id   | integer |

#### City

- Table name: brazilian_cities
- Primary key: id
- Foreign key: state_id
  - References: `Brazilian\State`

| Column   | Type    |
|----------|---------|
| id       | integer |
| state_id | integer |
| name     | string  |

### Credits

The data were taken from Documents section in NF-e Portal. See [DTB 2014 Municipio](http://www.nfe.fazenda.gov.br/portal/listaConteudo.aspx?tipoConteudo=Iy/5Qol1YbE=).