<?php

namespace TinyPixel\AcornDB\Model\Builder;

use Illuminate\Database\Eloquent\Builder;

/**
 * Comment Builder
 *
 * @author     Kelly Mears <kelly@tinypixel.dev>
 * @license    MIT
 * @since      1.0.0
 *
 * @package    AcornDB
 * @subpackage Builder\Taxonomy
 ***/
class CommentBuilder extends Builder
{
    /**
     * Comment has been approved.
     *
     * @return CommentBuilder
     **/
    public function approved() : CommentBuilder
    {
        return $this->where('comment_approved', 1);
    }
}