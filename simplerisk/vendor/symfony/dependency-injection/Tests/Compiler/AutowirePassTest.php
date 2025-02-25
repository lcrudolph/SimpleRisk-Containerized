<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\DependencyInjection\Tests\Compiler;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Compiler\AutowirePass;
use Symfony\Component\DependencyInjection\Compiler\AutowireRequiredMethodsPass;
use Symfony\Component\DependencyInjection\Compiler\ResolveClassPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Exception\AutowiringFailedException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\Tests\Fixtures\CaseSensitiveClass;
use Symfony\Component\DependencyInjection\Tests\Fixtures\includes\FooVariadic;
use Symfony\Component\DependencyInjection\Tests\Fixtures\includes\MultipleArgumentsOptionalScalarNotReallyOptional;
use Symfony\Component\DependencyInjection\TypedReference;

require_once __DIR__.'/../Fixtures/includes/autowiring_classes.php';

/**
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
class AutowirePassTest extends TestCase
{
    public function testProcess()
    {
        $container = new ContainerBuilder();

        $container->register(Foo::class);
        $barDefinition = $container->register('bar', Bar::class);
        $barDefinition->setAutowired(true);

        (new ResolveClassPass())->process($container);
        (new AutowirePass())->process($container);

        $this->assertCount(1, $container->getDefinition('bar')->getArguments());
        $this->assertEquals(Foo::class, (string) $container->getDefinition('bar')->getArgument(0));
    }

    /**
     * @requires PHP 5.6
     */
    public function testProcessVariadic()
    {
        $container = new ContainerBuilder();
        $container->register(Foo::class);
        $definition = $container->register('fooVariadic', FooVariadic::class);
        $definition->setAutowired(true);

        (new ResolveClassPass())->process($container);
        (new AutowirePass())->process($container);

        $this->assertCount(1, $container->getDefinition('fooVariadic')->getArguments());
        $this->assertEquals(Foo::class, (string) $container->getDefinition('fooVariadic')->getArgument(0));
    }

    /**
     * @group legacy
     * @expectedDeprecation Autowiring services based on the types they implement is deprecated since Symfony 3.3 and won't be supported in version 4.0. You should alias the "Symfony\Component\DependencyInjection\Tests\Compiler\B" service to "Symfony\Component\DependencyInjection\Tests\Compiler\A" instead.
     * @expectedExceptionInSymfony4 \Symfony\Component\DependencyInjection\Exception\RuntimeException
     * @expectedExceptionMessageInSymfony4 Cannot autowire service "c": argument "$a" of method "Symfony\Component\DependencyInjection\Tests\Compiler\C::__construct()" references class "Symfony\Component\DependencyInjection\Tests\Compiler\A" but no such service exists. You should maybe alias this class to the existing "Symfony\Component\DependencyInjection\Tests\Compiler\B" service.
     */
    public function testProcessAutowireParent()
    {
        $container = new ContainerBuilder();

        $container->register(B::class);
        $cDefinition = $container->register('c', C::class);
        $cDefinition->setAutowired(true);

        (new ResolveClassPass())->process($container);
        (new AutowirePass())->process($container);

        $this->assertCount(1, $container->getDefinition('c')->getArguments());
        $this->assertEquals(B::class, (string) $container->getDefinition('c')->getArgument(0));
    }

    /**
     * @group legacy
     * @expectedDeprecation Autowiring services based on the types they implement is deprecated since Symfony 3.3 and won't be supported in version 4.0. Try changing the type-hint for argument "$a" of method "Symfony\Component\DependencyInjection\Tests\Compiler\C::__construct()" to "Symfony\Component\DependencyInjection\Tests\Compiler\AInterface" instead.
     * @expectedExceptionInSymfony4 \Symfony\Component\DependencyInjection\Exception\RuntimeException
     * @expectedExceptionMessageInSymfony4 Cannot autowire service "c": argument "$a" of method "Symfony\Component\DependencyInjection\Tests\Compiler\C::__construct()" references class "Symfony\Component\DependencyInjection\Tests\Compiler\A" but no such service exists. You should maybe alias this class to the existing "Symfony\Component\DependencyInjection\Tests\Compiler\B" service.
     */
    public function testProcessLegacyAutowireWithAvailableInterface()
    {
        $container = new ContainerBuilder();

        $container->setAlias(AInterface::class, B::class);
        $container->register(B::class);
        $cDefinition = $container->register('c', C::class);
        $cDefinition->setAutowired(true);

        (new ResolveClassPass())->process($container);
        (new AutowirePass())->process($container);

        $this->assertCount(1, $container->getDefinition('c')->getArguments());
        $this->assertEquals(B::class, (string) $container->getDefinition('c')->getArgument(0));
    }

    /**
     * @group legacy
     * @expectedDeprecation Autowiring services based on the types they implement is deprecated since Symfony 3.3 and won't be supported in version 4.0. You should alias the "Symfony\Component\DependencyInjection\Tests\Compiler\F" service to "Symfony\Component\DependencyInjection\Tests\Compiler\DInterface" instead.
     * @expectedExceptionInSymfony4 \Symfony\Component\DependencyInjection\Exception\RuntimeException
     * @expectedExceptionMessageInSymfony4 Cannot autowire service "g": argument "$d" of method "Symfony\Component\DependencyInjection\Tests\Compiler\G::__construct()" references interface "Symfony\Component\DependencyInjection\Tests\Compiler\DInterface" but no such service exists. You should maybe alias this interface to the existing "Symfony\Component\DependencyInjection\Tests\Compiler\F" service.
     */
    public function testProcessAutowireInterface()
    {
        $container = new ContainerBuilder();

        $container->register(F::class);
        $gDefinition = $container->register('g', G::class);
        $gDefinition->setAutowired(true);

        (new ResolveClassPass())->process($container);
        (new AutowirePass())->process($container);

        $this->assertCount(3, $container->getDefinition('g')->getArguments());
        $this->assertEquals(F::class, (string) $container->getDefinition('g')->getArgument(0));
        $this->assertEquals(F::class, (string) $container->getDefinition('g')->getArgument(1));
        $this->assertEquals(F::class, (string) $container->getDefinition('g')->getArgument(2));
    }

    public function testCompleteExistingDefinition()
    {
        $container = new ContainerBuilder();

        $container->register('b', B::class);
        $container->register(DInterface::class, F::class);
        $hDefinition = $container->register('h', H::class)->addArgument(new Reference('b'));
        $hDefinition->setAutowired(true);

        (new ResolveClassPass())->process($container);
        (new AutowirePass())->process($container);

        $this->assertCount(2, $container->getDefinition('h')->getArguments());
        $this->assertEquals('b', (string) $container->getDefinition('h')->getArgument(0));
        $this->assertEquals(DInterface::class, (string) $container->getDefinition('h')->getArgument(1));
    }

    public function testCompleteExistingDefinitionWithNotDefinedArguments()
    {
        $container = new ContainerBuilder();

        $container->register(B::class);
        $container->register(DInterface::class, F::class);
        $hDefinition = $container->register('h', H::class)->addArgument('')->addArgument('');
        $hDefinition->setAutowired(true);

        (new ResolveClassPass())->process($container);
        (new AutowirePass())->process($container);

        $this->assertCount(2, $container->getDefinition('h')->getArguments());
        $this->assertEquals(B::class, (string) $container->getDefinition('h')->getArgument(0));
        $this->assertEquals(DInterface::class, (string) $container->getDefinition('h')->getArgument(1));
    }

    /**
     * @group legacy
     */
    public function testExceptionsAreStored()
    {
        $container = new ContainerBuilder();

        $container->register('c1', CollisionA::class);
        $container->register('c2', CollisionB::class);
        $container->register('c3', CollisionB::class);
        $aDefinition = $container->register('a', CannotBeAutowired::class);
        $aDefinition->setAutowired(true);

        $pass = new AutowirePass(false);
        $pass->process($container);
        $this->assertCount(1, $pass->getAutowiringExceptions());
    }

    public function testPrivateConstructorThrowsAutowireException()
    {
        $this->expectException('Symfony\Component\DependencyInjection\Exception\AutowiringFailedException');
        $this->expectExceptionMessage('Invalid service "private_service": constructor of class "Symfony\Component\DependencyInjection\Tests\Compiler\PrivateConstructor" must be public.');
        $container = new ContainerBuilder();

        $container->autowire('private_service', PrivateConstructor::class);

        $pass = new AutowirePass(true);
        $pass->process($container);
    }

    public function testTypeCollision()
    {
        $this->expectException('Symfony\Component\DependencyInjection\Exception\AutowiringFailedException');
        $this->expectExceptionMessage('Cannot autowire service "a": argument "$collision" of method "Symfony\Component\DependencyInjection\Tests\Compiler\CannotBeAutowired::__construct()" references interface "Symfony\Component\DependencyInjection\Tests\Compiler\CollisionInterface" but no such service exists. You should maybe alias this interface to one of these existing services: "c1", "c2", "c3".');
        $container = new ContainerBuilder();

        $container->register('c1', CollisionA::class);
        $container->register('c2', CollisionB::class);
        $container->register('c3', CollisionB::class);
        $aDefinition = $container->register('a', CannotBeAutowired::class);
        $aDefinition->setAutowired(true);

        $pass = new AutowirePass();
        $pass->process($container);
    }

    public function testTypeNotGuessable()
    {
        $this->expectException('Symfony\Component\DependencyInjection\Exception\AutowiringFailedException');
        $this->expectExceptionMessage('Cannot autowire service "a": argument "$k" of method "Symfony\Component\DependencyInjection\Tests\Compiler\NotGuessableArgument::__construct()" references class "Symfony\Component\DependencyInjection\Tests\Compiler\Foo" but no such service exists. You should maybe alias this class to one of these existing services: "a1", "a2".');
        $container = new ContainerBuilder();

        $container->register('a1', Foo::class);
        $container->register('a2', Foo::class);
        $aDefinition = $container->register('a', NotGuessableArgument::class);
        $aDefinition->setAutowired(true);

        $pass = new AutowirePass();
        $pass->process($container);
    }

    public function testTypeNotGuessableWithSubclass()
    {
        $this->expectException('Symfony\Component\DependencyInjection\Exception\AutowiringFailedException');
        $this->expectExceptionMessage('Cannot autowire service "a": argument "$k" of method "Symfony\Component\DependencyInjection\Tests\Compiler\NotGuessableArgumentForSubclass::__construct()" references class "Symfony\Component\DependencyInjection\Tests\Compiler\A" but no such service exists. You should maybe alias this class to one of these existing services: "a1", "a2".');
        $container = new ContainerBuilder();

        $container->register('a1', B::class);
        $container->register('a2', B::class);
        $aDefinition = $container->register('a', NotGuessableArgumentForSubclass::class);
        $aDefinition->setAutowired(true);

        $pass = new AutowirePass();
        $pass->process($container);
    }

    public function testTypeNotGuessableNoServicesFound()
    {
        $this->expectException('Symfony\Component\DependencyInjection\Exception\AutowiringFailedException');
        $this->expectExceptionMessage('Cannot autowire service "a": argument "$collision" of method "Symfony\Component\DependencyInjection\Tests\Compiler\CannotBeAutowired::__construct()" references interface "Symfony\Component\DependencyInjection\Tests\Compiler\CollisionInterface" but no such service exists.');
        $container = new ContainerBuilder();

        $aDefinition = $container->register('a', CannotBeAutowired::class);
        $aDefinition->setAutowired(true);

        $pass = new AutowirePass();
        $pass->process($container);
    }

    /**
     * @requires PHP 8
     */
    public function testTypeNotGuessableUnionType()
    {
        $this->expectException('Symfony\Component\DependencyInjection\Exception\AutowiringFailedException');
        $this->expectExceptionMessage('Cannot autowire service "a": argument "$collision" of method "Symfony\Component\DependencyInjection\Tests\Compiler\UnionClasses::__construct()" has type "Symfony\Component\DependencyInjection\Tests\Compiler\CollisionA|Symfony\Component\DependencyInjection\Tests\Compiler\CollisionB" but this class was not found.');
        $container = new ContainerBuilder();

        $container->register(CollisionA::class);
        $container->register(CollisionB::class);

        $aDefinition = $container->register('a', UnionClasses::class);
        $aDefinition->setAutowired(true);

        $pass = new AutowirePass();
        $pass->process($container);
    }

    public function testTypeNotGuessableWithTypeSet()
    {
        $container = new ContainerBuilder();

        $container->register('a1', Foo::class);
        $container->register('a2', Foo::class);
        $container->register(Foo::class, Foo::class);
        $aDefinition = $container->register('a', NotGuessableArgument::class);
        $aDefinition->setAutowired(true);

        $pass = new AutowirePass();
        $pass->process($container);

        $this->assertCount(1, $container->getDefinition('a')->getArguments());
        $this->assertEquals(Foo::class, (string) $container->getDefinition('a')->getArgument(0));
    }

    public function testWithTypeSet()
    {
        $container = new ContainerBuilder();

        $container->register('c1', CollisionA::class);
        $container->register('c2', CollisionB::class);
        $container->setAlias(CollisionInterface::class, 'c2');
        $aDefinition = $container->register('a', CannotBeAutowired::class);
        $aDefinition->setAutowired(true);

        $pass = new AutowirePass();
        $pass->process($container);

        $this->assertCount(1, $container->getDefinition('a')->getArguments());
        $this->assertEquals(CollisionInterface::class, (string) $container->getDefinition('a')->getArgument(0));
    }

    /**
     * @group legacy
     * @expectedDeprecation Relying on service auto-registration for type "Symfony\Component\DependencyInjection\Tests\Compiler\Lille" is deprecated since Symfony 3.4 and won't be supported in 4.0. Create a service named "Symfony\Component\DependencyInjection\Tests\Compiler\Lille" instead.
     * @expectedDeprecation Relying on service auto-registration for type "Symfony\Component\DependencyInjection\Tests\Compiler\Dunglas" is deprecated since Symfony 3.4 and won't be supported in 4.0. Create a service named "Symfony\Component\DependencyInjection\Tests\Compiler\Dunglas" instead.
     */
    public function testCreateDefinition()
    {
        $container = new ContainerBuilder();

        $coopTilleulsDefinition = $container->register('coop_tilleuls', LesTilleuls::class);
        $coopTilleulsDefinition->setAutowired(true);

        $pass = new AutowirePass();
        $pass->process($container);

        $this->assertCount(2, $container->getDefinition('coop_tilleuls')->getArguments());
        $this->assertEquals('autowired.Symfony\Component\DependencyInjection\Tests\Compiler\Dunglas', $container->getDefinition('coop_tilleuls')->getArgument(0));
        $this->assertEquals('autowired.Symfony\Component\DependencyInjection\Tests\Compiler\Dunglas', $container->getDefinition('coop_tilleuls')->getArgument(1));

        $dunglasDefinition = $container->getDefinition('autowired.Symfony\Component\DependencyInjection\Tests\Compiler\Dunglas');
        $this->assertEquals(Dunglas::class, $dunglasDefinition->getClass());
        $this->assertFalse($dunglasDefinition->isPublic());
        $this->assertCount(1, $dunglasDefinition->getArguments());
        $this->assertEquals('autowired.Symfony\Component\DependencyInjection\Tests\Compiler\Lille', $dunglasDefinition->getArgument(0));

        $lilleDefinition = $container->getDefinition('autowired.Symfony\Component\DependencyInjection\Tests\Compiler\Lille');
        $this->assertEquals(Lille::class, $lilleDefinition->getClass());
    }

    public function testResolveParameter()
    {
        $container = new ContainerBuilder();

        $container->setParameter('class_name', Bar::class);
        $container->register(Foo::class);
        $barDefinition = $container->register('bar', '%class_name%');
        $barDefinition->setAutowired(true);

        (new ResolveClassPass())->process($container);
        (new AutowirePass())->process($container);

        $this->assertEquals(Foo::class, $container->getDefinition('bar')->getArgument(0));
    }

    public function testOptionalParameter()
    {
        $container = new ContainerBuilder();

        $container->register(A::class);
        $container->register(Foo::class);
        $optDefinition = $container->register('opt', OptionalParameter::class);
        $optDefinition->setAutowired(true);

        (new ResolveClassPass())->process($container);
        (new AutowirePass())->process($container);

        $definition = $container->getDefinition('opt');
        $this->assertNull($definition->getArgument(0));
        $this->assertEquals(A::class, $definition->getArgument(1));
        $this->assertEquals(Foo::class, $definition->getArgument(2));
    }

    /**
     * @requires PHP 8
     */
    public function testParameterWithNullUnionIsSkipped()
    {
        $container = new ContainerBuilder();

        $optDefinition = $container->register('opt', UnionNull::class);
        $optDefinition->setAutowired(true);

        (new AutowirePass())->process($container);

        $definition = $container->getDefinition('opt');
        $this->assertNull($definition->getArgument(0));
    }

    /**
     * @requires PHP 8
     */
    public function testParameterWithNullUnionIsAutowired()
    {
        $container = new ContainerBuilder();

        $container->register(CollisionInterface::class, CollisionA::class);

        $optDefinition = $container->register('opt', UnionNull::class);
        $optDefinition->setAutowired(true);

        (new AutowirePass())->process($container);

        $definition = $container->getDefinition('opt');
        $this->assertEquals(CollisionInterface::class, $definition->getArgument(0));
    }

    public function testDontTriggerAutowiring()
    {
        $container = new ContainerBuilder();

        $container->register(Foo::class);
        $container->register('bar', Bar::class);

        (new ResolveClassPass())->process($container);
        (new AutowirePass())->process($container);

        $this->assertCount(0, $container->getDefinition('bar')->getArguments());
    }

    public function testClassNotFoundThrowsException()
    {
        $this->expectException('Symfony\Component\DependencyInjection\Exception\AutowiringFailedException');
        $this->expectExceptionMessage('Cannot autowire service "a": argument "$r" of method "Symfony\Component\DependencyInjection\Tests\Compiler\BadTypeHintedArgument::__construct()" has type "Symfony\Component\DependencyInjection\Tests\Compiler\NotARealClass" but this class was not found.');
        $container = new ContainerBuilder();

        $aDefinition = $container->register('a', BadTypeHintedArgument::class);
        $aDefinition->setAutowired(true);

        $container->register(Dunglas::class, Dunglas::class);

        $pass = new AutowirePass();
        $pass->process($container);
    }

    public function testParentClassNotFoundThrowsException()
    {
        $this->expectException('Symfony\Component\DependencyInjection\Exception\AutowiringFailedException');
        $this->expectExceptionMessageMatches('{^Cannot autowire service "a": argument "\$r" of method "(Symfony\\\\Component\\\\DependencyInjection\\\\Tests\\\\Compiler\\\\)BadParentTypeHintedArgument::__construct\(\)" has type "\1OptionalServiceClass" but this class is missing a parent class \(Class "?Symfony\\\\Bug\\\\NotExistClass"? not found}');

        $container = new ContainerBuilder();

        $aDefinition = $container->register('a', BadParentTypeHintedArgument::class);
        $aDefinition->setAutowired(true);

        $container->register(Dunglas::class, Dunglas::class);

        $pass = new AutowirePass();
        $pass->process($container);
    }

    /**
     * @group legacy
     * @expectedDeprecation Autowiring services based on the types they implement is deprecated since Symfony 3.3 and won't be supported in version 4.0. You should rename (or alias) the "foo" service to "Symfony\Component\DependencyInjection\Tests\Compiler\Foo" instead.
     * @expectedExceptionInSymfony4 \Symfony\Component\DependencyInjection\Exception\AutowiringFailedException
     * @expectedExceptionMessageInSymfony4 Cannot autowire service "bar": argument "$foo" of method "Symfony\Component\DependencyInjection\Tests\Compiler\Bar::__construct()" references class "Symfony\Component\DependencyInjection\Tests\Compiler\Foo" but this service is abstract. You should maybe alias this class to the existing "foo" service.
     */
    public function testDontUseAbstractServices()
    {
        $container = new ContainerBuilder();

        $container->register(Foo::class)->setAbstract(true);
        $container->register('foo', Foo::class);
        $container->register('bar', Bar::class)->setAutowired(true);

        (new ResolveClassPass())->process($container);
        (new AutowirePass())->process($container);
    }

    public function testSomeSpecificArgumentsAreSet()
    {
        $container = new ContainerBuilder();

        $container->register('foo', Foo::class);
        $container->register(A::class);
        $container->register(Dunglas::class);
        $container->register('multiple', MultipleArguments::class)
            ->setAutowired(true)
            // set the 2nd (index 1) argument only: autowire the first and third
            // args are: A, Foo, Dunglas
            ->setArguments([
                1 => new Reference('foo'),
                3 => ['bar'],
            ]);

        (new ResolveClassPass())->process($container);
        (new AutowirePass())->process($container);

        $definition = $container->getDefinition('multiple');
        $this->assertEquals(
            [
                new TypedReference(A::class, A::class, MultipleArguments::class),
                new Reference('foo'),
                new TypedReference(Dunglas::class, Dunglas::class, MultipleArguments::class),
                ['bar'],
            ],
            $definition->getArguments()
        );
    }

    public function testScalarArgsCannotBeAutowired()
    {
        $this->expectException('Symfony\Component\DependencyInjection\Exception\AutowiringFailedException');
        $this->expectExceptionMessage('Cannot autowire service "arg_no_type_hint": argument "$bar" of method "Symfony\Component\DependencyInjection\Tests\Compiler\MultipleArguments::__construct()" is type-hinted "array", you should configure its value explicitly.');
        $container = new ContainerBuilder();

        $container->register(A::class);
        $container->register(Dunglas::class);
        $container->register('arg_no_type_hint', MultipleArguments::class)
            ->setArguments([1 => 'foo'])
            ->setAutowired(true);

        (new ResolveClassPass())->process($container);
        (new AutowirePass())->process($container);
    }

    /**
     * @requires PHP 8
     */
    public function testUnionScalarArgsCannotBeAutowired()
    {
        $this->expectException('Symfony\Component\DependencyInjection\Exception\AutowiringFailedException');
        $this->expectExceptionMessage('Cannot autowire service "union_scalars": argument "$timeout" of method "Symfony\Component\DependencyInjection\Tests\Compiler\UnionScalars::__construct()" is type-hinted "int|float", you should configure its value explicitly.');
        $container = new ContainerBuilder();

        $container->register('union_scalars', UnionScalars::class)
            ->setAutowired(true);

        (new AutowirePass())->process($container);
    }

    public function testNoTypeArgsCannotBeAutowired()
    {
        $this->expectException('Symfony\Component\DependencyInjection\Exception\AutowiringFailedException');
        $this->expectExceptionMessage('Cannot autowire service "arg_no_type_hint": argument "$foo" of method "Symfony\Component\DependencyInjection\Tests\Compiler\MultipleArguments::__construct()" has no type-hint, you should configure its value explicitly.');
        $container = new ContainerBuilder();

        $container->register(A::class);
        $container->register(Dunglas::class);
        $container->register('arg_no_type_hint', MultipleArguments::class)
            ->setAutowired(true);

        (new ResolveClassPass())->process($container);
        (new AutowirePass())->process($container);
    }

    /**
     * @requires PHP < 8
     */
    public function testOptionalScalarNotReallyOptionalUsesDefaultValue()
    {
        $container = new ContainerBuilder();

        $container->register(A::class);
        $container->register(Lille::class);
        $definition = $container->register('not_really_optional_scalar', MultipleArgumentsOptionalScalarNotReallyOptional::class)
            ->setAutowired(true);

        (new ResolveClassPass())->process($container);
        (new AutowirePass())->process($container);

        $this->assertSame('default_val', $definition->getArgument(1));
    }

    public function testOptionalScalarArgsDontMessUpOrder()
    {
        $container = new ContainerBuilder();

        $container->register(A::class);
        $container->register(Lille::class);
        $container->register('with_optional_scalar', MultipleArgumentsOptionalScalar::class)
            ->setAutowired(true);

        (new ResolveClassPass())->process($container);
        (new AutowirePass())->process($container);

        $definition = $container->getDefinition('with_optional_scalar');
        $this->assertEquals(
            [
                new TypedReference(A::class, A::class, MultipleArgumentsOptionalScalar::class),
                // use the default value
                'default_val',
                new TypedReference(Lille::class, Lille::class),
            ],
            $definition->getArguments()
        );
    }

    public function testOptionalScalarArgsNotPassedIfLast()
    {
        $container = new ContainerBuilder();

        $container->register(A::class);
        $container->register(Lille::class);
        $container->register('with_optional_scalar_last', MultipleArgumentsOptionalScalarLast::class)
            ->setAutowired(true);

        (new ResolveClassPass())->process($container);
        (new AutowirePass())->process($container);

        $definition = $container->getDefinition('with_optional_scalar_last');
        $this->assertEquals(
            [
                new TypedReference(A::class, A::class, MultipleArgumentsOptionalScalarLast::class),
                new TypedReference(Lille::class, Lille::class, MultipleArgumentsOptionalScalarLast::class),
            ],
            $definition->getArguments()
        );
    }

    public function testOptionalArgsNoRequiredForCoreClasses()
    {
        $container = new ContainerBuilder();

        $container->register('foo', \SplFileObject::class)
            ->addArgument('foo.txt')
            ->setAutowired(true);

        (new AutowirePass())->process($container);

        $definition = $container->getDefinition('foo');
        $this->assertEquals(
            ['foo.txt'],
            $definition->getArguments()
        );
    }

    public function testSetterInjection()
    {
        $container = new ContainerBuilder();
        $container->register(Foo::class);
        $container->register(A::class);
        $container->register(CollisionA::class);
        $container->register(CollisionB::class);

        // manually configure *one* call, to override autowiring
        $container
            ->register('setter_injection', SetterInjection::class)
            ->setAutowired(true)
            ->addMethodCall('setWithCallsConfigured', ['manual_arg1', 'manual_arg2'])
        ;

        (new ResolveClassPass())->process($container);
        (new AutowireRequiredMethodsPass())->process($container);
        (new AutowirePass())->process($container);

        $methodCalls = $container->getDefinition('setter_injection')->getMethodCalls();

        $this->assertEquals(
            ['setWithCallsConfigured', 'setFoo', 'setDependencies', 'setChildMethodWithoutDocBlock'],
            array_column($methodCalls, 0)
        );

        // test setWithCallsConfigured args
        $this->assertEquals(
            ['manual_arg1', 'manual_arg2'],
            $methodCalls[0][1]
        );
        // test setFoo args
        $this->assertEquals(
            [new TypedReference(Foo::class, Foo::class, SetterInjection::class)],
            $methodCalls[1][1]
        );
    }

    public function testWithNonExistingSetterAndAutowiring()
    {
        $this->expectException('Symfony\Component\DependencyInjection\Exception\RuntimeException');
        $this->expectExceptionMessage('Invalid service "Symfony\Component\DependencyInjection\Tests\Fixtures\CaseSensitiveClass": method "setLogger()" does not exist.');
        $container = new ContainerBuilder();

        $definition = $container->register(CaseSensitiveClass::class, CaseSensitiveClass::class)->setAutowired(true);
        $definition->addMethodCall('setLogger');

        (new ResolveClassPass())->process($container);
        (new AutowireRequiredMethodsPass())->process($container);
        (new AutowirePass())->process($container);
    }

    public function testExplicitMethodInjection()
    {
        $container = new ContainerBuilder();
        $container->register(Foo::class);
        $container->register(A::class);
        $container->register(CollisionA::class);
        $container->register(CollisionB::class);

        $container
            ->register('setter_injection', SetterInjection::class)
            ->setAutowired(true)
            ->addMethodCall('notASetter', [])
        ;

        (new ResolveClassPass())->process($container);
        (new AutowireRequiredMethodsPass())->process($container);
        (new AutowirePass())->process($container);

        $methodCalls = $container->getDefinition('setter_injection')->getMethodCalls();

        $this->assertEquals(
            ['notASetter', 'setFoo', 'setDependencies', 'setWithCallsConfigured', 'setChildMethodWithoutDocBlock'],
            array_column($methodCalls, 0)
        );
        $this->assertEquals(
            [new TypedReference(A::class, A::class, SetterInjection::class)],
            $methodCalls[0][1]
        );
    }

    /**
     * @group legacy
     * @expectedDeprecation Relying on service auto-registration for type "Symfony\Component\DependencyInjection\Tests\Compiler\A" is deprecated since Symfony 3.4 and won't be supported in 4.0. Create a service named "Symfony\Component\DependencyInjection\Tests\Compiler\A" instead.
     */
    public function testTypedReference()
    {
        $container = new ContainerBuilder();

        $container
            ->register('bar', Bar::class)
            ->setProperty('a', [new TypedReference(A::class, A::class, Bar::class)])
        ;

        $pass = new AutowirePass();
        $pass->process($container);

        $this->assertSame(A::class, $container->getDefinition('autowired.'.A::class)->getClass());
    }

    /**
     * @dataProvider getCreateResourceTests
     * @group legacy
     */
    public function testCreateResourceForClass($className, $isEqual)
    {
        $startingResource = AutowirePass::createResourceForClass(
            new \ReflectionClass(ClassForResource::class)
        );
        $newResource = AutowirePass::createResourceForClass(
            new \ReflectionClass(__NAMESPACE__.'\\'.$className)
        );

        // hack so the objects don't differ by the class name
        $startingReflObject = new \ReflectionObject($startingResource);
        $reflProp = $startingReflObject->getProperty('class');
        $reflProp->setAccessible(true);
        $reflProp->setValue($startingResource, __NAMESPACE__.'\\'.$className);

        if ($isEqual) {
            $this->assertEquals($startingResource, $newResource);
        } else {
            $this->assertNotEquals($startingResource, $newResource);
        }
    }

    public function getCreateResourceTests()
    {
        return [
            ['IdenticalClassResource', true],
            ['ClassChangedConstructorArgs', false],
        ];
    }

    public function testIgnoreServiceWithClassNotExisting()
    {
        $container = new ContainerBuilder();

        $container->register('class_not_exist', OptionalServiceClass::class);

        $barDefinition = $container->register('bar', Bar::class);
        $barDefinition->setAutowired(true);

        $container->register(Foo::class, Foo::class);

        $pass = new AutowirePass();
        $pass->process($container);

        $this->assertTrue($container->hasDefinition('bar'));
    }

    public function testSetterInjectionCollisionThrowsException()
    {
        $container = new ContainerBuilder();

        $container->register('c1', CollisionA::class);
        $container->register('c2', CollisionB::class);
        $aDefinition = $container->register('setter_injection_collision', SetterInjectionCollision::class);
        $aDefinition->setAutowired(true);

        (new AutowireRequiredMethodsPass())->process($container);

        $pass = new AutowirePass();

        try {
            $pass->process($container);
        } catch (AutowiringFailedException $e) {
        }

        $this->assertNotNull($e);
        $this->assertSame('Cannot autowire service "setter_injection_collision": argument "$collision" of method "Symfony\Component\DependencyInjection\Tests\Compiler\SetterInjectionCollision::setMultipleInstancesForOneArg()" references interface "Symfony\Component\DependencyInjection\Tests\Compiler\CollisionInterface" but no such service exists. You should maybe alias this interface to one of these existing services: "c1", "c2".', $e->getMessage());
    }

    public function testInterfaceWithNoImplementationSuggestToWriteOne()
    {
        $this->expectException('Symfony\Component\DependencyInjection\Exception\AutowiringFailedException');
        $this->expectExceptionMessage('Cannot autowire service "my_service": argument "$i" of method "Symfony\Component\DependencyInjection\Tests\Compiler\K::__construct()" references interface "Symfony\Component\DependencyInjection\Tests\Compiler\IInterface" but no such service exists. Did you create a class that implements this interface?');
        $container = new ContainerBuilder();

        $aDefinition = $container->register('my_service', K::class);
        $aDefinition->setAutowired(true);

        (new AutowireRequiredMethodsPass())->process($container);

        $pass = new AutowirePass();
        $pass->process($container);
    }

    /**
     * @group legacy
     * @expectedDeprecation Autowiring services based on the types they implement is deprecated since Symfony 3.3 and won't be supported in version 4.0. You should rename (or alias) the "foo" service to "Symfony\Component\DependencyInjection\Tests\Compiler\Foo" instead.
     * @expectedExceptionInSymfony4 \Symfony\Component\DependencyInjection\Exception\AutowiringFailedException
     * @expectedExceptionMessageInSymfony4 Cannot autowire service "bar": argument "$foo" of method "Symfony\Component\DependencyInjection\Tests\Compiler\Bar::__construct()" references class "Symfony\Component\DependencyInjection\Tests\Compiler\Foo" but no such service exists. You should maybe alias this class to the existing "foo" service.
     */
    public function testProcessDoesNotTriggerDeprecations()
    {
        $container = new ContainerBuilder();
        $container->register('deprecated', 'Symfony\Component\DependencyInjection\Tests\Fixtures\DeprecatedClass')->setDeprecated(true);
        $container->register('foo', Foo::class);
        $container->register('bar', Bar::class)->setAutowired(true);

        $pass = new AutowirePass();
        $pass->process($container);

        $this->assertTrue($container->hasDefinition('deprecated'));
        $this->assertTrue($container->hasDefinition('foo'));
        $this->assertTrue($container->hasDefinition('bar'));
    }

    public function testEmptyStringIsKept()
    {
        $container = new ContainerBuilder();

        $container->register(A::class);
        $container->register(Lille::class);
        $container->register('foo', MultipleArgumentsOptionalScalar::class)
            ->setAutowired(true)
            ->setArguments(['', '']);

        (new ResolveClassPass())->process($container);
        (new AutowirePass())->process($container);

        $this->assertEquals([new TypedReference(A::class, A::class, MultipleArgumentsOptionalScalar::class), '', new TypedReference(Lille::class, Lille::class)], $container->getDefinition('foo')->getArguments());
    }

    public function testWithFactory()
    {
        $container = new ContainerBuilder();

        $container->register(Foo::class);
        $definition = $container->register('a', A::class)
            ->setFactory([A::class, 'create'])
            ->setAutowired(true);

        (new ResolveClassPass())->process($container);
        (new AutowirePass())->process($container);

        $this->assertEquals([new TypedReference(Foo::class, Foo::class, A::class)], $definition->getArguments());
    }

    /**
     * @dataProvider provideNotWireableCalls
     */
    public function testNotWireableCalls($method, $expectedMsg)
    {
        $this->expectException('Symfony\Component\DependencyInjection\Exception\AutowiringFailedException');
        $container = new ContainerBuilder();

        $foo = $container->register('foo', NotWireable::class)->setAutowired(true)
            ->addMethodCall('setBar', [])
            ->addMethodCall('setOptionalNotAutowireable', [])
            ->addMethodCall('setOptionalNoTypeHint', [])
            ->addMethodCall('setOptionalArgNoAutowireable', [])
        ;

        if ($method) {
            $foo->addMethodCall($method, []);
        }

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage($expectedMsg);

        (new ResolveClassPass())->process($container);
        (new AutowireRequiredMethodsPass())->process($container);
        (new AutowirePass())->process($container);
    }

    public function provideNotWireableCalls()
    {
        return [
            ['setNotAutowireable', 'Cannot autowire service "foo": argument "$n" of method "Symfony\Component\DependencyInjection\Tests\Compiler\NotWireable::setNotAutowireable()" has type "Symfony\Component\DependencyInjection\Tests\Compiler\NotARealClass" but this class was not found.'],
            ['setDifferentNamespace', 'Cannot autowire service "foo": argument "$n" of method "Symfony\Component\DependencyInjection\Tests\Compiler\NotWireable::setDifferentNamespace()" references class "stdClass" but no such service exists. It cannot be auto-registered because it is from a different root namespace.'],
            [null, 'Invalid service "foo": method "Symfony\Component\DependencyInjection\Tests\Compiler\NotWireable::setProtectedMethod()" must be public.'],
        ];
    }

    /**
     * @group legacy
     * @expectedDeprecation Autowiring services based on the types they implement is deprecated since Symfony 3.3 and won't be supported in version 4.0. Try changing the type-hint for argument "$i" of method "Symfony\Component\DependencyInjection\Tests\Compiler\J::__construct()" to "Symfony\Component\DependencyInjection\Tests\Compiler\IInterface" instead.
     * @expectedExceptionInSymfony4 \Symfony\Component\DependencyInjection\Exception\AutowiringFailedException
     * @expectedExceptionMessageInSymfony4 Cannot autowire service "j": argument "$i" of method "Symfony\Component\DependencyInjection\Tests\Compiler\J::__construct()" references class "Symfony\Component\DependencyInjection\Tests\Compiler\I" but no such service exists. Try changing the type-hint to "Symfony\Component\DependencyInjection\Tests\Compiler\IInterface" instead.
     */
    public function testByIdAlternative()
    {
        $container = new ContainerBuilder();

        $container->setAlias(IInterface::class, 'i');
        $container->register('i', I::class);
        $container->register('j', J::class)
            ->setAutowired(true);

        $pass = new AutowirePass();
        $pass->process($container);
    }

    /**
     * @group legacy
     * @expectedDeprecation Autowiring services based on the types they implement is deprecated since Symfony 3.3 and won't be supported in version 4.0. Try changing the type-hint for "Symfony\Component\DependencyInjection\Tests\Compiler\A" in "Symfony\Component\DependencyInjection\Tests\Compiler\Bar" to "Symfony\Component\DependencyInjection\Tests\Compiler\AInterface" instead.
     */
    public function testTypedReferenceDeprecationNotice()
    {
        $container = new ContainerBuilder();

        $container->register('aClass', A::class);
        $container->setAlias(AInterface::class, 'aClass');
        $container
            ->register('bar', Bar::class)
            ->setProperty('a', [new TypedReference(A::class, A::class, Bar::class)])
        ;

        $pass = new AutowirePass();
        $pass->process($container);
    }

    public function testExceptionWhenAliasExists()
    {
        $this->expectException('Symfony\Component\DependencyInjection\Exception\AutowiringFailedException');
        $this->expectExceptionMessage('Cannot autowire service "j": argument "$i" of method "Symfony\Component\DependencyInjection\Tests\Compiler\J::__construct()" references class "Symfony\Component\DependencyInjection\Tests\Compiler\I" but no such service exists. Try changing the type-hint to "Symfony\Component\DependencyInjection\Tests\Compiler\IInterface" instead.');
        $container = new ContainerBuilder();

        // multiple I services... but there *is* IInterface available
        $container->setAlias(IInterface::class, 'i');
        $container->register('i', I::class);
        $container->register('i2', I::class);
        // J type-hints against I concretely
        $container->register('j', J::class)
            ->setAutowired(true);

        $pass = new AutowirePass();
        $pass->process($container);
    }

    public function testExceptionWhenAliasDoesNotExist()
    {
        $this->expectException('Symfony\Component\DependencyInjection\Exception\AutowiringFailedException');
        $this->expectExceptionMessage('Cannot autowire service "j": argument "$i" of method "Symfony\Component\DependencyInjection\Tests\Compiler\J::__construct()" references class "Symfony\Component\DependencyInjection\Tests\Compiler\I" but no such service exists. You should maybe alias this class to one of these existing services: "i", "i2".');

        $container = new ContainerBuilder();

        // multiple I instances... but no IInterface alias
        $container->register('i', I::class);
        $container->register('i2', I::class);
        // J type-hints against I concretely
        $container->register('j', J::class)
            ->setAutowired(true);

        $pass = new AutowirePass();
        $pass->process($container);
    }

    public function testInlineServicesAreNotCandidates()
    {
        $container = new ContainerBuilder();
        $loader = new XmlFileLoader($container, new FileLocator(realpath(__DIR__.'/../Fixtures/xml')));
        $loader->load('services_inline_not_candidate.xml');

        $pass = new AutowirePass();
        $pass->process($container);

        $this->assertSame([], $container->getDefinition('autowired')->getArguments());
    }
}
