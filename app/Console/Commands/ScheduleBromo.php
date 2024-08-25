<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use App\Models\BromoList;
use \Carbon\Carbon;

class ScheduleBromo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:schedule_bromo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Buat Jadwal Bromo Otomatis';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return 0;
        $live_date = Carbon::now()->addDays(0)->format('Y-m-d');
        // $cek_paket_bromos = \App\Models\Bromo::where('tanggal','LIKE','%'.$live_date.'%')->get();
        // foreach ($cek_paket_bromos as $key => $cek_paket_bromo) {
        //     $explode_tanggal = explode(' ',$cek_paket_bromo->tanggal);
        //     $cek_paket_bromo->create([
        //         'id' => Str::uuid()->toString(),
        //         'tanggal' => Carbon::now()->addWeek()->format('Y-m-d').' '.$explode_tanggal[1],
        //         'slug' => $cek_paket_bromo->slug,
        //         'title' => $cek_paket_bromo->title,
        //         'meeting_point' => $cek_paket_bromo->meeting_point,
        //         'category_trip' => $cek_paket_bromo->category_trip,
        //         'quota' => $cek_paket_bromo->quota,
        //         'max_quota' => $cek_paket_bromo->max_quota,
        //         'destination' => $cek_paket_bromo->destination,
        //         'include' => $cek_paket_bromo->include,
        //         'exclude' => $cek_paket_bromo->exclude,
        //         'price' => $cek_paket_bromo->price,
        //         'discount' => $cek_paket_bromo->discount,
        //         'images' => '-',
        //     ]);
        //     \Log::info("Paket Bromo ".$cek_paket_bromo->title.' Tanggal '.$live_date.' '.$explode_tanggal[1].' Berhasil Dibuat. '. date('Y-m-d H:i:s'));
        // }

        $cek_paket_bromos = \App\Models\BromoList::where('departure_date','LIKE','%'.$live_date.'%')->get();
        foreach ($cek_paket_bromos as $key => $cek_paket_bromo) {
            if ($cek_paket_bromo->bromo->category_trip == 'Private') {
                $quota = 150;
                $max_quota = 5;
            }else if($cek_paket_bromo->bromo->category_trip == 'Publik'){
                $quota = 50;
                $max_quota = 0;
            }

            $explode_tanggal = explode(' ',$cek_paket_bromo->departure_date);
            $cek_paket_bromo->create([
                'id' => Str::uuid()->toString(),
                'bromo_id' => $cek_paket_bromo->bromo_id,
                'departure_date' => Carbon::now()->addWeek()->format('Y-m-d').' '.$explode_tanggal[1],
                'quota' => $quota,
                'max_quota' => $max_quota,
                'discount' => 0,
                'price' => $cek_paket_bromo->price
            ]);
            \Log::info("Paket Bromo ".$cek_paket_bromo->bromo->title.' Tanggal '.$live_date.' '.$explode_tanggal[1].' Berhasil Dibuat. '. date('Y-m-d H:i:s'));
        }
        // \Log::info("Cron job Berhasil di jalankan " . date('Y-m-d H:i:s'));

    }
}
