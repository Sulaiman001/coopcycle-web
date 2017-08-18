<?php

namespace AppBundle\Command;

use Faker\Provider\Base as BaseProvider;

class RestaurantProvider extends BaseProvider
{
    /* Formats */

    protected static $restaurantFormats = array(
        '{{restaurantPrefix}} {{restaurantSuffix}}',
    );

    protected static $appetizerFormats = array(
        '{{appetizerMainIngredient}} {{appetizerAdditionalIngredient}}',
    );

    protected static $dishFormats = array(
        '{{dishMainIngredient}} {{dishAdjective}} {{dishAdditionalIngredient}}',
        '{{dishMainIngredient}} {{dishAdditionalIngredient}}',
    );

    protected static $dessertFormats = array(
        '{{dessertMainIngredient}} {{dessertAdditionalIngredient}}',
    );

    /* Restaurants */

    protected static $restaurantPrefixes = array(
        'la casserole', 'l\'assiette', 'la table', 'la chaise', 'la cagette',
        'l\'aubergine', 'l\'amande',
    );

    protected static $restaurantSuffixes = array(
        'qui danse', 'qui boit', 'qui fume', 'qui rit', 'qui chante',
        'gourmande', 'joyeuse', 'maline', 'rebelle',
        'du sud', 'bretonne', 'espagnole'
    );

    public function restaurantPrefix()
    {
        return static::randomElement(static::$restaurantPrefixes);
    }

    public function restaurantSuffix()
    {
        return static::randomElement(static::$restaurantSuffixes);
    }

    /* Appetizers */

    protected static $appetizerMainIngredients = array(
        'tomates fraîches', 'crudités', 'pickles', 'jambon cru'
    );

    protected static $appetizerAdditionalIngredients = array(
        'à l\'huile d\'olive', 'en salade', 'au naturel'
    );

    public function appetizerMainIngredient()
    {
        return static::randomElement(static::$appetizerMainIngredients);
    }

    public function appetizerAdditionalIngredient()
    {
        return static::randomElement(static::$appetizerAdditionalIngredients);
    }

    /* Dishes */

    protected static $dishMainIngredients = array(
        'poulet', 'escargots', 'grenouilles', 'aubergines', 'tomates',
        'courgettes', 'pommes de terre', 'boeuf', 'lapin',
    );

    protected static $dishAdjectives = array(
        'rôti·e·s', 'mi-cuit·e·s', 'poêlé·e·s', 'farci·e·s'
    );

    protected static $dishAdditionalIngredients = array(
        'aux herbes', 'en sauce', 'à la crème', 'au gros sel', 'au vin rouge',
        'aux pommes', 'aux carottes', 'aux oignons', 'au beurre', 'aux poivrons'
    );

    public function dishMainIngredient()
    {
        return static::randomElement(static::$dishMainIngredients);
    }

    public function dishAdjective()
    {
        return static::randomElement(static::$dishAdjectives);
    }

    public function dishAdditionalIngredient()
    {
        return static::randomElement(static::$dishAdditionalIngredients);
    }

    /* Desserts */

    protected static $dessertMainIngredients = array(
        'tarte', 'gâteau', 'clafoutis', 'moelleux', 'charlotte', 'crêpe', 'flan'
    );

    protected static $dessertAdditionalIngredients = array(
        'aux pommes', 'au chocolat', 'aux figues', 'aux pépites de chocolat',
        'aux raisons secs', 'aux fruits confits', 'à la rhubarbe', 'au sucre glace',
        'au café'
    );

    public function dessertMainIngredient()
    {
        return static::randomElement(static::$dessertMainIngredients);
    }

    public function dessertAdditionalIngredient()
    {
        return static::randomElement(static::$dessertAdditionalIngredients);
    }

    /* API */

    public function restaurantName()
    {
        $format = static::randomElement(static::$restaurantFormats);

        return ucfirst($this->generator->parse($format));
    }

    public function appetizerName()
    {
        $format = static::randomElement(static::$appetizerFormats);

        return ucfirst($this->generator->parse($format));
    }

    public function dishName()
    {
        $format = static::randomElement(static::$dishFormats);

        return ucfirst($this->generator->parse($format));
    }

    public function dessertName()
    {
        $format = static::randomElement(static::$dessertFormats);

        return ucfirst($this->generator->parse($format));
    }
}