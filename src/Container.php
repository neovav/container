<?php
namespace neovav\Containers;

/**
 * Universal class  the container  containing array with data
 *
 * @author neovav <neovav@@outlook.com>
 * @date 2019.09.15 09:50
 * @version 0.0.1
 */

class Container
{

    /** @var string         Container class author           */
    const AUTH      = 'NeoVAV';

    /** @var string         Number version                  */
    const VERSION   = '0.0.1';

    const EX_ITEM_IS_MISSING    = 1;
    const EX_METHOD_NOT_EXIST   = 2;

    private $data = [];

    protected static $prefix = '__';

    private static $kyesList = [];


    /**
     * Check for a constant
     *
     * @param string|int $name
     *
     * @return bool;
     */

    public static function isElement($name)
    {
        $list = self::GetList();

        if(in_array($name, $list)) {
            $ret = true;
        } else {
            $ret = false;
        };

        return $ret;
    }


    /**
     * Adding item to array
     *
     * @param string|int $name
     * @param mixed $value
     *
     * @return $this;
     * @throws ContainerException
     */

    public function add($name, $value)
    {
        if(!$this->isElement($name)) {
            throw new ContainerException('This item is missing', self::EX_ITEM_IS_MISSING);
        };

        $this->data[$name] = $value;

        return $this;
    }


    /**
     * Getting item from array
     *
     * @param string|int $name
     *
     * @return mixed
     *
     * @throws ContainerException
     */

    public function get($name)
    {
        if(!$this->isElement($name)) {
            throw new ContainerException('This item is missing', self::EX_ITEM_IS_MISSING);
        };
        return $this->data[$name];
    }


    /**
     * Получить массив данных
     *
     * @return array
     */

    public function getAll() :array
    {
        return self::$kyesList;
    }


    /**
     * Get list with data
     *
     * @return array
     *
     * @throws | \Exception
     */

    public static function getList() :array
    {
        $class = get_called_class();
        if (empty(self::$kyesList[$class])) {

            $refClass = new \ReflectionClass($class);
            $ret = Reflaction::getListConstVal($refClass, static::$prefix);
            self::$kyesList[$class] = $ret;
        };

        return self::$kyesList[$class];
    }


    /**
     * Check for the existence of an element
     *
     * @param string|int
     *
     * @return bool
     */

    public function chk($name)
    {
        $ret = false;
        if (!empty($name) && in_array($name, array_keys($this->data), true)) {
            $ret = true;
        }
        return $ret;
    }


    /**
     * Check that the item is not empty
     *
     * @param string|int $name
     *
     * @return bool
     */

    public function isEmpty($name)
    {
        $ret = false;
        if(empty($name) || empty($this->data[$name])) {
            $ret = true;
        }
        return $ret;
    }


    /**
     * Delete item
     *
     * @param string|int $name
     *
     * @return $this
     */

    public function del($name)
    {
        if (!$this->isEmpty($name)) {
            unset($this->data[$name]);
        }

        return $this;
    }


    /**
     * Magic method for get or set parameters
     *
     * @param string $name
     * @param array $arguments
     *
     * @return mixed
     *
     * @throws ContainerException
     */

    public function __call($name, array $arguments = null)
    {
        $isSet = false;
        $argument = null;
        if (mb_strpos($name, 'get') !== 0
            && mb_strpos($name, 'set') !== 0
        ) {
            $paramName = $name;
            if (in_array(0, array_keys($arguments), true)) {
                $isSet = true;
                $argument = $arguments[0];
            }
        } else {
            $paramName = mb_substr($name, 3, null, 'utf-8');
            if (mb_strpos($name, 'set') === 0) {
                if (!is_array($arguments) || empty($arguments[0])) {
                    $arguments = [0 => null];
                };
                $isSet = true;
                $argument = $arguments[0];
            };
        };

        if ($isSet) {
            $ret = $this->add($paramName, $argument);
        } else {
            $ret = $this->get($paramName);
        };

        return $ret;
    }
}