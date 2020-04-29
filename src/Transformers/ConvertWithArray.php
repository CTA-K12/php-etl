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
     * Properties that can be set via the options method.
     *
     * @var array
     */
    protected $availableOptions = [
        'column', 'dataArray'
    ];


    /**
     * Transform the given row.
     *
     * @param  \Marquine\Etl\Row  $row
     * @return void
     */
    public function transform(Row $row)
    {
        if (!isset($this->dataArray[$row->get($this->column)])) {
            throw new \Exception('Missing conversion value: ' . $row->get($this->column) . ' in dataArray for ConvertWithArray Transformer');
            exit;
        }        

        $row->set($this->column, $this->dataArray[$row->get($this->column)]);
    }

}
