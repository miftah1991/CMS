<?php

namespace App\Console\Commands;

use App\Providers\RouteServiceProvider;

use Illuminate\Console\Command;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\Mail;

use App\User;
use App\AnouceProject;
use App\AounceProjectMemberList;
use App\Evaluation;
use App\RegisterProcurement;
use jDateTime;

use DateTime;
use Illuminate\Support\Facades\DB;
class Email extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Email:Min';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email Automaticllay';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $var =str_random(20);
         $name='ضیاالرحمن';
         $details = [
             'title' => 'خبرتیا',
             'Pro_Name'=>'هرات ترانسپر مر کیلووات',
             'body' => 'محترما تاسو په پورتنی پروژه کی د افر کشایی لپاره هیت یی له تاسو څخه هیله کی چي په ذکر شوی وخت د تدارکارت ریاست ته حاضر شی تاسو د پخوا کړنو منندوی یو ',
              'token'=> 'http://10.10.26.241:81/CMS/api/insert_email_code/'.$var.'/'.$name,
         ];

         \Mail::to('zia.f@dabs.af')->send(new \App\Mail\SendMail($details));
        \Mail::cc('ziaurrahmanfaroqi002@gmail.com')->send(new \App\Mail\SendMail($details));






}


















}
