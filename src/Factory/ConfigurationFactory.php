<?php
/**
 * This file is part of the Tmdb PHP API created by Michael Roterman.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package Tmdb
 * @author Michael Roterman <michael@wtfz.net>
 * @copyright (c) 2013, Michael Roterman
 * @version 0.0.1
 */
namespace Okaufmann\LaravelTmdb\Factory;

use Okaufmann\LaravelTmdb\Model\Common\GenericCollection;
use Okaufmann\LaravelTmdb\Model\Configuration;

/**
 * Class ConfigurationFactory
 * @package Tmdb\Factory
 */
class ConfigurationFactory extends AbstractFactory
{
    /**
     * {@inheritdoc}
     */
    public function create(array $data = [])
    {
        $config = new Configuration();

        return $this->hydrate($config, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function createCollection(array $data = [])
    {
        return new GenericCollection();
    }
}
