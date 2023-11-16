<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\DetailTransaction;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreDetailTransactionRequest;
use App\Http\Requests\UpdateDetailTransactionRequest;

class DetailTransactionController extends Controller
{
    public function show($detailTransactionId)
    {
        $detailTransaction = DB::table('detail_transactions as dt')
            ->select(
                't.id as idTransaksi',
                'dt.id as idDetail',
                'dt.tanggalKembali as tanggalKembali',
                't.tanggalPinjam as tanggalPinjam',
                'dt.status as status',
                'uPinjam.fullname as peminjam',
                'uTugas.fullname as petugas',
                'c.namaKoleksi as koleksi',
            )
            ->join('collections as c', 'c.id', '=', 'dt.collectionId')
            ->join('transactions as t', 't.id', '=', 'dt.transactionId')
            ->join('users as uPinjam', 't.userIdPeminjam', '=', 'uPinjam.id')
            ->join('users as uTugas', 't.userIdPetugas', '=', 'uTugas.id')
            ->where('dt.id', '=', $detailTransactionId)->first();

        return view('detailTransaction.detailView', compact('detailTransaction'));
    }

    public function update(Request $request)
    {
        if ($request->status == 1) {

        } else {
            $affected = DB::table('detail_transactions')
                ->where('id', $request->id)
                ->update([
                    'status' => $request->status,
                    'tanggalKembali' => Carbon::now()->toDateString()
                ]);

            if ($request->status == 2) {
                DB::table('collections')->increment('jumlahKoleksi');
            } else {

            }

            return redirect('transaksiView/' . $request->idTransaksi);
        }
    }
}
