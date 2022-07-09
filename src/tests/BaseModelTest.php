<?php

/**
 * cafe store api
 * PHP version 7.4
 *
 * @package OpenAPIServer
 * @author  OpenAPI Generator team
 * @link    https://github.com/openapitools/openapi-generator
 */

/**
 * this is a sample.
 * The version of the OpenAPI document: 1.0
 * Generated by: https://github.com/openapitools/openapi-generator.git
 */

/**
 * NOTE: This class is auto generated by the openapi generator program.
 * https://github.com/openapitools/openapi-generator
 * Do not edit the class manually.
 */

namespace OpenAPIServer;

use PHPUnit\Framework\TestCase;
use OpenAPIServer\BaseModel;
use OpenAPIServer\Mock\OpenApiModelInterface;
use InvalidArgumentException;
use StdClass;

/**
 * BaseModelTest
 *
 * phpcs:disable Squiz.Commenting,Generic.Commenting,PEAR.Commenting
 * @coversDefaultClass \OpenAPIServer\BaseModel
 */
class BaseModelTest extends TestCase
{

    /**
     * @covers ::__construct
     * @covers ::validateModelType
     * @dataProvider provideClassesAndDefaultData
     */
    public function testConstructorAndDefaultData($className, $expectedJson)
    {
        $item = new $className();
        $this->assertEquals($expectedJson, json_encode($item->getData()));
    }

    public function provideClassesAndDefaultData()
    {
        return [
            'boolean model' => [BasicBooleanTestClass::class, json_encode(null)],
            'integer model' => [BasicIntegerTestClass::class, json_encode(null)],
            'number model' => [BasicNumberTestClass::class, json_encode(null)],
            'string model' => [BasicStringTestClass::class, json_encode(null)],
            'array model' => [BasicArrayTestClass::class, json_encode([])],
            'object model' => [BasicObjectTestClass::class, json_encode(new StdClass())],
            'missing type model' => [MissingTypeTestClass::class, json_encode(null)],
        ];
    }

    /**
     * @covers ::__construct
     * @covers ::validateModelType
     * @dataProvider provideInvalidClasses
     */
    public function testConstructorWithInvalidTypes($className)
    {
        $this->expectException(InvalidArgumentException::class);
        $item = new $className();
    }

    public function provideInvalidClasses()
    {
        return [
            'unknown type model' => [UnknownTypeTestClass::class],
        ];
    }

    /**
     * @covers ::getOpenApiSchema
     */
    public function testGetOpenApiSchema()
    {
        foreach (
            [
                BaseModel::getOpenApiSchema(),
                CatRefTestClass::getOpenApiSchema(),
                DogRefTestClass::getOpenApiSchema(),
                BasicArrayTestClass::getOpenApiSchema(),
                BasicBooleanTestClass::getOpenApiSchema(),
                BasicIntegerTestClass::getOpenApiSchema(),
                BasicNumberTestClass::getOpenApiSchema(),
                BasicObjectTestClass::getOpenApiSchema(),
                BasicStringTestClass::getOpenApiSchema(),
            ] as $schema
        ) {
            $this->assertTrue(is_array($schema) || is_object($schema));
        }
    }

    /**
     * @covers ::createFromData
     * @covers ::__set
     * @covers ::__get
     * @dataProvider provideCreateFromDataArguments
     */
    public function testCreateFromData($modelClass, $data)
    {
        $item = $modelClass::createFromData($data);
        $this->assertInstanceOf($modelClass, $item);
        $this->assertInstanceOf(OpenApiModelInterface::class, $item);
        foreach ($data as $propName => $propValue) {
            $this->assertSame($propValue, $item->{$propName});
        }
    }

    public function provideCreateFromDataArguments()
    {
        return [
            'CatRefTestClass' => [
                CatRefTestClass::class,
                [
                    'className' => 'cheshire',
                    'color' => 'gray',
                    'declawed' => true,
                ],
            ],
            'DogRefTestClass' => [
                DogRefTestClass::class,
                [
                    'className' => 'bulldog',
                    'color' => 'black',
                    'declawed' => false,
                ],
            ],
        ];
    }

    /**
     * @covers ::setData
     * @covers ::getData
     * @dataProvider provideScalarModels
     */
    public function testSetDataScalar($className, array $setDataValues, array $expectedDataValues)
    {
        $item = new $className();
        for ($i = 0; $i < count($setDataValues); $i++) {
            if ($i > 0) {
                // value should be previous
                $this->assertSame($expectedDataValues[$i - 1], $item->getData());
            } else {
                // initial value should be null
                $this->assertNull($item->getData());
            }
            $item->setData($setDataValues[$i]);
            // values should be overwritten
            $this->assertSame($expectedDataValues[$i], $item->getData());
        }
    }

