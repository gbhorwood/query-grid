<?php

namespace Tests\Columns;

use Tests\TestCase;
use Willishq\QueryGrid\Columns\Column;
use Willishq\QueryGrid\Filter;

class ColumnTest extends TestCase
{
    /** @test */
    public function itIsCreatable()
    {
        $column = new Column('key', 'label');

        $this->assertEquals('key', $column->getKey());
        $this->assertEquals('key', $column->getField());
        $this->assertEquals('label', $column->getLabel());
    }

    /** @test */
    public function itChangesTheFromField()
    {
        $column = new Column('key', 'label');
        $response = $column->fromField('field');

        $this->assertEquals('key', $column->getKey());
        $this->assertEquals('field', $column->getField());
        $this->assertEquals('label', $column->getLabel());
        $this->assertSame($response, $column);
    }

    /** @test */
    public function itFormatsValues()
    {
        $column = new Column('key', 'label');
        $response = $column->withFormat(function ($value) {
            return 'all_' . $value;
        });
        $this->assertTrue($column->hasFormat());
        $this->assertEquals('all_of', $column->format('of'));
        $this->assertSame($response, $column);
    }
    /** @test */
    public function itAddsAFilter()
    {
        $column = new Column('k', 'l');
        $filter = $column->addFilter(Filter::CONTAINS, 'Contains String');
        $filters = $column->getFilters();

        $this->assertArrayHasKey(Filter::CONTAINS, $filters);
        $this->assertEquals($filter, $filters[Filter::CONTAINS]);
    }
}
