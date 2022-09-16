<?php
namespace core\base\settings;


class Settings
{
  static private $_instance;

  private $routes = [
    'admin' => [
     'alias' => 'admin',
     'path'=> 'core/admin/controllers/',
     'hrUrl' => false
    ],
    'settings' =>[
     'path' => 'core/base/settings/'
    ],
    'plugins' => [
        'path' => 'core/plugins/',
        'hrUrl' => false
    ],
    'user' => [
        'path' => 'core/user/controllers/',
        'hrUrl' => true,
        'routes' => [
          'product' => 'product'
        ]
    ],
    'default' => [
      'controller' => 'IndexController',
      'inputMethod' => 'inputData',
      'outputMethod' => 'outputData'
    ]
  ];

  private $templateArr = [
    'text'=> ['name', 'phone', 'adress'],
    'textarea'=> ['content', 'keywords']
];

  private function __construct()
  {

  }
  private function __clone()
  {
    
  }
  static public function instance()
  {
    if(self::$_instance instanceof self){
      return self::$_instance;
    }
    return self::$_instance = new self;
  }

  static public function get($prop){
     return self::instance()->$prop;
  }

  public function combProps($class)
  {
    $allProps= [];

    foreach($this as $proper => $item){
      $property = $class::get($proper);
      
      if(is_array($property)&&is_array($item)){
        $allProps[$proper] = $this->arrCombRec($this->$proper, $property);
        continue;
      }
      if(!$property) $allProps[$proper] = $this->$proper;
    }
    return $allProps;
  }

  public function arrCombRec()
  {
    $arrays = func_get_args();
    $first = array_shift($arrays);

    foreach ($arrays as $array){
      foreach($array as $key => $val){
        if(is_array($val) && is_array($first[$key])){
          $first[$key] = $this->arrCombRec($first[$key], $val);
        } else{
          if(is_int($key)){
            if(!in_array($val, $first)) array_push($first, $val);
            continue;
          }
          $first[$key] = $val;
        }
      }
    }
    return $first;
  }
}