    public function provideScalarModels()
    {
        return [
            'boolean model' => [
                BasicBooleanTestClass::class,
                [false, true, false],
                [false, true, false],
            ],
            'integer model' => [
                BasicIntegerTestClass::class,
                [-50, 322, 100500, -1000, 0],
                [-50, 322, 100500, -1000, 0],
            ],
            'number model' => [
                BasicNumberTestClass::class,
                [-50.324, 322.756, 100500.09, -1000.43, 0],
                [-50.324, 322.756, 100500.09, -1000.43, 0],
            ],
            'string model' => [
                BasicStringTestClass::class,
                ['foobar', 'hello world', '100', '-56', 'true', 'null', 'false'],
                ['foobar', 'hello world', '100', '-56', 'true', 'null', 'false'],
            ],
        ];
    }

    /**
     * @covers ::setData
     * @covers ::getData
     */
    public function testSetDataOfArray()
    {
        $basic = new BasicArrayTestClass();
        $data = ['foo', 'bar', 'baz'];
        $basic->setData($data);
        $this->assertEquals($data, $basic->getData());
    }

    /**
     * @covers ::setData
     * @dataProvider provideInvalidDataForArrayModel
     */
    public function testSetDataOfArrayWithInvalidData($className, $data)
    {
        $this->expectException(InvalidArgumentException::class);
        $item = new $className();
        $item->setData($data);
    }

    public function provideInvalidDataForArrayModel()
    {
        $obj = new StdClass();
        $obj->foo = 'bar';
        $obj->baz = 'baf';
        $arr = [];
        $arr[5] = 'foo';
        $arr[6] = 'bar';
        return [
            'array with spaced indexes data' => [
                BasicArrayTestClass::class,
                $arr,
            ],
            'assoc array data' => [
                BasicArrayTestClass::class,
                ['foo' => 'bar', 'baz' => 'baf'],
            ],
            'object data' => [
                BasicArrayTestClass::class,
                $obj,
            ],
        ];
    }

    /**
     * @covers ::setData
     * @covers ::getData
     */
    public function testSetDataOfObject()
    {
        $basic = new BasicObjectTestClass();
        $data = ['foo' => 'bar'];
        $basic->setData($data);
        $this->assertSame('bar', $basic->foo);
    }

    /**
     * @covers ::getData
     */
    public function testGetDataOfObject()
    {
        $catItem = new CatRefTestClass();
        $catItem->setData([
            'color' => 'grey',
            'declawed' => false,
        ]);
        $data = $catItem->getData();
        $this->assertInstanceOf(StdClass::class, $data);
        $this->assertSame('grey', $data->color);
        $this->assertSame(false, $data->declawed);
    }

    /**
     * @covers ::__set
     * @covers ::__get
     */
    public function testSetter()
    {
        $item = new CatRefTestClass();
        $item->className = 'cheshire';
        $item->color = 'black';
        $item->declawed = false;
        $this->assertSame('cheshire', $item->className);
        $this->assertSame('black', $item->color);
        $this->assertSame(false, $item->declawed);
    }

    /**
     * @covers ::__set
     * @dataProvider provideScalarsAndArray
     */
    public function testSetterOfScalarAndArray($className)
    {
        $this->expectException(InvalidArgumentException::class);
        $item = new $className();
        $item->foo = 'bar';
    }

    public function provideScalarsAndArray()
    {
        return [
            'boolean model' => [BasicBooleanTestClass::class],
            'integer model' => [BasicIntegerTestClass::class],
            'number model' => [BasicNumberTestClass::class],
            'string model' => [BasicStringTestClass::class],
            'array model' => [BasicArrayTestClass::class],
        ];
    }

