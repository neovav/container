<?php
namespace neovav\Samples;

use neovav\Containers\Container;

require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

class PeopleContainer extends Container
{
    const __PEOPLE = 'People';
    const __PHONE  = 'Phone';
    const __EMAIL  = 'Email';
};

class CarsContainer extends Container
{
    const __MANUFACTURER    = 'Manufacturer';
    const __MODEL           = 'Model';
};

$people = new PeopleContainer();

$people->add(PeopleContainer::__PEOPLE, 'Jon');

var_dump($people);
var_dump($people->get(PeopleContainer::__PEOPLE));

var_dump($people->setPeople('Frank'));
var_dump($people->get(PeopleContainer::__PEOPLE));
var_dump($people->getPeople());

var_dump($people->People('Zorg'));
var_dump($people->get(PeopleContainer::__PEOPLE));
var_dump($people->People());

try {
    $people->add('Any', 'Jon');
} catch(\Exception $e) {
    var_dump($e);
}

$car = new CarsContainer();

$car->add(CarsContainer::__MANUFACTURER, 'Ford');

var_dump($car);
var_dump($car->get(CarsContainer::__MANUFACTURER));

var_dump($car->setManufacturer('BMW'));
var_dump($car->get(CarsContainer::__MANUFACTURER));
var_dump($car->getManufacturer());

var_dump($car->Manufacturer('Kia'));
var_dump($car->get(CarsContainer::__MANUFACTURER));
var_dump($car->Manufacturer());

try {
    $car->add('Any', 'Hundai');
} catch(\Exception $e) {
    var_dump($e);
}