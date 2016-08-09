<?php

namespace TypiCMS\Modules\Blocks\Models;

use TypiCMS\Modules\Core\Shells\Models\BaseTranslation;

class BlockTranslation extends BaseTranslation
{
    /**
     * get the parent model.
     */
    public function owner()
    {
        return $this->belongsTo('TypiCMS\Modules\Blocks\Shells\Models\Block', 'block_id')->withoutGlobalScopes();
    }
}
