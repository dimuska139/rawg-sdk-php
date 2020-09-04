<?php

use Codeception\Test\Unit;
use Rawg\DateRange;
use Rawg\Filters\Filter;
use Rawg\Filters\GamesFilter;
use Rawg\Filters\OrderingFilter;

class GamesFilterTest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testFilter()
    {
        $params = [
            'page' => 1,
            'page_size' => 10,
            'ordering' => '-released',
            'search' => 'avatar',
            'parent_platforms' => '1,2,3',
            'platforms' => '4,5,6',
            'stores' => '7,8,9',
            'developers' => '123,456,dmitriy-sviridov',
            'publishers' => '432455,Alex,942',
            'genres' => 'indie,action,91',
            'tags' => 'singleplayer,multiplayer,5',
            'creators' => 'cris-velasco,mike-morasky',
            'dates' => '2010-01-01,2018-12-31.1960-01-01,1969-12-31',
            'platforms_count' => 1252,
            'exclude_collection' => 812,
            'exclude_additions' => true,
            'exclude_parents' => false,
            'exclude_game_series' => true,
        ];

        $filter = new GamesFilter();
        $this->assertInstanceOf(Filter::class, $filter);
        $this->assertInstanceOf(GamesFilter::class, $filter->setPage($params['page']));
        $this->assertInstanceOf(GamesFilter::class, $filter->setPageSize($params['page_size']));
        $this->assertInstanceOf(GamesFilter::class, $filter->setOrdering($params['ordering']));
        $this->assertInstanceOf(GamesFilter::class, $filter->setSearch($params['search']));
        $this->assertInstanceOf(GamesFilter::class, $filter->setParentPlatforms(explode(',', $params['parent_platforms'])));
        $this->assertInstanceOf(GamesFilter::class, $filter->setPlatforms(explode(',', $params['platforms'])));
        $this->assertInstanceOf(GamesFilter::class, $filter->setStores(explode(',', $params['stores'])));
        $this->assertInstanceOf(GamesFilter::class, $filter->setDevelopers(explode(',', $params['developers'])));
        $this->assertInstanceOf(GamesFilter::class, $filter->setPublishers(explode(',', $params['publishers'])));
        $this->assertInstanceOf(GamesFilter::class, $filter->setGenres(explode(',', $params['genres'])));
        $this->assertInstanceOf(GamesFilter::class, $filter->setTags(explode(',', $params['tags'])));
        $this->assertInstanceOf(GamesFilter::class, $filter->setCreators(explode(',', $params['creators'])));
        $this->assertInstanceOf(GamesFilter::class, $filter->setDates([
            DateRange::create(new DateTime('2010-01-01'), new DateTime('2018-12-31')),
            DateRange::create(new DateTime('1960-01-01'), new DateTime('1969-12-31')),
        ]));
        $this->assertInstanceOf(GamesFilter::class, $filter->setPlatformsCount($params['platforms_count']));
        $this->assertInstanceOf(GamesFilter::class, $filter->setExcludeCollection($params['exclude_collection']));
        $this->assertInstanceOf(GamesFilter::class, $filter->setExcludeAdditions($params['exclude_additions']));
        $this->assertInstanceOf(GamesFilter::class, $filter->setExcludeParents($params['exclude_parents']));
        $this->assertInstanceOf(GamesFilter::class, $filter->setExcludeGameSeries($params['exclude_game_series']));
        $this->assertEquals($params, $filter->toArray());
    }
}
