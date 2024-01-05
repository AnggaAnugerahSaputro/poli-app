<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Pasien;
use App\Models\DaftarPoli;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PasienResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PasienResource\RelationManagers;

class PasienResource extends Resource
{
    protected static ?string $model = Pasien::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationLabel = 'Pasien';
    protected static bool $create = false; // Menonaktifkan tombol Create
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('nama')->label('Nama')->required(),
                        TextInput::make('alamat')->label('Alamat')->required(),
                        TextInput::make('no_ktp')->label('No KTP')->required(),
                        TextInput::make('no_hp')->label('NO HP')->required(),
                        // TextInput::make('no_rm')->label('No Rm')->required(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->label('Nama'),
                TextColumn::make('alamat')->label('Alamat'),
                TextColumn::make('no_ktp')->label('No KTP'),
                TextColumn::make('no_hp')->label('No HP'),
                TextColumn::make('no_rm')->label('No RM'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make("Riwayat Periksa")->label("Riwayat Periksa")
                    ->form(function (Pasien $record) {
                        $daftarPoli = DaftarPoli::where('id_pasien', $record->id)->first();
                        $keluhan = $daftarPoli ? $daftarPoli->keluhan : null;
                        return [
                            TextInput::make("Pasien")->label("Nama Pasien")
                                ->default(fn(Pasien $record) => "{$record->nama}")
                                ->readonly(),
                                TextInput::make("keluhan")->label("Keluhan")
                                ->default($keluhan)
                                ->readonly(),
                        ];
                    })
                    ->hidden(function (Pasien $record) {
                        return !DaftarPoli::where('id_pasien', $record->id)->exists();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPasiens::route('/'),
            'create' => Pages\CreatePasien::route('/create'),
            'edit' => Pages\EditPasien::route('/{record}/edit'),
        ];
    }
}
