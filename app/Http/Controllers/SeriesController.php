<?php

namespace Learner\Http\Controllers;

use Learner\Http\Controllers\BaseController;
use Learner\Repositories\VideoRepositoryInterface;
use Learner\Repositories\SeriesRepositoryInterface;

class SeriesController extends BaseController
{
    /**
     * Series repository.
     *
     * @var Learner\Repositories\SeriesRepositoryInterface
     */
    protected $series;

    /**
     * Video repository
     *
     * @var Learner\Repositories\VideoRepositoryInterface
     */
    protected $videos;

    /**
     * Instance series repository.
     *
     * @param \Learner\Repositories\SeriesRepositoryInterface $series
     * @param \Learner\Repositories\VideoRepositoryInterface $videos
     */
    public function __construct(SeriesRepositoryInterface $series, VideoRepositoryInterface $videos)
    {
        $this->series = $series;
        $this->videos = $videos;
    }

    /**
     * Route series.
     *
     * /series get
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $series = $this->series->findAllWithRelationHavePublishedVideo();

        return view('series.index', compact('series'));
    }

    /**
     * Route series.show
     *
     * /series/{id} get
     *
     * @param  string $slug
     *
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $series = $this->series->findAllWithRelationBySlug($slug);

        return view('series.show', compact('series'));
    }

    /**
     * Show series.video.show
     *
     * /series/id/videos/{id} get
     *
     * @param  integer $id
     * @param  integer $uid
     *
     * @return \Illuminate\View\View
     */
    public function showVideo($slug, $vid)
    {
        $video = $this->videos->findById($vid);
        $series = $this->series->findAllWithRelationBySlug($slug);

        return view('series.video', compact('video', 'series'));
    }
}
