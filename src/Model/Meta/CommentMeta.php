<?php
namespace TinyPixel\AcornDB\Model\Meta;

use TinyPixel\AcornDB\Model\Comment;

/**
 * Meta: Comment
 *
 * @author Junior Grossi <juniorgro@gmail.com>
 */
class CommentMeta extends Meta
{
    /**
     * @var string
     */
    protected $table = 'commentmeta';

    /**
     * @var array
     */
    protected $fillable = ['meta_key', 'meta_value', 'comment_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
