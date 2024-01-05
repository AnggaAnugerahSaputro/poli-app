<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Dokter;
use Filament\Resources\Form;
use App\Models\JadwalPeriksa;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TimePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\JadwalPeriksaResource\Pages;
use App\Filament\Resources\JadwalPeriksaResource\RelationManagers;

class JadwalPeriksaResource extends Resource
{
    protected static ?string $model = JadwalPeriksa::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        $dokter=Dokter::pluck('nama','id')->toArray();
        return $form
            ->schema([

                    Select::make('id_dokter')
                    ->label('Dokter')
                    ->options($dokter)
                    ->required(),
                    Select::make('hari')
                        ->label('Hari')
                        ->options(['senin' => 'Senin', 'selasa' => 'Selasa', 'rabu' => 'Rabu', 'kamis' => 'Kamis', 'jumat' => 'Jumat', 'sabtu' => 'Sabtu'])
                        ->required(),
                    TimePicker::make('jam_mulai')->label('Jam Mulai')->required(),
                    TimePicker::make('jam_selesai')->label('Jam Selesai')->required(),



            ]);
    }
    public static function getIdDokter(): int
    {
        $data = auth()->user();
        return $data->id_dokter;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('dokter.nama'),
                TextColumn::make('hari'),
                TextColumn::make('jam_mulai'),
                TextColumn::make('jam_selesai'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListJadwalPeriksas::route('/'),
            'create' => Pages\CreateJadwalPeriksa::route('/create'),
            'edit' => Pages\EditJadwalPeriksa::route('/{record}/edit'),
        ];
    }
}
