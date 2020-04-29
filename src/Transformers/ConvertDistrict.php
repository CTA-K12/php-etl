<?php

namespace Marquine\Etl\Transformers;

use Marquine\Etl\Row;
use InvalidArgumentException;

class ConvertDistrict extends Transformer
{
    /**
     * Transformer columns.
     *
     * @var array
     */
    protected $columns = [];


    /**
     * Transformer districts.
     *
     * @var array
     */
    protected $districts = [];


     /**
     * Properties that can be set via the options method.
     *
     * @var array
     */
    protected $availableOptions = [
        'columns', 'districts'
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
            $districtName = $row->get($value);
            $row->remove($value);
            $row->set('district', trim($this->districts[$districtName]));
        }
    }

}
