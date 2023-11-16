<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Collection;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\DetailTransaction;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = DB::table('transactions as t')
            ->select(
                't.id as id',
                'u.fullname as peminjam',
                'u2.username as petugas',
                't.tanggalPinjam as tanggalPinjam',
                't.tanggalSelesai as tanggalSelesai',
            )
            ->join('users as u', 't.userIdPeminjam', '=', 'u.id')
            ->join('users as u2', 't.userIdPetugas', '=', 'u2.id')
            ->orderBy('t.id', 'asc')
            ->get();
        return view('transaction.daftarTransaksi', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::pluck('fullname', 'id');
        $collections = Collection::where('jumlahKoleksi', '>', 0)->get();
        return view('transaction.transaksiTambah', compact('users', 'collections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'userIdPeminjam' => 'required',
            'koleksi1' => 'required',
        ]);

        $transaction = new Transaction;
        $transaction->userIdPeminjam = $request->userIdPeminjam;
        $transaction->userIdPetugas = auth()->user()->id;
        $transaction->tanggalPinjam = Carbon::now()->toDateString();
        $transaction->save();

        $lastTransactionStored = $transaction->id;

        $detailTransaction = new DetailTransaction;
        $detailTransaction->transactionId = $lastTransactionStored;
        $detailTransaction->collectionId = $request->koleksi1;
        $detailTransaction->status = 1;
        $detailTransaction->save();

        DB::table('collections')->where('id', $request->koleksi1)->decrement('jumlahKoleksi');

        if ($request->koleksi2 > 0) {
            $detailTransaction2 = new DetailTransaction;
            $detailTransaction2->transactionId = $lastTransactionStored;
            $detailTransaction2->collectionId = $request->koleksi2;
            $detailTransaction2->status = 1;
            $detailTransaction2->save();

            DB::table('collections')->where('id', $request->koleksi2)->decrement('jumlahKoleksi');
        }

        if ($request->koleksi3 > 0) {
            $detailTransaction3 = new DetailTransaction;
            $detailTransaction3->transactionId = $lastTransactionStored;
            $detailTransaction3->collectionId = $request->koleksi3;
            $detailTransaction3->status = 1;
            $detailTransaction3->save();

            DB::table('collections')->where('id', $request->koleksi3)->decrement('jumlahKoleksi');
        }

        return redirect()->route('transaksi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        $transactions = DB::table('transactions')
            ->select(
                'transactions.id as id',
                'u.fullname as peminjam',
                'u2.username as petugas',
                'transactions.tanggalPinjam as tanggalPinjam',
                'transactions.tanggalSelesai as tanggalSelesai',
            )
            ->join('users as u', 'transactions.userIdPeminjam', '=', 'u.id')
            ->join('users as u2', 'transactions.userIdPetugas', '=', 'u2.id')
            ->where('transactions.id', '=', $transaction->id)
            ->orderBy('transactions.id', 'asc')
            ->first();

        $detailTransactions = DB::table('detail_transactions as dt')
            ->select(
                'dt.id as id',
                'dt.tanggalKembali as tanggalKembali',
                't.tanggalPinjam as tanggalPinjam',
                'dt.status as status',
                'c.namaKoleksi as koleksi',
            )
            ->join('collections as c', 'c.id', '=', 'dt.collectionId')
            ->join('transactions as t', 't.id', '=', 'dt.transactionId')
            ->where('dt.transactionId', '=', $transaction->id)
            ->get();

        $collections = Collection::all();
        return view('transaction.transaksiView', compact('transactions', 'detailTransactions'));
    }
}
