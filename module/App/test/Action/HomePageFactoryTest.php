<?php

namespace AppTest\Action;

use App\Action\HomePageAction;
use App\Action\HomePageFactory;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class HomePageFactoryTest extends \PHPUnit\Framework\TestCase
{
    /** @var ContainerInterface */
    protected $container;

    protected function setUp()
    {
        $this->container = $this->prophesize(ContainerInterface::class);
        $router = $this->prophesize(RouterInterface::class);

        $this->container->get(RouterInterface::class)->willReturn($router);
    }

    public function testFactoryWithoutTemplate()
    {
        $factory = new HomePageFactory();
        $this->container->get(TemplateRendererInterface::class)->willReturn(null);

        $this->assertTrue($factory instanceof HomePageFactory);

        $homePage = $factory($this->container->reveal());

        $this->assertTrue($homePage instanceof HomePageAction);
    }

    public function testFactoryWithTemplate()
    {
        $factory = new HomePageFactory();
        $this->container
            ->get(TemplateRendererInterface::class)
            ->willReturn($this->prophesize(TemplateRendererInterface::class));

        $this->assertTrue($factory instanceof HomePageFactory);

        $homePage = $factory($this->container->reveal());

        $this->assertTrue($homePage instanceof HomePageAction);
    }
}
