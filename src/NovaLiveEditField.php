<?php

namespace Antonosipov\NovaLiveEditField;

use Illuminate\Support\Facades\Config;
use Laravel\Nova\Fields\Field;

class NovaLiveEditField extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-live-edit-field';

    protected function resolveAttribute($resource, $attribute)
    {
        $this->withMeta([
            'id' => data_get($resource, $resource->getKeyName()),
            'nova_path' => Config::get('nova.path')
        ]);

        return parent::resolveAttribute($resource, $attribute);
    }
}
