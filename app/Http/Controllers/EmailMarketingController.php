<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Mail\EmailMarketings;

use App\Models\EmailTemplate;
use App\Models\EmailMarketing;

use \Carbon\Carbon;
use \Carbon\CarbonPeriod;

use Mail;
use DataTables;
use Notification;
use Validator;
use DB;

class EmailMarketingController extends Controller
{
    function __construct(
        EmailTemplate $email_template,
        EmailMarketing $email_marketing
    ){
        $this->email_template = $email_template;
        $this->email_marketing = $email_marketing;
    }

    public function b_template_index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->email_template->all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<div class="btn-group">';
                        $btn .= '<a href='.route('emails.b_template.edit',['id' => $row->id]).' class="btn btn-xs btn-warning"><i class="uil-edit"></i> Edit</a>';
                        // $btn .= '<a href='.route('b.transaction.invoice',['id' => $row->id]).' target="_blank" class="btn btn-xs btn-primary"><i class="uil-file-alt"></i> Invoice</a>';
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('backend.emails.template.index');
    }

    public function b_template_create()
    {
        return view('backend.emails.template.create');
    }

    public function b_template_simpan(Request $request)
    {
        $rules = [
            'title'  => 'required',
            'description'  => 'required',
        ];

        $messages = [
            'title.required'   => 'Judul wajib diisi.',
            'description.required'   => 'Deskripsi Dibuat wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->passes()) {
            $input['id'] = Str::uuid()->toString();
            $input['title'] = $request->title;
            $input['descriptions'] = $request->description;
            $input['status'] = 'Aktif';
            $email_template = $this->email_template->create($input);
            if ($email_template) {
                $message_title="Berhasil !";
                $message_content=$input['title']." Berhasil Dibuat";
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

    public function b_template_edit($id)
    {
        $data['email_template'] = $this->email_template->find($id);
        if (empty($data['email_template'])) {
            return redirect()->back()->with('error','Data Tidak Ditemukan');
        }
        return view('backend.emails.template.edit',$data);
    }

    public function b_template_update(Request $request,$id)
    {
        $rules = [
            'title'  => 'required',
            'description'  => 'required',
        ];

        $messages = [
            'title.required'   => 'Judul wajib diisi.',
            'description.required'   => 'Deskripsi Dibuat wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->passes()) {
            $input['title'] = $request->title;
            $input['descriptions'] = $request->description;
            $input['status'] = 'Aktif';
            $email_template = $this->email_template->find($id)->update($input);
            if ($email_template) {
                $message_title="Berhasil !";
                $message_content=$input['title']." Berhasil Diupdate";
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

    public function b_template_detail($id)
    {
        $email_template = $this->email_template->where('id',$id)->where('status','aktif')->first();
        if (empty($email_template)) {
            return response()->json([
                'success' => false,
                'message_title' => 'Gagal',
                'message_content' => 'Email Template Tidak Ditemukan'
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $email_template
        ]);
    }

    public function b_email_index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->email_marketing->all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<div class="btn-group">';
                        // $btn .= '<a href='.route('emails.b_template.edit',['id' => $row->id]).' class="btn btn-xs btn-warning"><i class="uil-edit"></i> Edit</a>';
                        // $btn .= '<a href='.route('b.transaction.invoice',['id' => $row->id]).' target="_blank" class="btn btn-xs btn-primary"><i class="uil-file-alt"></i> Invoice</a>';
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('backend.emails.index');
    }

    public function b_email_create()
    {
        $data['email_templates'] = $this->email_template->where('status','aktif')->get();
        return view('backend.emails.create',$data);
    }

    public function b_email_simpan(Request $request)
    {
        $rules = [
            'subject'  => 'required',
            'to'  => 'required',
        ];

        $messages = [
            'subject.required'   => 'Subject wajib diisi.',
            'to.required'   => 'Email Pengirim wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->passes()) {
            $check_email_template = $this->email_template->find($request->email_template);
            $input['id'] = Str::uuid()->toString();
            $input['subject'] = $request->subject;
            $input['to'] = $request->to;
            $input['descriptions'] = $check_email_template->descriptions;
            $input['status'] = 'Aktif';
            $email_marketing = $this->email_marketing->create($input);
            if ($email_marketing) {
                Mail::mailer('marketing')->to($input['to'])
                                        ->send(new EmailMarketings([
                                            'subject' => $input['subject'],
                                            'data' => $input['descriptions']
                                        ]));
                $message_title="Berhasil !";
                $message_content="Email Berhasil Terkirim";
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
