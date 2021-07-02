<?php

namespace Domain\Attachment\Models;

use Domain\Common\Filters\QueryFilter;

/**
 * Class AttachmentFilter
 * @package Domain\Attachment\Models
 */
class AttachmentFilter extends QueryFilter {
    public function name(string $name) {
        $this->builder->where('name', 'ilike', "%{$name}%");
    }
}
