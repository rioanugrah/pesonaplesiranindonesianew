<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\KategoriCorporate;
use App\Models\Cooperation;
use App\Models\Provinsi;

use \Carbon\Carbon;
use DataTables;
use Notification;
use Validator;
use DB;
use File;

class CooperationController extends Controller
{
    function __construct(
        KategoriCorporate $kategori_corporate,
        Cooperation $cooperation
    ){
        $this->kategori_corporate = $kategori_corporate;
        $this->cooperation = $cooperation;

        $this->middleware('permission:cooperation-kategori', ['only' => ['kategori_corporate_index']]);
        $this->middleware('permission:cooperation-kategori-create', ['only' => ['kategori_corporate_create','kategori_corporate_simpan']]);
        $this->middleware('permission:cooperation-kategori-edit', ['only' => ['kategori_corporate_edit','kategori_corporate_update']]);

        $this->middleware('permission:cooperation-data', ['only' => ['cooperation']]);
        $this->middleware('permission:cooperation-data-create', ['only' => ['cooperation_create','cooperation_simpan']]);
    }

    public function kategori_corporate_index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->kategori_corporate->all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function($row){
                        switch ($row->status) {
                            case 'Aktif':
                                return '<span class="badge bg-success">Aktif</span>';
                                break;

                            case 'Non Aktif':
                                return '<span class="badge bg-danger">Non Aktif</span>';
                                break;

                            default:
                                # code...
                                break;
                        }
                    })
                    ->addColumn('action', function($row){
                        $btn = '<div class="btn-group">';
                        if (auth()->user()->can('cooperation-kategori-edit') == true) {
                            $btn .= '<a href='.route('b.kategori_corporate.edit',['id' => $row->id]).' class="btn btn-xs btn-warning"><i class="uil-edit"></i> Edit</a>';
                        }
                        // $btn .= '<a href="javascript:void(0)" onclick="hapus(`'.$row->id.'`)" class="btn btn-xs btn-danger"><i class="uil-trash"></i> Delete</a>';
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
        }

        return view('backend.cooperation.kategori.index');
    }

    public function kategori_corporate_create()
    {
        return view('backend.cooperation.kategori.create');
    }

    public function kategori_corporate_simpan(Request $request)
    {
        $rules = [
            'nama_kategori'  => 'required',
            // 'deskripsi'  => 'required',
        ];

        $messages = [
            'nama_kategori.required'   => 'Nama Kategori wajib diisi.',
            // 'deskripsi.required'   => 'Deskripsi Dibuat wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->passes()) {
            $input['id'] = Str::uuid()->toString();
            $input['nama_kategori'] = $request->nama_kategori;
            // $input['deskripsi'] = $request->deskripsi;
            $input['status'] = $request->status;
            $email_template = $this->kategori_corporate->create($input);
            if ($email_template) {
                $message_title="Berhasil !";
                $message_content=$input['nama_kategori']." Berhasil Dibuat";
                $message_type="success";
                $message_succes = true;
            }
            $array_message = array(
                'success' => $message_succes,
                'message_title' => $message_title,
                'message_content' => $message_content,
                'message_type' => $message_type,
            );

            return $array_message;
        }
        return response()->json([
            'success' => false,
            'error' => $validator->errors()->all()
        ]);
    }

    public function kategori_corporate_detail($id)
    {
        $data = $this->kategori_corporate->find($id);
        if (empty($data)) {
            return response()->json([
                'success' => false,
                'error' => 'Data Tidak Ditemukan'
            ]);
        }
        return response()->json([
            'success' => true,
            'data' => $data->deskripsi
        ]);
    }

    public function kategori_corporate_edit($id)
    {
        $data['kategori_corporate'] = $this->kategori_corporate->find($id);
        if (empty($data['kategori_corporate'])) {
            return redirect()->back()->with('error','Data Tidak Ditemukan');
        }
        return view('backend.cooperation.kategori.edit',$data);
    }

    public function kategori_corporate_update(Request $request,$id)
    {
        $rules = [
            'nama_kategori'  => 'required',
            'deskripsi'  => 'required',
        ];

        $messages = [
            'nama_kategori.required'   => 'Nama Kategori wajib diisi.',
            'deskripsi.required'   => 'Deskripsi Dibuat wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->passes()) {
            $input['nama_kategori'] = $request->nama_kategori;
            $input['deskripsi'] = $request->deskripsi;
            $input['status'] = $request->status;
            $email_template = $this->kategori_corporate->find($id)->update($input);
            if ($email_template) {
                $message_title="Berhasil !";
                $message_content=$input['nama_kategori']." Berhasil Diupdate";
                $message_type="success";
                $message_succes = true;
            }
            $array_message = array(
                'success' => $message_succes,
                'message_title' => $message_title,
                'message_content' => $message_content,
                'message_type' => $message_type,
            );

            return $array_message;
        }
        return response()->json([
            'success' => false,
            'error' => $validator->errors()->all()
        ]);
    }

    public function cooperation(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->cooperation->all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('kategori_corporate_id', function($row){
                        return $row->kategori_corporate->nama_kategori;
                    })
                    ->addColumn('status', function($row){
                        switch ($row->status) {
                            case 'Waiting':
                                return '<span class="badge bg-warning">Menunggu Verifikasi</span>';
                                break;

                            case 'Approved':
                                return '<span class="badge bg-success">Approved</span>';
                                break;

                            default:
                                # code...
                                break;
                        }
                    })
                    ->addColumn('action', function($row){
                        $btn = '<div class="btn-group">';
                        // $btn .= '<a href='.route('b.kategori_corporate.edit',['id' => $row->id]).' class="btn btn-xs btn-warning"><i class="uil-edit"></i> Edit</a>';
                        // $btn .= '<a href="javascript:void(0)" onclick="hapus(`'.$row->id.'`)" class="btn btn-xs btn-danger"><i class="uil-trash"></i> Delete</a>';
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
        }

        return view('backend.cooperation.index');
    }

    public function cooperation_create()
    {
        $data['kategori_corporates'] = $this->kategori_corporate->where('status','Aktif')->get();
        $data['provinsis'] = Provinsi::all();
        return view('backend.cooperation.create',$data);
    }

    public function cooperation_simpan(Request $request)
    {
        $rules = [
            'nama'  => 'required',
            'email'  => 'required',
            'nama_usaha'  => 'required',
            'no_telp'  => 'required',
            'alamat_usaha'  => 'required',
            'provinsi_id'  => 'required',
            'kota_id'  => 'required',
            'kecamatan_id'  => 'required',
            'negara'  => 'required',
            'kategori_corporate_id'  => 'required',
        ];

        $messages = [
            'nama.required'   => 'Nama wajib diisi.',
            'email.required'   => 'Email wajib diisi.',
            'nama_usaha.required'   => 'Nama Usaha wajib diisi.',
            'no_telp.required'   => 'No. Telp wajib diisi.',
            'nama_usaha.required'   => 'Nama Usaha wajib diisi.',
            'provinsi_id.required'   => 'Provinsi wajib diisi.',
            'kota_id.required'   => 'Kota wajib diisi.',
            'kecamatan_id.required'   => 'Kecamatan wajib diisi.',
            'negara.required'   => 'Negara wajib diisi.',
            'kategori_corporate_id.required'   => 'Kategori wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->passes()) {
            $input = $request->all();
            $input['id'] = Str::uuid()->toString();
            $input['kode_corporate'] = 'C-'.Carbon::now()->format('Ymd').rand(100,999);
            $input['status'] = 'Waiting';
            $cooperation = $this->cooperation->create($input);
            if ($cooperation) {
                $message_title="Berhasil !";
                $message_content=$input['kode_corporate']." Berhasil Dibuat";
                $message_type="success";
                $message_succes = true;
            }
            $array_message = array(
                'success' => $message_succes,
                'message_title' => $message_title,
                'message_content' => $message_content,
                'message_type' => $message_type,
            );

            return $array_message;
        }
        return response()->json([
            'success' => false,
            'error' => $validator->errors()->all()
        ]);
    }
}