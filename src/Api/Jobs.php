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
namespace Okaufmann\LaravelTmdb\Api;

/**
 * Class Jobs
 * @package Tmdb\Api
 * @see http://docs.themoviedb.apiary.io/#jobs
 */
class Jobs extends AbstractApi
{
    /**
     * Get a list of valid jobs.
     *
     * @param  array $parameters
     * @param  array $headers
     * @return mixed
     */
    public function getJobs(array $parameters = [], array $headers = [])
    {
        return $this->get('job/list', $parameters, $headers);
    }
}
