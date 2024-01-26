<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Obat;
use App\Models\Poli;
use Filament\Tables;
use App\Models\Pasien;
use App\Models\Periksa;
use App\Models\DaftarPoli;
use Filament\Resources\Form;
use App\Models\JadwalPeriksa;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DaftarPoliResource\Pages;
use App\Filament\Resources\DaftarPoliResource\RelationManagers;

class DaftarPoliResource extends Resource
{
    protected static ?string $model = DaftarPoli::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Memeriksa Pasien';
    protected static ?string $label = 'Daftar Periksa Pasien';

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
                        TextInput::make("id")
                        ->default(fn(DaftarPoli $record) => $record->id)
                        ->hidden(),
                    TextInput::make("pasien.nama")
                        ->default(fn(DaftarPoli $record) => "{$record->pasien->nama}")
                        ->readonly(),
                    DatePicker::make("tgl_periksa")->label("Tanggal Periksa")->default(now()),
                    Textarea::make("catatan")->label("Catatan"),
                    Select::make('obat')
                        ->label('Obat')
                        ->options(Obat::query()->pluck('nama_obat', 'id'))
                        ->required()
                        ->multiple(),
                    //     Select::make('id_pasien')
                    //         ->label('No Rm')
                    //         ->options($pasien)
                    //         ->required(),

                    // Select::make('id_poli')
                    //         ->label('Pilih Poli')
                    //         ->options($poli)
                    //         ->required(),

                    // Select::make('id_jadwal')
                    //         ->label('Pilih Jadwal')
                    //         ->options($jadwal)
                    //         ->required(),
                    // TextInput::make('keluhan'),
                    // TextInput::make('no_antrian'),


                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {

        return $table
            ->columns([
                // TextColumn::make('pasien.no_rm')
                // ->label('No Rm'),
                // TextColumn::make('jadwal.dokter.nama')
                // ->label('Dokter'),
                // // TextColumn::make('poli.name_poli')
                // // ->label('Poli'),
                // TextColumn::make('jadwal.hari')
                // ->label('Hari'),
                // TextColumn::make('jadwal.jam_mulai')
                // ->label('Jadwal Mulai'),
                // TextColumn::make('jadwal.jam_selesai')
                // ->label('Jam Selesai'),
                // TextColumn::make('keluhan')
                // ->label('Keluhan'),
                // TextColumn::make('no_antrian')
                // ->label('No Antrian'),

                TextColumn::make('pasien.nama')->label("Nama Pasien"),
                TextColumn::make('keluhan'),
                TextColumn::make('no_antrian')->label("Nomer Antrian"),
                TextColumn::make('jadwal.dokter.nama'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label("Edit Pasien")
                    ->hidden(function (DaftarPoli $record) {
                        return !Periksa::where('id_daftar_poli', $record->id)->exists();
                    }),

                Tables\Actions\Action::make("Periksa")
                    ->label("Periksa")
                    ->action(function (DaftarPoli $record, array $data) {
                        $catatan = $data['catatan'];
                        $periksa = new Periksa([
                            'id_daftar_poli' => $record->id,
                            'tgl_periksa' => now(),
                            'catatan' => $catatan,
                            'biaya_periksa' => 165000
                        ]);
                        $periksa->save();
                    })
                    ->form(function (DaftarPoli $record) {
                        return [
                            TextInput::make("id")
                                ->default(fn(DaftarPoli $record) => $record->id)
                                ->hidden(),

                            TextInput::make("pasien.nama")
                                ->default(fn(DaftarPoli $record) => $record->pasien->nama)
                                ->extraInputAttributes(['readonly' => true]),

                            DatePicker::make("tgl_periksa")->label("Tanggal Periksa")->default(now()),
                            Textarea::make("catatan")->label("Catatan"),
                            Select::make('obat')
                                ->label('Obat')
                                ->options(Obat::query()->pluck('nama_obat', 'id'))
                                ->required()
                                ->multiple(),
                        ];
                    })
                    ->hidden(function (DaftarPoli $record) {
                        return Periksa::where('id_daftar_poli', $record->id)->exists();
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
            'index' => Pages\ListDaftarPolis::route('/'),
            'create' => Pages\CreateDaftarPoli::route('/create'),
            'edit' => Pages\EditDaftarPoli::route('/{record}/edit'),
        ];
    }
}
