<?php

namespace Learner\Services\Videos;

use Learner\Exceptions\VideoNotFoundException;

class Vimeo
{
    use VideoTrait;

    /**
     * Video Id
     *
     * @var String
     */
    private $id;

    /**
     * The vimeo base api url.
     *
     * @var string
     */
    private $baseUrl = 'https://vimeo.com/api/oembed.json?url=https://vimeo.com/{id}';

    /**
     * Get the video detail.
     *
     * @param  integer $id
     * @return array
     */
    public function getVideoDetail($id)
    {
        $this->setId($id);

        $data = $this->getData($this->baseUrl);

        if (! $data) {
            throw new VideoNotFoundException("video_not_found");
        }

        if (! isset($data->title)) {
            throw new VideoNotFoundException("video_not_found");
        }

        return [
            'title' => $data->title,
            'description' => $data->description,
            'duration' => $data->duration,
            'upload_date' => $data->upload_date,
            'thumbnail_url' => $data->thumbnail_url
        ];
    }
}
