<?php

namespace App\Http\Livewire\Forms;

use Illuminate\View\AppendableAttributeValue;
use Livewire\Component;

class InputForm extends Component
{

    public $itemName;
    public $itemValue;
    public $itemType;
    public $bladeAttributes;
    public $attributes;

    public function mount($itemName, $itemValue, $itemType, $bladeAttributes)
    {

        $this->itemName = $itemName;
        $this->itemValue = $itemValue;
        $this->itemType = $itemType;

    }


    public function merge(array $attributeDefaults = [], $escape = true)
    {
        $attributeDefaults = array_map(function ($value) use ($escape) {
            return $this->shouldEscapeAttributeValue($escape, $value)
                ? e($value)
                : $value;
        }, $attributeDefaults);

        [$appendableAttributes, $nonAppendableAttributes] = collect($this->attributes)
            ->partition(function ($value, $key) use ($attributeDefaults) {
                return $key === 'class' ||
                    (isset($attributeDefaults[$key]) &&
                        $attributeDefaults[$key] instanceof AppendableAttributeValue);
            });

        $attributes = $appendableAttributes->mapWithKeys(function ($value, $key) use ($attributeDefaults, $escape) {
            $defaultsValue = isset($attributeDefaults[$key]) && $attributeDefaults[$key] instanceof AppendableAttributeValue
                ? $this->resolveAppendableAttributeDefault($attributeDefaults, $key, $escape)
                : ($attributeDefaults[$key] ?? '');

            return [$key => implode(' ', array_unique(array_filter([$defaultsValue, $value])))];
        })->merge($nonAppendableAttributes)->all();

        return new static(array_merge($attributeDefaults, $attributes));
    }

    public function render()
    {
        return view('livewire.forms.input-form');
    }
}
