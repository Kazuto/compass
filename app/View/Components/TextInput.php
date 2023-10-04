<?php

declare(strict_types=1);

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Str;

class TextInput extends Component
{
    public function __construct(
        public string $id,
        public string $name,
        public ?string $label = null
    ) {
        $this->label = $this->label ?? Str::title($this->name);
    }

    public function render(): View
    {
        return view('components.text-input');
    }
}