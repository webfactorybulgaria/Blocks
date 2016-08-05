<?php

namespace TypiCMS\Modules\Blocks\Models;

use TypiCMS\Modules\Core\Custom\Traits\Translatable;
use Laracasts\Presenter\PresentableTrait;
use TypiCMS\Modules\Core\Custom\Models\Base;
use TypiCMS\Modules\History\Custom\Traits\Historable;

class Block extends Base
{
    use Historable;
    use PresentableTrait;
    use Translatable;

    protected $presenter = 'TypiCMS\Modules\Blocks\Custom\Presenters\BlockPresenter';

    protected $fillable = [
        'name',
        // Translatable columns
        'status',
        'body',
    ];

    /**
     * Translatable model configs.
     *
     * @var array
     */
    public $translatedAttributes = [
        'status',
        'body',
    ];

    protected $appends = ['body_cleaned'];

    /**
     * Append thumb attribute.
     *
     * @return string
     */
    public function getThumbAttribute()
    {
        return $this->present()->thumbSrc(null, 22);
    }

    /**
     * Append Body attribute from translation table.
     *
     * @return string
     */
    public function getBodyCleanedAttribute()
    {
        return strip_tags(html_entity_decode($this->body));
    }
}
