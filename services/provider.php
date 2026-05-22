<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.Jcemediaconverter
 *
 * @copyright   Copyright (C) 2026 Uziel - Ponto Mega. All rights reserved.
 * @license     GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

use Joomla\CMS\Extension\PluginInterface;
use Joomla\CMS\Factory;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use Joomla\Event\DispatcherInterface;
use Joomla\Plugin\System\JceMediaConverter\Extension\JceMediaConverter;

return new class() implements ServiceProviderInterface
{
    /**
     * Registers the service provider with a DI container.
     *
     * @param   Container  $container  The DI container.
     *
     * @return  void
     */
    public function register(Container $container)
    {
        $container->set(
            PluginInterface::class,
            function (Container $container) {
                $dispatcher = $container->get(DispatcherInterface::class);

                $plugin = new JceMediaConverter(
                    $dispatcher,
                    (array) PluginHelper::getPlugin('system', 'jcemediaconverter')
                );

                $plugin->setApplication(Factory::getApplication());

                return $plugin;
            }
        );
    }
};
