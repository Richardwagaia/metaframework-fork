<?php

namespace MetaFramework\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;
use MetaFramework\Functions\Helpers;

class InputDateMask extends Component
{


    public function __construct(
        public string                $name,
        public int|string|float|null $value = '',
        public string                $type = 'text',
        public array                 $params = [],
        public string|null           $label = '',
        public string                $className = '',
        public bool                  $required = false,
    )
    {
        $this->className = rtrim('inputdatemask ' . $this->className.' ');
    }

    public function render(): Renderable
    {
        $this->params = array_merge($this->params, ['maxlength' => 10, 'placeholder' => $this->translations(app()->getLocale())]);

        return view('mfw::components.inputdatemask')->with([
            'label' => $this->label,
            'className' => $this->className,
            'required' => $this->required,
            'value' => $this->value,
            'params' => $this->params
        ]);
    }

    private function translations(string $locale): string
    {
        $translations = [
          'fr'=>'JJ/MM/AAAA',
          'en'=>'DD/MM/YYYY'
        ];

        return $translations[$locale] ?? $translations['en'];
    }
}
