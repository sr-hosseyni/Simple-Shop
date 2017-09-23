<?php
namespace BCS\Helpers;
/**
 * Description of staticInstanceMaker
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
trait StaticInstanceMaker
{
    public static function getInstance()
    {
        return new static;
    }
}
