<?php

namespace TinyPixel\AcornDB\Model\Meta;

use TinyPixel\AcornDB\Model\User;

/**
 * Meta: User
 *
 * @author Mickael Burguet <www.rundef.com>
 * @author Junior Grossi   <juniorgro@gmail.com>
 * @author Kelly Mears     <kelly@tinypixel.dev>
 */
class UserMeta extends Meta
{
    /**
     * Override default prefix.
     *
     * @var bool
     */
    protected $baseTable = true;

    /**
     * @var string
     */
    protected $table = 'usermeta';

    /**
     * @var string
     */
    protected $primaryKey = 'umeta_id';

    /**
     * @var array
     */
    protected $fillable = ['meta_key', 'meta_value', 'user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
