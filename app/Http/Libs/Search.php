<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04.04.2019
 * Time: 12:11
 */

namespace App\Http\Libs;


class Search
{
    const ACTION_GUIDES = '/guides/search';

    const ACTION_RESTAURANTS = '/restaurants/search';

    const ACTION_LOYAL_SPONSORS = '/loyal-sponsors/search';

    const ACTION_TOUR_OPERATORS = '/tour-operators/search';

    const ACTION_PLACEMENTS = '/placements/search';

    const COLUMNS_GUIDES = [
        ['value'=>'company_name', 'name'=>'Фирма'],
        ['value'=>'fullname', 'name'=>'ФИО'],
        ['value'=>'Education', 'name'=>'Образование'],
        ['value'=>'phone', 'name'=>'Телефон'],
        ['value'=>'email', 'name'=>'Почта']
    ];

    const COLUMNS_RESTAURANTS = [
        ['value'=>'title', 'name'=>'Наименование'],
        ['value'=>'contact_name', 'name'=>'Контактное лицо'],
        ['value'=>'phone', 'name'=>'Телефон'],
        ['value'=>'email', 'name'=>'Почта']
    ];

    const COLUMNS_LOYAL_SPONSORS = [
        ['value'=>'title', 'name'=>'Наименование'],
        ['value'=>'contact_name', 'name'=>'Контактное лицо'],
        ['value'=>'phone', 'name'=>'Телефон'],
        ['value'=>'email', 'name'=>'Почта'],
        ['value'=>'instagram_url', 'name'=>'instagram']
    ];

    const COLUMNS_TOUR_OPERATORS = [
        ['value'=>'title', 'name'=>'Наименование'],
        ['value'=>'contact_name', 'name'=>'Контактное лицо'],
        ['value'=>'phone', 'name'=>'Телефон'],
        ['value'=>'email', 'name'=>'Почта'],
    ];

    const COLUMNS_PLACEMENTS = [
        ['value'=>'title', 'name'=>'Наименование'],
        ['value'=>'type_id', 'name'=>'Вид'],
        ['value'=>'number_of_stars', 'name'=>'Звезд'],
        ['value'=>'address', 'name'=>'Адрес'],
        ['value'=>'contact_name', 'name'=>'Контактное лицо'],
        ['value'=>'phone', 'name'=>'Телефон'],
        ['value'=>'email', 'name'=>'Почта']
    ];

    private static $INSTANCE;

    public $action;

    public $columns;

    private function __construct(string $action, array $columns = [])
    {
        $this->action = $action;
        $this->columns = $columns;
    }

    public static function init(string $action, array $columns = []) {
        if (static::$INSTANCE === null)
            static::$INSTANCE = new static($action, $columns);

        return static::$INSTANCE;
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    private function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }
}