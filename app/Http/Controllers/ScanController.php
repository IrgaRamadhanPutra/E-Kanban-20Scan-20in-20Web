<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ScanController extends Controller
{
    public function index()
    {
        return view('pokayoke.ADM.scan.inputdata');
    }

    public function validasi(Request $request)
    {
        //cek data
        // $dn_no = $request->dn_no;
        // $job_no = $request->dn_no;

        $part_no = DB::connection('db_tbs')->table('gohin_adm')
            ->where('dn_no', $request->dn_no)
            ->where('job_no', $request->job_no)
            ->select('dn_no', 'job_no', 'part_no')
            ->first();
        // dd($part_no);
        $data  = [
            empty($part_no) ? '-' : $part_no,

        ];

        // dd($data);
        return response()->json($data);
    }
    public static function getEkanbanAdmoutSp1(Request $request)
    {
        // dd($request);
        // $value = $request->name;
        // dd($value);
        $dn_no = $request->dn_no;
        $job_no = $request->job_no;
        $input2 = $request->input2;
        $price = explode(",", $input2);
        // dd($price);
        $kanban_no = $price[0];
        $squence = $price[1];
        $part_no = $price[2];
        $itemcode = $price[3];
        $qty = $price[4];
        $AO1 = $price[5];
        $user = '';
        $str_date = '';
        $kosong = '';
        $date =  Carbon::now()->format('d');
        $value = [
            $kanban_no, $dn_no, $squence, $user, $qty, $itemcode, $str_date, $date, $kosong, $part_no, $AO1, $job_no

        ];
        // dd($value);
        // dd($squence);
        // $value = ['AS.0101', 'DN4122120702006A', '51541', 'adm2', '12', '1.A01.20.004.2', 'qty_27', '27', '', '53213-BZ090-00', 'A01', 'NT-0181'];
        // $value = [
        //     $request->kanban_no, $request->dn_no, $request->sequence, $request->user, $request->qty, $request->item_code, $request->str_date, $request->date, $request->part_no, $request->A01,
        //     $request->job_no
        // ];

        // DB::select("call ekanban_admout_sp_1(?,?,?,?,?,?,?,?,?,?,?,?)$value");
        // echo 'sukses';
        // $query = DB::connection('ekanban')
        // DB::select("CALL ekanban_admout_sp_1 ?,?,?,?,?,?,?,?,?,?,?,? ", $value);
        $query = DB::connection('ekanban')
            ->select("call ekanban_admout_sp_1(?,?,?,?,?,?,?,?,?,?,?,?)", $value);
        // dd($query);
        $ambildata = $query[0]->retval;
        // dd($ambildata);
        return response()->json($ambildata);

        // $query = DB::connection('ekanban')
        // ->select("call ekanban_admout_sp_1(?,?,?,?,?,?,?,?,?,?,?,?)"
    }
    // public function cekdata(Request $request)
    // {
    //     // dd($request);
    //     //cek data
    //     $input1 = DB::connection('db_tbs')->table('gohin_adm')
    //         ->where('part_no', $request->part_no)
    //         ->select('part_no')
    //         ->first();
    //     // dd($input1);
    //     //jika data tidak ada
    //     $cek  = empty($input1->part_no) ? '-' : $input1->part_no;
    //     // dd($data);
    //     if ($cek == null) {
    //         return response()->json([
    //             "status_eror" => "gagal validasi"
    //         ]);
    //         return false;
    //     }
    //     //jika data behasil
    //     return response()->json([
    //         "berhasil" => "berhasil validasi"
    //     ]);
    //     // return response()->json($cek);
    // }
    // public function getdata(Request $request)
    // {
    // }
    // public function cek(Request $request)
    // {
    //     DB::select('call myStoredProcedure ("A01", "A02", "AO3", "A04", "A05, "A06")');
    //     [
    //         'A01' => 'Tidak ada periode yang aktif',
    //         'A02' => 'Kanban sudah di scan',
    //         'A03' => 'Berhasil submit',
    //         'A04' => 'Data excel belum di uplod ',
    //         'A05' => 'Quantity Scan sudah melebihi quantity pengiriman',
    //         'A06' => 'Kanban belum di scan in',
    //     ];
    // }

    // public static function getEkanbanAdmoutSp1($kanban_no, $dn_no, $seqkanban, $user, $quantity, $itemcode, $strtgl, $tgl, $part_no, $job_no)
    // {
    //     $query = DB::connection('ekanban')
    //         ->select("call ekanban_admout_sp_1(?,?,?,?,?,?,?,?,?,?,?,?)", [
    //             $kanban_no,
    //             $dn_no,
    //             $seqkanban,
    //             $user,
    //             $quantity,
    //             $itemcode,
    //             $strtgl,
    //             $tgl,
    //             '',
    //             $part_no,
    //             'A01',
    //             $job_no
    //         ]);
    //     dd($query);
    //     if ($query == null) {
    //         return response()->json([
    //             "status_eror" => "gagal validasi"
    //         ]);
    //         return false;
    //     }
    //     //jika data behasil
    //     return response()->json([
    //         'A01' => 'Tidak ada periode yang aktif',
    //         'A02' => 'Kanban sudah di scan',
    //         'A03' => 'Berhasil submit',
    //         'A04' => 'Data excel belum di uplod ',
    //         'A05' => 'Quantity Scan sudah melebihi quantity pengiriman',
    //         'A06' => 'Kanban belum di scan in',
    //     ]);
    // return response()->json(['query' => $query], 200);
    // }
    // public static function getEkanbanAdmoutSp1($kanban_no,$dn_no, $seqkanban,$user,$quantity,$itemcode, $strtgl,$tgl,'',$part_no,
    // 'A01',  $job_no)
    // {
    //     $query = DB::connection('ekanban')
    //         ->select("call ekanban_admout_sp_1(?,?,?,?,?,?,?,?,?,?,?,?)", [
    //             $kanban_no,
    //             $dn_no,
    //             $seqkanban,
    //             $user,
    //             $quantity,
    //             $itemcode,
    //             $strtgl,
    //             $tgl,
    //             '',
    //             $part_no,
    //             'A01',
    //             $job_no
    //         ]);
    //         return response()->json(['query' => $query], 200);
    // }
}
