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
use Okaufmann\LaravelTmdb\Model\Network;

/**
 * Class NetworkFactory
 * @package Tmdb\Factory
 */
class NetworkFactory extends AbstractFactory
{
    /**
     * @param array $data
     *
     * @return Network
     */
    public function create(array $data = [])
    {
        return $this->hydrate(new Network(), $data);
    }

    /**
     * {@inheritdoc}
     */
    public function createCollection(array $data = [])
    {
        $collection = new GenericCollection();

        if (array_key_exists('networks', $data)) {
            $data = $data['networks'];
        }

        foreach ($data as $item) {
            $collection->add(null, $this->create($item));
        }

        return $collection;
    }
}
