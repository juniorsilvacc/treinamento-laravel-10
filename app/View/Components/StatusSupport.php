<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatusSupport extends Component
{
    public function __construct(
        protected string $status,
    ) {
    }

    public function render(): View|Closure|string
    {
        $color = 'primary';
        $color = $this->status === 'C' ? 'success' : $color;
        $color = $this->status === 'P' ? 'danger' : $color;
        $textStatus = getStatusSupport($this->status);

        return view('components.status-support', [
            'textStatus' => $textStatus,
            'color' => $color,
        ]);
    }
}
