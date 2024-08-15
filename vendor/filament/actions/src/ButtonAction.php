<?php

namespace Filament\Pages\Actions;

use Filament\Actions\Action;
use Closure;
use Filament\Actions\Concerns\CanCustomizeProcess;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Form;
use Filament\Support\Facades\FilamentIcon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

/**
 * @deprecated Use `\Filament\Actions\Action` instead.
 */
class ButtonAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'Laporan';
    }
}
