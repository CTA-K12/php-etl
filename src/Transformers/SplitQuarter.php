<?php

namespace Marquine\Etl\Transformers;

use Marquine\Etl\Row;
use InvalidArgumentException;

class SplitQuarter extends Transformer
{
    /**
     * Transformer columns.
     *
     * @var array
     */
    protected $columns = [];


     /**
     * Properties that can be set via the options method.
     *
     * @var array
     */
    protected $availableOptions = [
        'columns',
    ];


    /**
     * Transform the given row.
     *
     * @param  \Marquine\Etl\Row  $row
     * @return void
     */
    public function transform(Row $row)
    {
        foreach($this->columns as $key => $value) {
            $columnData = preg_split("/\s/", $row->get($value));
            $row->set('season', trim($columnData[0]));
            $row->set('year', trim($columnData[1]));
            $row->remove($value);
        }
    }

}
