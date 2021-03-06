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

use Okaufmann\LaravelTmdb\Model\Review;

/**
 * Class ReviewFactory
 * @package Tmdb\Factory
 */
class ReviewFactory extends AbstractFactory
{
    /**
     * {@inheritdoc}
     */
    public function create(array $data = [])
    {
        $review = new Review();

        return $this->hydrate($review, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function createCollection(array $data = [])
    {
        return $this->createResultCollection($data);
    }
}
