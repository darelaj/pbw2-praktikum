<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CollectionController extends Controller
{
    //
    public function index()
    {
        $collections = Collection::all();
        return view('koleksi.daftarKoleksi', ['collections' => $collections]);

    }
    public function create()
    {
        
        return view('koleksi.registrasi');
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'namaKoleksi' => ['required', 'string', 'max:100', 'unique:collections'],
                'jenisKoleksi' => ['required', 'integer'],
                'jumlahKoleksi' => ['required', 'integer'],
            ],
            [
                'nama.unique' => 'Nama Koleksi sudah tersedia'
            ]
        );

        $collection = Collection::create([
            'namaKoleksi' => $request->namaKoleksi,
            'jenisKoleksi' => $request->jenisKoleksi,
            'jumlahKoleksi' => $request->jumlahKoleksi,
        ]);

        return redirect()->route('koleksi.daftarKoleksi.get');
    }
    public function getAllCollections()
    {
        $collections = DB::table('collections')
            ->select(
                'id as id',
                'namaKoleksi as judul',
                DB::raw('
                (CASE
                WHEN jenisKoleksi="1" THEN "Buku"
                WHEN jenisKoleksi="2" THEN "Majalah"
                WHEN jenisKoleksi="3" THEN "Cakram Digital"
                END) AS jenis
            '),
                'jumlahKoleksi as jumlah'
            )
            ->orderBy('namaKoleksi', 'asc')
            ->get();

        return Datatables::of($collections)
            ->addColumn('action', function ($collection) {
                $html = '
                <a href="' . url('koleksiView') . "/" . $collection->id . '">
                <i class="fas fa-edit"></i>
                </a>
            ';
                return $html;
            })
            ->make(true);
    }

    public function show(Collection $collection)
    {
        return view('koleksi.infoKoleksi', compact('collection'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'namaKoleksi' => ['required', 'string'],
            'jenisKoleksi' => ['required', 'integer'],
            'jumlahKoleksi' => ['required', 'integer']
        ]);

        $affected = DB::table('collections')
            ->where('id', $request->id)
            ->update([
                'namaKoleksi' => $request->namaKoleksi,
                'jenisKoleksi' => $request->jenisKoleksi,
                'jumlahKoleksi' => $request->jumlahKoleksi
            ]);

        return redirect()->route('koleksi.daftarKoleksi.get');
    }
}
