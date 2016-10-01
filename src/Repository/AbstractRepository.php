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
namespace Okaufmann\LaravelTmdb\Repository;

use Symfony\Component\EventDispatcher\EventDispatcher;
use Okaufmann\LaravelTmdb\Api\ApiInterface;
use Okaufmann\LaravelTmdb\Factory\AbstractFactory;
use Okaufmann\LaravelTmdb\Model\Common\QueryParameter\QueryParameterInterface;
use Okaufmann\LaravelTmdb\LaravelTmdb as Client;

/**
 * Class AbstractRepository
 * @package Tmdb\Repository
 */
abstract class AbstractRepository
{
    protected $client = null;
    protected $api    = null;

    /**
     * Constructor
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Return the client
     *
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Process query parameters
     *
     * @param  array $parameters
     * @return array
     */
    protected function parseQueryParameters(array $parameters = [])
    {
        foreach ($parameters as $key => $candidate) {
            if (is_a($candidate, 'Okaufmann\LaravelTmdb\Model\Common\QueryParameter\QueryParameterInterface')) {
                $interfaces = class_implements($candidate);

                if (array_key_exists('Okaufmann\LaravelTmdb\Model\Common\QueryParameter\QueryParameterInterface', $interfaces)) {
                    unset($parameters[$key]);

                    $parameters[$candidate->getKey()] = $candidate->getValue();
                }
            }
        }

        return $parameters;
    }

    /**
     * Return the API Class
     *
     * @return ApiInterface
     */
    abstract public function getApi();

    /**
     * Return the Factory Class
     *
     * @return AbstractFactory
     */
    abstract public function getFactory();
}
