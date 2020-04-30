<?php

namespace Marquine\Etl\Transformers;

use Marquine\Etl\Row;
use InvalidArgumentException;

class ConvertWithArray extends Transformer
{
    /**
     * Transformer column.
     *
     * @var string
     */
    protected $column;


    /**
     * Transformer dataArray.
     *
     * @var array
     */
    protected $dataArray = [];


    /**
     * Transformer dataArray.
     *
     * @var bool
     */
    protected $nullable = false;


    /**
     * Properties that can be set via the options method.
     *
     * @var array
     */
    protected $availableOptions = [
        'column', 'dataArray', 'nullable'
    ];


    /**
     * Transform the given row.
     *
     * @param  \Marquine\Etl\Row  $row
     * @return void
     */
    public function transform(Row $row)
    {
        if (!$this->nullable && !isset($this->dataArray[$row->get($this->column)])) {
            throw new \Exception(
                "Missing conversion value for " . $this->column . " : '" . $row->get($this->column) .
                "' in dataArray for ConvertWithArray Transformer\n\n"
            );
        }
        elseif (!isset($this->dataArray[$row->get($this->column)])) {
            $row->set($this->column, null);
        }
        else {
            $row->set($this->column, $this->dataArray[$row->get($this->column)]);
        }
    }

}
