<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\DaftarPoli;
use Illuminate\Http\Request;
use App\Models\JadwalPeriksa;
use App\Models\Poli;
use Illuminate\Support\Facades\Validator;

class RegisterPasienController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'nik' => 'required',
            'alamat' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('register')
                ->withErrors($validator)
                ->withInput();
        }

        $existingPasien = Pasien::where('no_ktp', $request->input('nik'))->first();

        if ($existingPasien) {
            $changes = false;

            if ($existingPasien->nama !== $request->input('fullname')) {
                $existingPasien->nama = $request->input('fullname');
                $changes = true;
            }

            if ($existingPasien->alamat !== $request->input('alamat')) {
                $existingPasien->alamat = $request->input('alamat');
                $changes = true;
            }

            if ($existingPasien->no_hp !== $request->input('phone')) {
                $existingPasien->no_hp = $request->input('phone');
                $changes = true;
            }

            if ($changes) {
                $existingPasien->save();
            }

            return redirect('daftarpoli?pasienId=' . $existingPasien->id);
        }

        $newPasien = Pasien::create([
            'nama' => $request->input('fullname'),
            'no_ktp' => $request->input('nik'),
            'alamat' => $request->input('alamat'),
            'no_hp' => $request->input('phone'),
        ]);

        return redirect('daftarpoli?pasienId=' . $newPasien->id);
    }

    public function index(){
        return view('pasien');
    }
    public function loginPasien(){
        return view('register');
    }
    public function daftarpoli(Request $request)
    {
        $idPasien = $request->input('pasienId');
        $idPoli = $request->input('poliId');
        $jadwalOptions = JadwalPeriksa::with(['dokter.poli'])
            ->select(['id', 'hari', 'jam_mulai', 'jam_selesai', 'id_dokter'])
            ->get();

        $pasienRm = Pasien::where('id', $idPasien)->value('no_rm');
        return view('daftarpoli', compact('jadwalOptions', 'pasienRm','idPasien'));

        $poliPasien = Poli::where('id', $idPoli)->value('nama_poli');
        return view('daftarpoli', compact('jadwalOptions', 'pasienRm','idPasien'));
    }

    public function daftarpolipasien(Request $request){
        $idPasien = $request->input('pasienId');
        $data = DaftarPoli::create([
            'id_pasien' => $idPasien,
            'id_jadwal' => $request->input('jadwal'),
            'keluhan' => $request->input('keluhan'),
        ]);
        return redirect()->route('pasien.index')->with('alert', 'Pendaftaran poli berhasil dengan no antrian ' .$data->no_antrian );
    }
}
