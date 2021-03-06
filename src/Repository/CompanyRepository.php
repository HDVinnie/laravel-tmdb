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

use Okaufmann\LaravelTmdb\Factory\CompanyFactory;
use Okaufmann\LaravelTmdb\Factory\MovieFactory;
use Okaufmann\LaravelTmdb\Model\Collection\ResultCollection;
use Okaufmann\LaravelTmdb\Model\Company;

/**
 * Class CompanyRepository
 * @package Tmdb\Repository
 * @see http://docs.themoviedb.apiary.io/#movies
 */
class CompanyRepository extends AbstractRepository
{
    /**
     * Load a company with the given identifier
     *
     * @param $id
     * @param  array   $parameters
     * @param  array   $headers
     * @return Company
     */
    public function load($id, array $parameters = [], array $headers = [])
    {
        $data = $this->getApi()->getCompany($id, $this->parseQueryParameters($parameters), $headers);

        return $this->getFactory()->create($data);
    }

    /**
     * Get the list of movies associated with a particular company.
     *
     * @param  integer          $id
     * @param  array            $parameters
     * @param  array            $headers
     * @return ResultCollection
     */
    public function getMovies($id, array $parameters = [], array $headers = [])
    {
        return $this->createMovieCollection(
            $this->getApi()->getMovies($id, $this->parseQueryParameters($parameters), $headers)
        );
    }

    /**
     * Return the related API class
     *
     * @return \Okaufmann\LaravelTmdb\Api\Companies
     */
    public function getApi()
    {
        return $this->getClient()->getCompaniesApi();
    }

    /**
     * @return CompanyFactory
     */
    public function getFactory()
    {
        return new CompanyFactory($this->getClient()->getHttpClient());
    }

    /**
     * @return MovieFactory
     */
    public function getMovieFactory()
    {
        return new MovieFactory($this->getClient()->getHttpClient());
    }

    /**
     * Create an collection of an array
     *
     * @param $data
     * @return ResultCollection
     */
    public function createMovieCollection($data)
    {
        $collection = new ResultCollection();

        if (array_key_exists('results', $data)) {
            $data = $data['results'];
        }

        foreach ($data as $item) {
            $collection->add(null, $this->getMovieFactory()->create($item));
        }

        return $collection;
    }
}
