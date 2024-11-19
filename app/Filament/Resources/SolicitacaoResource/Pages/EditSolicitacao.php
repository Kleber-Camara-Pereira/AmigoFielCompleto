<?php

namespace App\Filament\Resources\SolicitacaoResource\Pages;

use App\Filament\Resources\SolicitacaoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSolicitacao extends EditRecord
{
    protected static string $resource = SolicitacaoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
