 Container lib
 ===============
 
 This is sample how use Container lib
 
 <!-- [START getstarted] -->
 ## Getting Started
 
 ### Installation
 
 For installations neovav\Containers, run:
 
 ```bash
 git clone https://github.com/neovav/container.git
 cd container
 composer install
 ```
 
 ### Usage
 
 ```php
 use neovav\Containers\Container;
 
 require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';
 
 class PeopleContainer extends Container
 {
     const __PEOPLE = 'People';
     const __PHONE  = 'Phone';
     const __EMAIL  = 'Email';
 };
 
 $people = new PeopleContainer();
 
 $people->add(PeopleContainer::__PEOPLE, 'Jon');
 
 var_dump($people);
 var_dump($people->get(PeopleContainer::__PEOPLE));
 ```
 
 For more samples view in directory : samples
 Main file in samples: samples/sample.php