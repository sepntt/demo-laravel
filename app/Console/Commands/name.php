<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use Mail;

class name extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        // var_dump(ini_get('open_basedir'));
        // excel
        // $spreadsheet = new Spreadsheet();
        // $sheet = $spreadsheet->getActiveSheet();
        // $sheet->setCellValue('A1', 'Hello World !');

        // $writer = new Xlsx($spreadsheet);
        // $writer->save('hello world.xlsx');

        //发送邮件
        Mail::raw('Test Content', function ($message) {
                $message->to('dawei@social-touch.com');
                // ->cc()//抄送
                // ->bcc()//秘密抄送
                $message->subject('Test Title');//标题
            });
        //
    }
}
