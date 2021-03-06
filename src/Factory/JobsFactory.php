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

use Okaufmann\LaravelTmdb\Model\Collection\Jobs;
use Okaufmann\LaravelTmdb\Model\Job;

/**
 * Class JobsFactory
 * @package Tmdb\Factory
 */
class JobsFactory extends AbstractFactory
{
    /**
     * {@inheritdoc}
     */
    public function create(array $data = [])
    {
        return $this->hydrate(new Job(), $data);
    }

    /**
     * {@inheritdoc}
     */
    public function createCollection(array $data = [])
    {
        $collection = new Jobs();

        if (array_key_exists('jobs', $data)) {
            $data = $data['jobs'];
        }

        foreach ($data as $item) {
            $collection->add(null, $this->create($item));
        }

        return $collection;
    }
}
