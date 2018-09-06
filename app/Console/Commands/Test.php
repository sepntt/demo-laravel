<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use DB;
use Mail;

use Maatwebsite\Excel\Facades\Excel;;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;//对象转数组
use Maatwebsite\Excel\Concerns\WithHeadings;//表格头部

ini_set('memory_limit','1024M');

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '工具脚本';

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
     * 退出提示|判断
     * @var string
     */
    public $msg_quit = 'End of this command';
    /**
     * 默认发送邮箱
     * @var string
     */
    public $default_mail = 'septnn@163.com';
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $all_functions = get_class_methods($this);
        $all_functions = array_values(array_filter(get_class_methods($this), function ($value) {
            return ((strpos($value, 'sq_') === false)?false:true);
        }));
        $all_functions[999] = '_quit';//结束方法,默认使用
        $function = $this->choice('选择执行的方法，默认使用:', $all_functions, 999, 5);
        $this->info('当前选择:['.$function.']');
        if (method_exists($this, $function)) {
            $this->$function();
        } else {
            $this->_quit('没有此方法!');
        }
    }
    /**
     * 获取db配置
     */
    public function getDbConfig($type = 'default')
    {
        $db_config = [
            'default' => [
                'driver' => 'mysql',
                'host' => env('DB_HOST', '127.0.0.1'),
                'port' => env('DB_PORT', '3306'),
                'database' => env('DB_DATABASE', 'la'),
                'username' => env('DB_USERNAME', 'root'),
                'password' => env('DB_PASSWORD', '123456'),
                'unix_socket' => env('DB_SOCKET', ''),
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_general_ci',
                'prefix' => '',
                'strict' => true,
                'engine' => null,
            ],
            'test' => [//线上数据库
                'host' => '127.0.0.1',
                'database' => 'la',
                'username' => 'root',
                'password' => '123456',
            ],
        ];
        return isset($db_config[$type])?$db_config[$type]:$db_config['default'];
    }
    /**
     * 获取db
     * @return [type] [description]
     */
    public function getDb($db_config)
    {
        $db_config = array_merge($this->getDbConfig('default'), $db_config);
        app('config')->set('database.connections.mysql2', $db_config);
        return DB::connection('mysql2');
    }

    

    /**
     * 生成excel导出对象
     * @param  [type] $db            [description]
     * @param  [type] $cb_query [description]
     * @param  array  $cb_map        [description]
     * @param  array  $cb_headings   [description]
     * @return [type]                [description]
     */
    public function _exportExcelObj($db, $cb_query, $cb_map = [], $cb_headings = [])
    {

        return new class ($db, $cb_query, $cb_map, $cb_headings)implements FromQuery, WithMapping, WithHeadings{
            private $db;
            public function __construct($db, $cb_query, $cb_map, $cb_headings)
            {
                $this->db = $db;
                $this->cb_query = $cb_query;
                $this->cb_map = $cb_map;
                $this->cb_headings = $cb_headings;
            }
            /**
             * 数据获取
             * @return [type] [description]
             */
            public function query(){
                $cb_query = $this->cb_query;
                return $cb_query($this->db);
            }
            /**
             * 数据格式化
             * @param  [type] $data [description]
             * @return [type]       [description]
             */
            public function map($data): array
            {
                $cb_map = $this->cb_map;
                return $cb_map($data);
                
            }
            /**
             * excel头列
             * @return [type] [description]
             */
            public function headings(): array
            {
                $cb_headings = $this->cb_headings;
                return $cb_headings();
            }
        };
    }
    /**
     * 确认
     * @param  [type] $msg [description]
     * @return [type]      [description]
     */
    public function _confirm($msg)
    {
        if (!$this->confirm($msg)) {
            $this->_quit();
        }
        return ;
    }
    /**
     * 退出脚本，不再执行
     * @param  boolean $msg 退出自定义消息
     * @return [type]       [description]
     */
    public function _quit($msg = false)
    {
        $msg = $msg?$this->msg_quit.' : '.$msg:$this->msg_quit;
        $this->info($msg);
        exit;
    }

    public function sendMail($mail_config = [], $filename = '')
    {
        if(empty($mail_config)) {
            $this->info('没有邮件配置。');
        } else {
            //发送邮件
            Mail::raw($mail_config['raw'], function ($message) use($filename, $mail_config) {
                    $message->attach($filename);
                    $message->to($mail_config['to']);
                    // ->cc()//抄送
                    // ->bcc()//秘密抄送
                    $message->subject($mail_config['subject']);
                });
            $this->info('邮件发送成功!收件人:['.implode(',', $mail_config['to']).']');
        }
        
    }
