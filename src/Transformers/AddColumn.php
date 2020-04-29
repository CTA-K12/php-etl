<?php

namespace Marquine\Etl\Transformers;

use Marquine\Etl\Row;
use InvalidArgumentException;

class AddColumn extends Transformer
{
    /**
     * Transformer columns.
     *
     * @var array
     */
    protected $columnsToAdd = [];


     /**
     * Properties that can be set via the options method.
     *
     * @var array
     */
    protected $availableOptions = [
        'columnsToAdd'
    ];


    /**
     * Transform the given row.
     *
     * @param  \Marquine\Etl\Row  $row
     * @return void
     */
    public function transform(Row $row)
    {
      foreach($this->columnsToAdd as $columnName => $columnData) {
        $row[$columnName] = $columnData;
      }
    }

}
