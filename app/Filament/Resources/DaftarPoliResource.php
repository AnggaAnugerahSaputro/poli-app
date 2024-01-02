<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Poli;
use Filament\Tables;
use App\Models\Pasien;
use App\Models\DaftarPoli;
use Filament\Resources\Form;
use App\Models\JadwalPeriksa;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DaftarPoliResource\Pages;
use App\Filament\Resources\DaftarPoliResource\RelationManagers;

class DaftarPoliResource extends Resource
{
    protected static ?string $model = DaftarPoli::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {

        $pasien=Pasien::pluck('no_rm','id')->toArray();
        $poli=Poli::pluck('nama_poli','id')->toArray();
        $jadwal=JadwalPeriksa::pluck('hari','id')->toArray();
        $poli=Poli::pluck('nama_poli','id')->toArray();


        return $form
            ->schema([
                Card::make()
                    ->schema([

                        Select::make('id_pasien')
                            ->label('No Rm')
                            ->options($pasien)
                            ->required(),

                    Select::make('id_poli')
                            ->label('Pilih Poli')
                            ->options($poli)
                            ->required(),

                    Select::make('id_jadwal')
                            ->label('Pilih Jadwal')
                            ->options($jadwal)
                            ->required(),
                    TextInput::make('keluhan'),
                    TextInput::make('no_antrian'),


                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {

        return $table
            ->columns([
                TextColumn::make('pasien.no_rm')
                ->label('No Rm'),
                TextColumn::make('jadwal.dokter.nama')
                ->label('Dokter'),
                // TextColumn::make('poli.name_poli')
                // ->label('Poli'),
                TextColumn::make('jadwal.hari')
                ->label('Hari'),
                TextColumn::make('jadwal.jam_mulai')
                ->label('Jadwal Mulai'),
                TextColumn::make('jadwal.jam_selesai')
                ->label('Jam Selesai'),
                TextColumn::make('keluhan')
                ->label('Keluhan'),
                TextColumn::make('no_antrian')
                ->label('No Antrian'),
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
            'index' => Pages\ListDaftarPolis::route('/'),
            'create' => Pages\CreateDaftarPoli::route('/create'),
            'edit' => Pages\EditDaftarPoli::route('/{record}/edit'),
        ];
    }
}