/*------------------------------------- 业务代码 vvv ----------------------------------------------------*/



    /**
     * 数据导出
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function sq_数据导出()
    {
        $this->_confirm('此脚本是导出数据，确认导出？');
        $bar = $this->output->createProgressBar(6);
        //配置，文件名
        $filename = date('Y-m-d').'-数据.xlsx';
        $mail_config = [
            'to' => ['septnn@163.com'],//邮件收件人
            'subject' => '数据',//邮件标题
            'raw' => '数据见附件。',//邮件内容，文本
        ];
        //初始化db
        $db = $this->getDb($this->getDbConfig('test'));
        $bar->advance();
        //生成导出对象
        $cb_query = function($db) {
            return $db->table('test')->orderBy('id', 'desc');
        };
        $cb_map = function($data) {
            $name = (strpos($data->name, '=') === 0)?"'".$data->name:$data->name;
            return [
                $data->id,
                $name,
            ];
        };
        $cb_headings = function() {
            return [
                    'ID',
                    '姓名',
                ];
        };
        $export = $this->_exportExcelObj($db, $cb_query, $cb_map, $cb_headings);
        $bar->advance();

        //文件路径，看了源码，使用的是此配置
        $path = app('config')->get('filesystems.disks.local.root').'/';
        //导出文件到服务器本地
        if(Excel::store($export, $filename)) {
            $bar->advance();
            //文件全路径
            $filename = $path.$filename;
            $this->info('文件导出成功!文件名:['.$filename.']');
            $this->sendMail($mail_config, $filename);
        } else {
            $this->error('导出失败!');
        }
        $bar->finish();
        $this->_quit();
    }

    /**
     * 导出
     */
    public function sq_导出()
    {
        $this->_confirm('此脚本是导出数据，确认导出？');
        $bar = $this->output->createProgressBar(3);
        //配置，文件名
        $filename = date('Y-m-d').'-数据.csv';
        $mail_config = [
            'to' => ['septnn@163.com'],//邮件收件人
            'subject' => '数据',//邮件标题
            'raw' => '数据见附件。',//邮件内容，文本
        ];
        //初始化db
        $db = $this->getDb($this->getDbConfig('test'));
        $bar->advance();
        //获取截至参数
        $where = [

        ];
        $query = $db->table('fans_64')->where($where)->orderBy('id', 'desc');
        //生成导出对象
        $cb_query = function($query) {
            return $query;
        };
        $cb_map = function($data) {
            return [
                $data->id,
                (string)$data->type,
                (string)date('Y-m-d, H:i:s', $data->time),
            ];
        };
        $cb_headings = function() {
            return [
                    'id',
                    'type',
                    'time',
                ];
        };

        $export = $this->_exportExcelObj($query, $cb_query, $cb_map, $cb_headings);
        $bar->advance();

        //文件路径，看了源码，使用的是此配置
        $path = app('config')->get('filesystems.disks.local.root').'/';
        //导出文件到服务器本地
        if(Excel::store($export, $filename)) {
            //文件全路径
            $filename = $path.$filename;
            $this->info('文件导出成功!文件名:['.$filename.']');
            $this->sendMail($mail_config, $filename);
        } else {
            $this->error('导出失败!');
        }
        $bar->finish();
        $this->_quit();
    }
}
