<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Slider;

use DataTables;
use Notification;
use Validator;
use DB;
use File;

class SliderController extends Controller
{
    function __construct(
        Slider $slider
    ){
        $this->slider = $slider;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->slider->all();
            return DataTables::of($data)
                            ->addIndexColumn()
                            ->addColumn('status', function($row){
                                switch ($row->status) {
                                    case 'Y':
                                        return '<span class="badge bg-success">Aktif</span>';
                                        break;
                                    case 'N':
                                        return '<span class="badge bg-danger">Tidak Aktif</span>';
                                        break;

                                    default:
                                        # code...
                                        break;
                                }
                            })
                            ->addColumn('images', function($row){
                                return '<img src='.asset('backend/images/slider/'.$row->images).' style="width: 200px;height: 150px;object-fit: cover;">';
                            })
                            ->addColumn('created_at', function($row){
                                return $row->created_at->isoFormat('LLLL');
                            })
                            ->addColumn('action', function($row){
                                $btn = '<div class="btn-group">';
                                // $btn .= '<button onclick="reupload(`'.$row->id.'`)" class="btn btn-info btn-xs"><i class="fas fa-file"></i> Re-upload</button>';
                                // $btn .= '<a href='.route('tour.edit',['id' => $row->id]).' class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>';
                                // $btn .= '<button onclick="hapus(`'.$row->id.'`)" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>';
                                $btn .= '</div>';
                                return $btn;
                            })
                            ->rawColumns(['action','status','images'])
                            ->make(true);
        }

        return view('backend.slider.index');
    }

    public function create()
    {
        return view('backend.slider.create');
    }

    public function simpan(Request $request)
    {
        $rules = [
            'title'  => 'required',
            'upload_file'  => 'required',
            'status'  => 'required',
        ];

        $messages = [
            'title.required'   => 'Judul wajib diisi.',
            'upload_file.required'   => 'Upload File Kuota wajib diisi.',
            'status.required'   => 'Status wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()){
            $path = public_path('backend/images/slider');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            $input['slug'] = Str::slug($request->title);
            $input['title'] = $request->title;
            $input['status'] = $request->status;

            if ($request->file('upload_file')) {
                $image_upload_file = $request->file('upload_file');
                $img_upload_file = \Image::make($image_upload_file->path());
                $img_upload_file = $img_upload_file->encode('webp',65);
                $input['images'] = 'Slider'.time().'.webp';
                $img_upload_file->save(public_path('backend/images/slider/').$input['images']);
            }

            $slider = $this->slider->create($input);

            if ($slider) {
                $message_title="Berhasil !";
                $message_content="Slider ".$request->title." Berhasil Dibuat";
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
