<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Ekanban_Fgin_tbl;
use App\Models\Ekanban_param_tbl;
use App\Models\Ekanban_paramblob_tbl;
use Carbon\Doctrine\CarbonImmutableType;
// use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Exception;
// use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Validator;


class ScanInController extends Controller
{
    //
    public function index()
    {
        return view('pokayoke.SCAN-IN.index');
    }
    public function valiadasi_param1(Request $request)
    {
        // dd($request);
        // $kanban = DB::connection('db_tbs')->table('ekanban_fgin_tbl')
        $data = DB::connection('ekanban')->table('ekanban_param_tbl')
            ->where('ekanban_no', $request->val1)
            ->select('ekanban_no')
            ->get();
        // dd($data);

        // dd($data1);
        return response()->json($data);
    }
    public function valiadasi_param2(Request $request)
    {
        // dd($request);
        // $kanban = DB::connection('db_tbs')->table('ekanban_fgin_tbl')
        $data = DB::connection('ekanban')->table('ekanban_param_tbl')
            ->where('ekanban_no', $request->val2)
            ->select('ekanban_no')
            ->get();
        // dd($data);

        // dd($data1);
        return response()->json($data);
    }

    public function validasi_data1(Request $request)
    {
        // dd($request);
        // $kanban = DB::connection('db_tbs')->table('ekanban_fgin_tbl')
        $data = DB::connection('ekanban')->table('ekanban_fgin_tbl')
            ->where('kanban_no', $request->kanban_no)
            ->where('seq', $request->squence)
            ->get();
        // dd($data);
        return response()->json($data);
    }
    public function validasi_data3(Request $request)
    {
        // dd($request);
        // $data = Ekanban_param_tbl::
        $data = DB::connection('ekanban')->table('ekanban_param_tbl')
            ->where('item_code', $request->item_code)
            ->where('part_no', $request->part_no)
            ->select('id', 'item_code', 'part_no')
            ->first();
        // dd($data);
        return response()->json($data);
    }
    public function get_paramblob_image1(Request $request)
    {
        // dd($request);
        // $data = Ekanban_paramblob_tbl::
        $data = DB::connection('ekanban')->table('ekanban_paramblob_tbl')
            ->where('id_param', $request->id)
            ->select('img_blob')
            ->first();

        return response()->json($data);

        // dd($data);
    }
    public function validasi_data2(Request $request)
    {
        // dd($request);
        // $kanban = DB::connection('db_tbs')->table('ekanban_fgin_tbl')
        // $data = Ekanban_Fgin_tbl::where('kanban_no', $request->kanban_no)
        //     ->where('seq', $request->squence)
        //     ->get();
        $data = DB::connection('ekanban')->table('ekanban_fgin_tbl')
            ->where('kanban_no', $request->kanban_no)
            ->where('seq', $request->squence)
            ->get();
        // dd($data);
        return response()->json($data);
    }
    public function validasi_data4(Request $request)
    {
        // dd($request);
        // $data = Ekanban_param_tbl::
        $data = DB::connection('ekanban')->table('ekanban_param_tbl')
            ->where('item_code', $request->item_code)
            ->where('part_no', $request->part_no)
            ->select('id', 'item_code', 'part_no')
            ->first();
        // dd($data);
        return response()->json($data);
    }
    public function get_paramblob_image2(Request $request)
    {
        // dd($request);
        // $data = Ekanban_paramblob_tbl::
        $data = DB::connection('ekanban')->table('ekanban_paramblob_tbl')
            ->where('id_param', $request->id)
            ->select('img_blob')
            ->first();

        return response()->json($data);

        // dd($data);
    }
    public function AddScanIn(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kanban_no.*' => 'required',
            'sq.*' => 'required',
            'part_no.*' => 'required',
            'kode_item.*' => 'required',
            'qty.*' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ], 400);
        }
        date_default_timezone_set("Asia/Jakarta");
        $kanban_no = $request->kanban_no;
        $sq = $request->sq;
        $part_no = $request->part_no;
        $kode_item = $request->kode_item;
        $qty = $request->qty;
        $mp_name = DB::connection('ekanban')->table('ekanban_mperiode_tbl')
            ->where('status', 'ACTIVE')
            ->value('mpname');
        // dd($mp_name);
        // $mp_name = Carbon::now()->format('m-Y');
        $getSession = Auth::user()->user;
        $date = Carbon::now();
        // dd($date);
        $fg_trans = "1";
        $reset = "N";

        if (count($kanban_no) > 0) {
            foreach ($kanban_no as $item => $value) {
                $data = array(
                    'part_no' => $part_no[$item],
                    'item_code' => $kode_item[$item],
                    'kanban_no' => $value,
                    'seq' => $sq[$item],
                    'qty' => $qty[$item],
                    'mpname' => $mp_name,
                    'created_by' => $getSession,
                    'creation_date' => $date,
                    'fg_trans' => $fg_trans,
                    'reset' => $reset
                );
                // dd($data);
                DB::connection('ekanban')->table('ekanban_fgin_tbl')->insert($data);
            }
        }

        return response()->json([
            'status' => 'Successfully Add'
        ]);

        // dd($request);
        // $kanban_no = $request->kanban_no;
        // $sq = $request->sq;
        // $part_no = $request->part_no;
        // $kode_item = $request->kode_item;
        // $qty = $request->qty;
        // $mp_name = Carbon::now()->format('m-Y');
        // $getSession = Auth::user()->user;
        // $date = Carbon::now();
        // $fg_trans = "0";
        // $reset = "N";

        // if (count($request->input('kanban_no')) > 0) {
        //     foreach ($request->input('kanban_no') as $item => $value) {
        //         $data = array(
        //             'part_no' => $part_no[$item],
        //             'item_code' => $kode_item[$item],
        //             'kanban_no' => $kanban_no[$item],
        //             'seq' => $sq[$item],
        //             'qty' => $qty[$item],
        //             'mpname' => $mp_name,
        //             'created_by' => $getSession,
        //             'creation_date' => $date,
        //             'fg_trans' => $fg_trans,
        //             'reset' => $reset
        //         );
        //         // dd($data);
        //         // $get_data = Ekanban_Fgin_tbl::create($data);
        //         DB::connection('ekanban')->table('ekanban_fgin_tbl')->insert($data);
        //     }
        // }
        // return response()->json([
        //     'status' => 'Successfully Add'
        // ]);
    }
}
