<?php

namespace Marquine\Etl\Transformers;

use Marquine\Etl\Row;
use InvalidArgumentException;

class ConvertEncoding extends Transformer
{
    /**
     * Transformer columns.
     *
     * @var array
     */
    protected $columns = [];

    /**
     * The inputEncoding of the conversion.
     *
     * @var string
     */
    protected $inputEncoding = '';

    /**
     * The outputEncoding of the conversion.
     *
     * @var string
     */
    protected $outputEncoding = '';

     /**
     * Properties that can be set via the options method.
     *
     * @var array
     */
    protected $availableOptions = [
        'columns', 'inputEncoding', 'outputEncoding'
    ];


    /**
     * Transform the given row.
     *
     * @param  \Marquine\Etl\Row  $row
     * @return void
     */
    public function transform(Row $row)
    {

        if ('' == $this->inputEncoding) {
              throw new InvalidArgumentException("You must specify an input encooding type. [{$this->inputEncoding}] is invalid.");
        }

        if ('' == $this->outputEncoding) {
              throw new InvalidArgumentException("You must specify an output encooding type. [{$this->outputEncoding}] is invalid.");
        }

        $row->transform($this->columns, function ($column) {
            return iconv($this->inputEncoding, $this->outputEncoding, $column);
        });
    }

}
