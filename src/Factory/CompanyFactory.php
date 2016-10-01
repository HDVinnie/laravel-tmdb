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

use Okaufmann\LaravelTmdb\Client\HttpClient;
use Okaufmann\LaravelTmdb\Model\Common\GenericCollection;
use Okaufmann\LaravelTmdb\Model\Company;

/**
 * Class CompanyFactory
 * @package Tmdb\Factory
 */
class CompanyFactory extends AbstractFactory
{
    /**
     * @var ImageFactory
     */
    private $imageFactory;

    /**
     * Constructor
     *
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->imageFactory = new ImageFactory($httpClient);

        parent::__construct($httpClient);
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data = [])
    {
        $company = new Company();

        if (array_key_exists('logo_path', $data)) {
            $company->setLogoImage($this->getImageFactory()->createFromPath($data['logo_path'], 'logo_path'));
        }

        return $this->hydrate($company, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function createCollection(array $data = [])
    {
        return new GenericCollection();
    }

    /**
     * @param  \Okaufmann\LaravelTmdb\Factory\ImageFactory $imageFactory
     * @return $this
     */
    public function setImageFactory($imageFactory)
    {
        $this->imageFactory = $imageFactory;

        return $this;
    }

    /**
     * @return \Okaufmann\LaravelTmdb\Factory\ImageFactory
     */
    public function getImageFactory()
    {
        return $this->imageFactory;
    }
}
