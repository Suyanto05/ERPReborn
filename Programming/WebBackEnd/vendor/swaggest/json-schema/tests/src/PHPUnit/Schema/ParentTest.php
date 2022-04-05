<?php

namespace Swaggest\JsonSchema\Tests\PHPUnit\Schema;


use Swaggest\JsonSchema\Exception\TypeException;
use Swaggest\JsonSchema\InvalidValue;
use Swaggest\JsonSchema\Schema;
use Swaggest\JsonSchema\SchemaContract;

class ParentTest extends \PHPUnit_Framework_TestCase
{
    protected function deepSchema()
    {
        $schemaValue = (object)array(
            'type' => 'object',
            'properties' => (object)array(
                'level1' => (object)array(
                    'type' => 'object',
                    'properties' => (object)array(
                        'level2' => (object)array(
                            'type' => 'object',
                            'properties' => (object)array(
                                'level3' => (object)array(
                                    'type' => 'integer',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        );

        $schema = Schema::import($schemaValue);

        return $schema;
    }

    private function assertSchema(SchemaContract $schema)
    {
        $level3Schema = $schema->getProperties()->__get('level1')
            ->getProperties()->__get('level2')
            ->getProperties()->__get('level3');

        $this->assertSame($level3Schema->type, 'integer');
    }

    public function testParent()
    {
        $this->assertSchema($this->deepSchema());
    }


    public function testInvalidImport()
    {
        $schema = $this->deepSchema();
        $this->setExpectedException(get_class(new TypeException()),
            'Integer expected, "abc" received at #->properties:level1->properties:level2->properties:level3');
        try {
            $object = $schema->in((object)array(
                'level1'=> (object)array(
                    'level2' =>(object)array(
                        'level3' => 'abc' // integer required
                    ),
                ),
            ));
        }
        catch (InvalidValue $exception) {
            $this->assertSame('Integer expected, "abc" received at #->properties:level1->properties:level2->properties:level3',
                $exception->getMessage());
            throw $exception;
        }
        //$this->assertSame('abc', $object->level1->level2->level3);
    }

    public function testImport()
    {
        $object = $this->deepSchema()->in((object)array(
            'level1'=> (object)array(
                'level2' => (object)array(
                    'level3' => 123 // integer required
                ),
            ),
        ));
        $this->assertSame(123, $object->level1->level2->level3);
    }
}