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

use Okaufmann\LaravelTmdb\Factory\ChangesFactory;
use Okaufmann\LaravelTmdb\Model\Collection\People;
use Okaufmann\LaravelTmdb\Model\Query\ChangesQuery;

/**
 * Class ChangesRepository
 * @package Tmdb\Repository
 * @see http://docs.themoviedb.apiary.io/#changes
 */
class ChangesRepository extends AbstractRepository
{
    /**
     * Get a list of movie ids that have been edited.
     *
     * By default we show the last 24 hours and only 100 items per page.
     * The maximum number of days that can be returned in a single request is 14.
     *
     * You can then use the movie changes API to get the actual data that has been changed.
     * Please note that the change log system to support this was changed on October 5, 2012
     * and will only show movies that have been edited since.
     *
     * @param  ChangesQuery                         $query
     * @param  array                                $headers
     * @return \Okaufmann\LaravelTmdb\Model\Common\GenericCollection
     */
    public function getMovieChanges(ChangesQuery $query, array $headers = [])
    {
        $data = $this->getApi()->getMovieChanges($query->toArray(), $headers);

        return $this->getFactory()->createResultCollection($data);
    }

    /**
     * Get a list of people ids that have been edited.
     *
     * By default we show the last 24 hours and only 100 items per page.
     * The maximum number of days that can be returned in a single request is 14.
     *
     * You can then use the person changes API to get the actual data that has been changed.
     * Please note that the change log system to support this was changed on October 5, 2012
     * and will only show people that have been edited since.
     *
     * @param  ChangesQuery $query
     * @param  array        $headers
     * @return People
     */
    public function getPeopleChanges(ChangesQuery $query, array $headers = [])
    {
        $data = $this->getApi()->getPersonChanges($query->toArray(), $headers);

        return $this->getFactory()->createResultCollection($data);
    }

    /**
     * Get a list of tv show ids that have been edited.
     *
     * By default we show the last 24 hours and only 100 items per page.
     * The maximum number of days that can be returned in a single request is 14.
     *
     * You can then use the tv changes API to get the actual data that has been changed.
     *
     * Please note that the change log system to support this was changed
     * on May 13, 2014 and will only show tv shows that have been edited since.
     *
     * @param  ChangesQuery                         $query
     * @param  array                                $headers
     * @return \Okaufmann\LaravelTmdb\Model\Common\GenericCollection
     */
    public function getTvChanges(ChangesQuery $query, array $headers = [])
    {
        $data = $this->getApi()->getTvChanges($query->toArray(), $headers);

        return $this->getFactory()->createResultCollection($data);
    }

    /**
     * Return the related API class
     *
     * @return \Okaufmann\LaravelTmdb\Api\Changes
     */
    public function getApi()
    {
        return $this->getClient()->getChangesApi();
    }

    /**
     * Changes does not support a generic factory
     *
     * @return ChangesFactory
     */
    public function getFactory()
    {
        return new ChangesFactory($this->getClient()->getHttpClient());
    }
}
