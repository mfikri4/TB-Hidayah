<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\Items;
use App\Exports\ItemsExport;
use App\Exports\TransactionExport;
use App\Exports\TenTransactionExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function register()
    {
        return view('admin.register');
    }
        public function tes()
    {
        return view('admin.tes');
    }

    public function postRegister(Request $request)
    {
        $request->validate(User::$rules);
        $requests = $request->all();
        $requests['password']    = Hash::make($request->password);
        
        $user = User::create($requests);
        if($user){
            return redirect('register')->with('status', 'Berhasil mendaftar !');
        }

        return redirect('register')->with('status', 'Gagal Register Account !');
    }

    public function login()
    {
        return view('admin.login');

    }

    public function postLogin(Request $request)
    {
        $requests   = $request->all();
        $data       = User::where('email', $request['email'])->first();
        $cek        = Hash::check($requests['password'], $data->password);
        if($cek){
            Session::put('admin', $data->email);
            Session::put('admin_id', $data->id);
            return redirect('admin');
        }
        
            return redirect('login')->with('status', 'Gagal Login Admin !');
    }

    public function logout()
    {
        Session::flush();
        return redirect('login')->with('status', 'Berhasil logout !');
    }

    public function index(Request $request)
    {        
        $pagination     = 2;
        $c_cart         = Cart::count();
        $c_item_sold    = Items::get()->sum('qty_sold');
        $c_modal        = Transaction::get()->sum('total_untung');
        $c_laba         = Transaction::get()->sum('total_bayar');
        $c_item         = Items::get()->count('name');
        $data           = Items::join('unit', 'unit.id', '=', 'items.unit_id')
                ->leftjoin('category','category.id','=', 'items.category_id')
                ->select('items.*', 'unit.name_unit', 'category.name_category')
                ->orderBy('items.qty_stock', 'ASC')
                ->paginate(5);

        $d_chart1 = [
        'chart_title'           => 'Laba Harian',
        'report_type'           => 'group_by_date',
        'model'                 => 'App\Models\Transaction',
        'group_by_field'        => 'created_at',
        'group_by_period'       => 'day',
        'aggregate_function'    => 'sum',
        'filter_days'           => 7, 
        'aggregate_field'       => 'total_bayar',
        'chart_type'            => 'line',
        'chart_color'           => '98,186,243',

        ];        
        $d_chart2 = [
        'chart_title'           => 'Pendapatan Harian',
        'report_type'           => 'group_by_date',
        'model'                 => 'App\Models\Transaction',
        'group_by_field'        => 'created_at',
        'group_by_period'       => 'day',
        'aggregate_function'    => 'sum',
        'filter_days'           => 7, 
        'aggregate_field'       => 'total_untung',
        'chart_type'            => 'line',
        'chart_color'           => '221,82,76',
        ];
        $chart1 = new LaravelChart($d_chart1,$d_chart2);

        $w_chart1 = [
        'chart_title'           => 'Laba Mingguan',
        'report_type'           => 'group_by_date',
        'model'                 => 'App\Models\Transaction',
        'group_by_field'        => 'created_at',
        'group_by_period'       => 'week',
        'aggregate_function'    => 'sum',
        'filter_days'           => 7, 
        'aggregate_field'       => 'total_bayar',
        'chart_type'            => 'line',
        'chart_color'           => '98,186,243',
        ];
        $w_chart2 = [
        'chart_title'           => 'Pendapatan Mingguan',
        'report_type'           => 'group_by_date',
        'model'                 => 'App\Models\Transaction',
        'group_by_field'        => 'created_at',
        'group_by_period'       => 'week',
        'aggregate_function'    => 'sum',
        'filter_days'           => 7, 
        'aggregate_field'       => 'total_untung',
        'chart_type'            => 'line',
        'chart_color'           => '221,82,76',
        ];
        $chart2 = new LaravelChart($w_chart1,$w_chart2);

        $m_chart1 = [
        'chart_title'           => 'Laba Bulanan',
        'report_type'           => 'group_by_date',
        'model'                 => 'App\Models\Transaction',
        'group_by_field'        => 'created_at',
        'group_by_period'       => 'month',
        'aggregate_function'    => 'sum',
        'aggregate_field'       => 'total_bayar',
        'chart_type'            => 'line',
        'chart_color'           => '98,186,243',
        ];        
        $m_chart2 = [
        'chart_title'           => 'Pendapatan Bulanan',
        'report_type'           => 'group_by_date',
        'model'                 => 'App\Models\Transaction',
        'group_by_field'        => 'created_at',
        'group_by_period'       => 'month',
        'aggregate_function'    => 'sum',
        'aggregate_field'       => 'total_untung',
        'chart_type'            => 'line',
        'chart_color'           => '221,82,76',
        ];
        $chart3 = new LaravelChart($m_chart1, $m_chart2);
        return view('admin.dashboard', compact('data','c_cart','c_item_sold','c_item','c_modal','c_laba', 'chart1', 'chart2', 'chart3'))->with('i', ($request->input('page', 1) - 1) * $pagination);
    }
    public function export_items()
	{
		return Excel::download(new ItemsExport, 'barang.xlsx');
	}

    public function export_excel()
	{
		return Excel::download(new TransactionExport, 'transaksi.xlsx');
	}

    public function export_excel_ten()
	{
		return Excel::download(new TenTransactionExport, 'transaksi-10.xlsx');
	}

    public function all(Request $request)
    {
        
        $pagination     = 2;
        $data           = User::join('level_akses', 'level_akses.id', '=', 'users.level','LEFT')
        ->select('users.*', 'level_akses.name_level')
        ->sortable()
        ->get();
        return view('admin.user.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    public function add()
    {
        return view('admin.user.create');
    }

    public function tambah(Request $request)
    {
        $request->validate(User::$rules);
        $requests = $request->all();
        $requests['password']    = Hash::make($request->password);
        
        $user = User::create($requests);
        if($user){
            return redirect('user')->with('status', 'Berhasil mendaftar !');
        }

        return redirect('user')->with('status', 'Gagal Register Account !');
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.user.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $d = User::find($id);
        if ($d == null){
            return redirect('admin/user/'. $id)->with('status', 'Data tidak Ditemukan !');
        }

        $req = $request->all();

        $data = User::find($id)->update($req);
        if($data){
            return redirect('admin/user/'. $id)->with('status', 'Data pengguna Berhasil diedit !');
        }

        return redirect('admin/user/'. $id)->with('status', 'Gagal edit data pengguna!');
        
    }

    public function delete($id)
    {
        $data = User::find($id);
        if ($data == null) {
            return redirect('user')->with('status', 'Data tidak ditemukan !');
        }
        
        $delete = $data->delete();
        if ($delete) {
            return redirect('user')->with('status', 'Berhasil hapus Data Pengguna !');
        }
        return redirect('user')->with('status', 'Gagal hapus Data Pengguna !');
    }
}
