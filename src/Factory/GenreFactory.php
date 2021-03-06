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

use Okaufmann\LaravelTmdb\Model\Collection\Genres;
use Okaufmann\LaravelTmdb\Model\Genre;

/**
 * Class GenreFactory
 * @package Tmdb\Factory
 */
class GenreFactory extends AbstractFactory
{
    /**
     * @param array $data
     *
     * @return Genre
     */
    public function create(array $data = [])
    {
        return $this->hydrate(new Genre(), $data);
    }

    /**
     * {@inheritdoc}
     */
    public function createCollection(array $data = [], $key = 'genres')
    {
        $collection = new Genres();

        if (array_key_exists($key, $data)) {
            $data = $data[$key];
        }

        foreach ($data as $item) {
            $collection->addGenre($this->create($item));
        }

        return $collection;
    }
}
