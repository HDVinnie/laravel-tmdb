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
namespace Okaufmann\LaravelTmdb\Model\Common;

use Okaufmann\LaravelTmdb\Model\Filter\LanguageFilter;

/**
 * Class Translation
 * @package Tmdb\Model\Common
 */
class Translation extends SpokenLanguage implements LanguageFilter
{
    private $englishName;

    public static $properties = [
        'iso_639_1',
        'name',
        'english_name'
    ];

    /**
     * @param  string $englishName
     * @return $this
     */
    public function setEnglishName($englishName)
    {
        $this->englishName = $englishName;

        return $this;
    }

    /**
     * @return string
     */
    public function getEnglishName()
    {
        return $this->englishName;
    }
}
