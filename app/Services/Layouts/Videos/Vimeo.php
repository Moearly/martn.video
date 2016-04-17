<?php

namespace Learner\Services\Layouts\Videos;

class Vimeo
{
    use VideoTrait;

    /**
     * Id
     *
     * @var integer
     */
    private $id;

    /**
     * Width
     *
     * @var integer
     */
    private $width = 1280;

    /**
     * Height
     *
     * @var integer
     */
    private $height = 720;

    /**
     * Get the iframe code.
     *
     * @param  integer $id
     *
     * @return string
     */
    public function getIFrame($id)
    {
        return '<iframe src="https://player.vimeo.com/video/' . $id . '" width="' . $this->getWidth() . '" height="' . $this->getHeight() . '" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
    }
}
