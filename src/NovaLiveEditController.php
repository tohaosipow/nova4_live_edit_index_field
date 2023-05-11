<?php

namespace Antonosipov\NovaLiveEditField;

use App\Http\Controllers\Controller;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Nova;

class NovaLiveEditController extends Controller
{
    public function update(NovaRequest $request, $resource)
    {
        dump($request->route('resource'));
      $resourceClass = $request->resource();
        dump($resourceClass);
        $resourceValidationRules = $resourceClass::rulesForUpdate($request);
        $fieldValidationRules = $resourceValidationRules[$request->attribute];

        if (!empty($fieldValidationRules)) {
            $validatedData = $request->validate([
                'value' => $fieldValidationRules,
            ]);
        }

        $model = $request->model()->findOrFail($request->id);
        $model->{$request->attribute} = $request->value;
        $model->save();
    }
}
