<?php

namespace Filament\Actions;

use Closure;
use Filament\Actions\Concerns\CanCustomizeProcess;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Form;
use Filament\Support\Facades\FilamentIcon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Button extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'Buat Laporan';
    }
    public static function getDefaultColor(): ?string
    {
        return 'red'; // Change this to the desired color
    }
}
