<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Member;
use App\Models\Pembelian;
use App\Models\Pengeluaran;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $total_penjualan_today = Penjualan::whereDate('updated_at', Carbon::today())->sum('bayar');
        $total_penjualan = Penjualan::sum('bayar');
        $total_pengeluaran = Pengeluaran::sum('nominal');
        $pendapatan = $total_penjualan - $total_pengeluaran;


        $keuntungan = $total_penjualan_today;

        $total_keuntungan = $pendapatan;
        $totOmset = $total_penjualan;
        $pengeluaran = $total_pengeluaran;

        $tanggal_awal = date('Y-m-01');
        $tanggal_akhir = date('Y-m-d');

        $data_tanggal = array();
        $data_pendapatan = array();

        while (strtotime($tanggal_awal) <= strtotime($tanggal_akhir)) {
            $data_tanggal[] = (int) substr($tanggal_awal, 8, 2);

            $total_penjualan_grafik = Penjualan::where('created_at', 'LIKE', "%$tanggal_awal%")->sum('bayar');
            $total_pembelian_grafik = Pembelian::where('created_at', 'LIKE', "%$tanggal_awal%")->sum('bayar');
            $total_pengeluaran_grafik = Pengeluaran::where('created_at', 'LIKE', "%$tanggal_awal%")->sum('nominal');

            $pendapatan_grafik = $total_penjualan_grafik - $total_pembelian_grafik - $total_pengeluaran_grafik;

            $data_pendapatan[] += $pendapatan_grafik;

            $tanggal_awal = date('Y-m-d', strtotime("+1 day", strtotime($tanggal_awal)));
        }

        if (auth()->user()->level == 1) {
            return view('admin.dashboard', compact('keuntungan', 'total_keuntungan', 'totOmset', 'pengeluaran', 'tanggal_awal', 'tanggal_akhir', 'data_tanggal', 'data_pendapatan'));
        } else {
            return view('kasir.dashboard');
        }
    }
}
