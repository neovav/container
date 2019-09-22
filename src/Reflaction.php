<?php
namespace neovav\Containers;

/**
 * Class for Reflaction php
 *
 * @author neovav <neovav@@outlook.com>
 * @date 2019.09.15 10:15
 * @version 0.0.1
 */

class Reflaction
{

    /** @var string         Reflaction class author           */
    const AUTH      = 'NeoVAV';

    /** @var string         Number version                  */
    const VERSION   = '0.0.1';


    /**
     * Retrieving a list of constant values ​​from a class using a prefix
     *
     * @param \ReflectionClass $ref
     * @param string $prefix
     *
     * @return array
     */

    public static function getListConstVal(\ReflectionClass $ref, string $prefix) :array
    {
        $ret = false;

        if ($ref instanceof \ReflectionClass) {

            $list = array();
            $arr = $ref->getConstants();
            if (!is_null($arr) && !empty($arr) && is_array($arr)) {
                foreach (array_keys($arr) as $con) {
                    if (mb_strpos($con, $prefix)===0) {
                        $list[] = $arr[$con];
                    };
                };
                if (!empty($list)) {
                    $ret = $list;
                };
            };
        };

        return $ret;
    }


    /**
     * Getting a list of arrays of class constant values ​​by prefix
     *
     * @param \ReflectionClass $ref
     * @param string $prefix
     *
     * @return array
     */

    public static function getListConstValArray(\ReflectionClass $ref, string $prefix) :array
    {
        $ret = false;
        if($ref instanceof \ReflectionClass) {

            $list = [];
            $arr = $ref->getConstants();

            if(!is_null($arr) && !empty($arr) && is_array($arr)) {

                foreach(array_keys($arr) as $con) {

                    if(mb_strpos($con,$prefix)===0) {

                        $list[$arr[$con]] = null;
                    };
                };

                if (!empty($list)) {

                    $ret = $list;
                };
            };
        };

        return $ret;
    }


    /**
     * Getting a list of class constant names by prefix
     *
     * @param \ReflectionClass $ref
     * @param string $prefix
     *
     * @return array
     */

    public static function getListConstName(\ReflectionClass $ref, string $prefix) :array
    {
        $ret = false;
        if ($ref instanceof \ReflectionClass) {

            $list = [];
            $arr = $ref->getConstants();

            if (!is_null($arr) && !empty($arr) && is_array($arr)) {
                foreach (array_keys($arr) as $con) {
                    if (mb_strpos($con,$prefix)===0) {
                        $list[] = $con;
                    };
                };

                if (!empty($list)) {
                    $ret = $list;
                };
            };
        };
        return $ret;
    }
}