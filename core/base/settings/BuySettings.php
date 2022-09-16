<?php
namespace core\base\settings;
use core\base\settings\Settings;

class BuySettings
{
    static private $_instance;
    private $mainSettings;

    private $templateArr = [
      'text'=> ['price',  'short'],
      'textarea'=> ['goods']
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
      self::$_instance = new self;
      self::$_instance->mainSettings = Settings::instance();
      $mainProps = self::$_instance->mainSettings->combProps(get_class());
      self::$_instance->setProps($mainProps);
      return self::$_instance;
    }
   
    protected function setProps($properties)
    {
       if($properties){
        foreach($properties as $name=>$property){
          $this->$name = $property;
        }
       }
    }

    static public function get($prop){
       return self::instance()->$prop;
    }
}