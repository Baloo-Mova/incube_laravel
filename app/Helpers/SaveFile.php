<?php
/**
 * Created by PhpStorm.
 * User: Мова
 * Date: 11.09.2016
 * Time: 15:25
 */

namespace App\Helpers;

use App\Models\TableType;

trait SaveFile
{

    public function saveFiles($files)
    {
        $reflect = new \ReflectionClass(TableType::class);
        $tableId = $reflect->getConstant($this->getTableType());
        dd($tableId);
    }

    protected function getTableType()
    {
        $text = get_class($this);

        return trim(str_replace('Form', '', substr($text, strrpos($text, '\\') + 1)));
    }

}