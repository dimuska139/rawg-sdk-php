<?php

namespace Rawg\Filters;

use DatePeriod;
use Rawg\DateRange;

class GamesFilter extends Filter
{
    /**
     * @var int
     */
    protected $page = 1;

    /**
     * @var int
     */
    protected $page_size = 20;

    /**
     * @var string | null
     */
    protected $ordering = null;

    /**
     * @var string | null
     */
    protected $search = null;

    /**
     * @var string | null
     */
    protected $parent_platforms = null;

    /**
     * @var string | null
     */
    protected $platforms = null;

    /**
     * @var string | null
     */
    protected $stores = null;

    /**
     * @var string | null
     */
    protected $developers = null;

    /**
     * @var string | null
     */
    protected $publishers = null;

    /**
     * @var string | null
     */
    protected $genres = null;

    /**
     * @var string | null
     */
    protected $tags = null;

    /**
     * @var string | null
     */
    protected $creators = null;

    /**
     * @var string | null
     */
    protected $dates = null;

    /**
     * @var int | null
     */
    protected $platforms_count = null;

    /**
     * @var int | null
     */
    protected $exclude_collection = null;

    /**
     * @var boolean | null
     */
    protected $exclude_additions = null;

    /**
     * @var boolean | null
     */
    protected $exclude_parents = null;

    /**
     * @var boolean | null
     */
    protected $exclude_game_series = null;

    /**
     * @param string|null $search
     * @return GamesFilter
     */
    public function setSearch(string $search): GamesFilter
    {
        $this->search = $search;
        return $this;
    }

    /**
     * @param array $ids
     * @return GamesFilter
     */
    public function setParentPlatforms(array $ids): GamesFilter
    {
        $this->parent_platforms = implode(',', $ids);
        return $this;
    }

    /**
     * @param array $ids
     * @return GamesFilter
     */
    public function setPlatforms(array $ids): GamesFilter
    {
        $this->platforms = implode(',', $ids);
        return $this;
    }

    /**
     * @param array $ids
     * @return GamesFilter
     */
    public function setStores(array $ids): GamesFilter
    {
        $this->stores = implode(',', $ids);
        return $this;
    }

    /**
     * @param array $developers
     * @return GamesFilter
     */
    public function setDevelopers(array $developers): GamesFilter
    {
        $this->developers = implode(',', $developers);
        return $this;
    }

    /**
     * @param array $publishers
     * @return GamesFilter
     */
    public function setPublishers(array $publishers): GamesFilter
    {
        $this->publishers = implode(',', $publishers);
        return $this;
    }

    /**
     * @param array $genres
     * @return GamesFilter
     */
    public function setGenres(array $genres): GamesFilter
    {
        $this->genres = implode(',', $genres);
        return $this;
    }

    /**
     * @param array $tags
     * @return GamesFilter
     */
    public function setTags(array $tags): GamesFilter
    {
        $this->tags = implode(',', $tags);
        return $this;
    }

    /**
     * @param array $creators
     * @return GamesFilter
     */
    public function setCreators(array $creators): GamesFilter
    {
        $this->creators = implode(',', $creators);
        return $this;
    }

    /**
     * @param DateRange[] $ranges
     * @return GamesFilter
     */
    public function setDates(array $ranges): GamesFilter
    {
        $this->dates = implode('.', array_map(function ($value) {
            /**
             * @var DateRange $value
             */
            return $value->getFrom()->format('Y-m-d') . ',' . $value->getTo()->format('Y-m-d');
        }, $ranges));
        return $this;
    }

    /**
     * @param int|null $platforms_count
     * @return GamesFilter
     */
    public function setPlatformsCount(int $platforms_count): GamesFilter
    {
        $this->platforms_count = $platforms_count;
        return $this;
    }

    /**
     * @param int|null $exclude_collection
     * @return GamesFilter
     */
    public function setExcludeCollection(int $exclude_collection): GamesFilter
    {
        $this->exclude_collection = $exclude_collection;
        return $this;
    }

    /**
     * @param bool|null $exclude_additions
     * @return GamesFilter
     */
    public function setExcludeAdditions(bool $exclude_additions): GamesFilter
    {
        $this->exclude_additions = $exclude_additions;
        return $this;
    }

    /**
     * @param bool|null $exclude_parents
     * @return GamesFilter
     */
    public function setExcludeParents(bool $exclude_parents): GamesFilter
    {
        $this->exclude_parents = $exclude_parents;
        return $this;
    }

    /**
     * @param bool|null $exclude_game_series
     * @return GamesFilter
     */
    public function setExcludeGameSeries(bool $exclude_game_series): GamesFilter
    {
        $this->exclude_game_series = $exclude_game_series;
        return $this;
    }

    /**
     * @param string $ordering
     * @return GamesFilter
     */
    public function setOrdering(string $ordering): GamesFilter
    {
        $this->ordering = $ordering;
        return $this;
    }

    /**
     * @param int $page
     * @return GamesFilter
     */
    public function setPage(int $page): GamesFilter
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @param int $pageSize
     * @return GamesFilter
     */
    public function setPageSize(int $pageSize): GamesFilter
    {
        $this->page_size = $pageSize;
        return $this;
    }
}