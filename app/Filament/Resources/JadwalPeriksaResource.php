<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Dokter;
use Faker\Core\Number;
use Illuminate\Support\Facades\Auth;
use Filament\Facades\Filament;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\ToggleColumn;
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
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        $dokter=Dokter::pluck('nama','id')->toArray();
        return $form
            ->schema([

                    // Select::make('id_dokter')
                    // ->label('Dokter')
                    // ->options($dokter)
                    // ->required(),
                    Select::make('hari')
                        ->label('Hari')
                        ->options(['senin' => 'Senin', 'selasa' => 'Selasa', 'rabu' => 'Rabu', 'kamis' => 'Kamis', 'jumat' => 'Jumat', 'sabtu' => 'Sabtu'])
                        ->required(),
                    TimePicker::make('jam_mulai')->label('Jam Mulai')->required(),
                    TimePicker::make('jam_selesai')->label('Jam Selesai')->required(),
                    // Toggle::make('aktif')->default(true),


            ]);
    }
    public static function getIdDokter(): int
    {
        $data = auth()->user();
        return $data->id_dokter;
    }

    public static function table(Table $table): Table
    {
        // if (auth()->check()) {
        return $table
        // ->query(fn () => JadwalPeriksa::where('id_dokter', self::getIdDokter()))
        // ->query(function () {
        //     return JadwalPeriksa::where('id_dokter', self::getIdDokter());
        // })
            ->columns([
                TextColumn::make('dokter.nama'),
                TextColumn::make('hari'),
                TextColumn::make('jam_mulai'),
                TextColumn::make('jam_selesai'),
                ToggleColumn::make('is_active')->label('Status Jadwal')
                // Toggle::make('aktif'),
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
        // }
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
