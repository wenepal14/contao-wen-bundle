<?php
namespace WEN\WENFavourhoodsBundle\ContaoManager;

use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\CoreBundle\ContaoCoreBundle;

use Contao\ManagerPlugin\Routing\RoutingPluginInterface;
use Symfony\Component\Config\Loader\LoaderResolverInterface;
use Symfony\Component\HttpKernel\KernelInterface;

use WEN\WENFavourhoodsBundle\WENFavourhoodsBundle;

class Plugin implements BundlePluginInterface, RoutingPluginInterface {
    public function getBundles(ParserInterface $parser): array {
        return [
            BundleConfig::create(WENFavourhoodsBundle::class)
                ->setLoadAfter([WENFavourhoodsBundle::class]),
        ];
    }

	public function getRouteCollection(LoaderResolverInterface $resolver, KernelInterface $kernel) {
        $file = __DIR__.'/../Resources/config/routing.yml';
        return $resolver->resolve($file)->load($file);
    }
}