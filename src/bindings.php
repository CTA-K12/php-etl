<?php

use Marquine\Etl\Container;

$container = Container::getInstance();

// Database
$container->singleton(Marquine\Etl\Database\Manager::class);
$container->alias(Marquine\Etl\Database\Manager::class, 'db');

// Extractors
$container->bind('collection_extractor', Marquine\Etl\Extractors\Collection::class);
$container->bind('csv_extractor', Marquine\Etl\Extractors\Csv::class);
$container->bind('fixed_width_extractor', Marquine\Etl\Extractors\FixedWidth::class);
$container->bind('json_extractor', Marquine\Etl\Extractors\Json::class);
$container->bind('query_extractor', Marquine\Etl\Extractors\Query::class);
$container->bind('table_extractor', Marquine\Etl\Extractors\Table::class);
$container->bind('xml_extractor', Marquine\Etl\Extractors\Xml::class);

// Transformers
$container->bind('convert_case_transformer', Marquine\Etl\Transformers\ConvertCase::class);
$container->bind('json_decode_transformer', Marquine\Etl\Transformers\JsonDecode::class);
$container->bind('json_encode_transformer', Marquine\Etl\Transformers\JsonEncode::class);
$container->bind('rename_columns_transformer', Marquine\Etl\Transformers\RenameColumns::class);
$container->bind('trim_transformer', Marquine\Etl\Transformers\Trim::class);
$container->bind('unique_rows_transformer', Marquine\Etl\Transformers\UniqueRows::class);
$container->bind('replace_transformer', Marquine\Etl\Transformers\Replace::class);

// Custom Transformers
$container->bind('add_column_transformer', Marquine\Etl\Transformers\AddColumn::class);
$container->bind('convert_boolean_transformer', Marquine\Etl\Transformers\ConvertBoolean::class);
$container->bind('convert_district_transformer', Marquine\Etl\Transformers\ConvertDistrict::class);
$container->bind('convert_encoding_transformer', Marquine\Etl\Transformers\ConvertEncoding::class);
$container->bind('convert_withArray_transformer', Marquine\Etl\Transformers\ConvertWithArray::class);
$container->bind('split_quarter_transformer', Marquine\Etl\Transformers\SplitQuarter::class);

// Loaders
$container->bind('insert_loader', Marquine\Etl\Loaders\Insert::class);
$container->bind('insert_update_loader', Marquine\Etl\Loaders\InsertUpdate::class);