    /**
     * @covers ::__set
     */
    public function testSetterWithUnknownProp()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            sprintf(
                'Cannot set unknownProp property of %s model because it doesn\'t exist in related OAS schema',
                CatRefTestClass::class
            )
        );
        $item = new CatRefTestClass();
        $item->unknownProp = 'foobar';
    }

    /**
     * @covers ::__get
     */
    public function testGetterWithUnknownProp()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            sprintf(
                'Cannot get unknownProp property of %s model because it doesn\'t exist in related OAS schema',
                CatRefTestClass::class
            )
        );
        $item = new CatRefTestClass();
        $unknownProp = $item->unknownProp;
    }

    /**
     * @covers ::__get
     * @dataProvider provideScalarsAndArray
     */
    public function testGetterOfScalarAndArray($className)
    {
        $this->expectException(InvalidArgumentException::class);
        $item = new $className();
        $bar = $item->foo;
    }

    /**
     * @covers ::__set
     * @covers ::__get
     */
    public function testSetterAndGetterOfBasicObject()
    {
        $item = new BasicObjectTestClass();
        $item->unknown = 'foo';
        $this->assertEquals('foo', $item->unknown);
    }

    /**
     * @covers ::jsonSerialize
     * @dataProvider provideJsonSerializeArguments
     */
    public function testJsonSerialize($className, $data, $expectedJson)
    {
        $item = $className::createFromData($data);
        $this->assertEquals($expectedJson, json_encode($item));
    }

    public function provideJsonSerializeArguments()
    {
        return [
            'model with all props' => [
                CatRefTestClass::class,
                [
                    'className' => 'cheshire',
                    'color' => 'black',
                    'declawed' => false,
                ],
                json_encode([
                    'className' => 'cheshire',
                    'color' => 'black',
                    'declawed' => false,
                ]),
            ],
            'model with required props' => [
                CatRefTestClass::class,
                [
                    'className' => 'cheshire',
                ],
                json_encode([
                    'className' => 'cheshire',
                ]),
            ],
            'model with missed required prop' => [
                CatRefTestClass::class,
                [
                    'color' => 'black',
                ],
                json_encode([
                    'className' => null,
                    'color' => 'black',
                ]),
            ],
            'model with schema serialized as assoc array' => [
                DogRefTestClass::class,
                [
                    'className' => 'bulldog',
                    'color' => 'gray',
                    'declawed' => false,
                ],
                json_encode([
                    'className' => 'bulldog',
                    'color' => 'gray',
                    'declawed' => false,
                ]),
            ],
            'model of basic array' => [
                BasicArrayTestClass::class,
                ['hello', 'world'],
                json_encode(['hello', 'world']),
            ],
            'model of basic boolean' => [
                BasicBooleanTestClass::class,
                false,
                json_encode(false),
            ],
            'model of basic integer' => [
                BasicIntegerTestClass::class,
                -500,
                json_encode(-500),
            ],
            'model of basic number' => [
                BasicNumberTestClass::class,
                -3.1434,
                json_encode(-3.1434),
            ],
            'model of basic object' => [
                BasicObjectTestClass::class,
                new \StdClass(),
                json_encode(new \StdClass()),
            ],
            'model of basic string' => [
                BasicStringTestClass::class,
                'foobar',
                json_encode('foobar'),
            ],
        ];
    }

    /**
     * @covers ::getModelsNamespace
     * @dataProvider provideTestClasses
     */
    public function testGetModelsNamespace($classname)
    {
        $this->assertTrue(method_exists($classname, 'getModelsNamespace'));
        $getModelsNamespace = $classname . '::getModelsNamespace';
        $namespace = $getModelsNamespace();
        $this->assertIsString($namespace);
    }

    public function provideTestClasses()
    {
        return [
            [BasicArrayTestClass::class],
            [BasicBooleanTestClass::class],
            [BasicIntegerTestClass::class],
            [BasicNumberTestClass::class],
            [BasicObjectTestClass::class],
            [BasicStringTestClass::class],
            [CatRefTestClass::class],
            [DogRefTestClass::class],
        ];
    }
}

// phpcs:disable PSR1.Classes.ClassDeclaration.MultipleClasses
class BasicArrayTestClass extends BaseModel
{
    protected const MODEL_SCHEMA = <<<'SCHEMA'
{
    "type" : "array"
}
SCHEMA;
}

class BasicBooleanTestClass extends BaseModel
{
    protected const MODEL_SCHEMA = <<<'SCHEMA'
{
    "type" : "boolean"
}
SCHEMA;
}

class BasicIntegerTestClass extends BaseModel
{
    protected const MODEL_SCHEMA = <<<'SCHEMA'
{
    "type" : "integer"
}
SCHEMA;
}

class BasicNumberTestClass extends BaseModel
{
    protected const MODEL_SCHEMA = <<<'SCHEMA'
{
    "type" : "number"
}
SCHEMA;
}

class BasicObjectTestClass extends BaseModel
{
    protected const MODEL_SCHEMA = <<<'SCHEMA'
{
    "type" : "object"
}
SCHEMA;
}

class BasicStringTestClass extends BaseModel
{
    protected const MODEL_SCHEMA = <<<'SCHEMA'
{
    "type" : "string"
}
SCHEMA;
}

class CatRefTestClass extends BaseModel
{
    protected const MODEL_SCHEMA = <<<'SCHEMA'
{
    "required" : [ "className" ],
    "type" : "object",
    "properties" : {
        "className" : {
            "type" : "string"
        },
        "color" : {
            "type" : "string",
            "default" : "red"
        },
        "declawed" : {
            "type" : "boolean"
        }
    },
    "discriminator" : {
        "propertyName" : "className"
    }
}
SCHEMA;
}

class ClassWithoutGetSchemaMethod
{

}

class DogRefTestClass extends BaseModel
{
    protected const MODEL_SCHEMA = <<<'SCHEMA'
{
    "required" : [ "className" ],
    "type" : "object",
    "properties" : {
        "className" : {
            "type" : "string"
        },
        "color" : {
            "type" : "string",
            "default" : "black"
        },
        "declawed" : {
            "type" : "boolean"
        }
    },
    "discriminator" : {
        "propertyName" : "className"
    }
}
SCHEMA;
}

class MissingTypeTestClass extends BaseModel
{
    protected const MODEL_SCHEMA = <<<'SCHEMA'
{}
SCHEMA;
}

class UnknownTypeTestClass extends BaseModel
{
    protected const MODEL_SCHEMA = <<<'SCHEMA'
{
    "type" : "foobar"
}
SCHEMA;
}