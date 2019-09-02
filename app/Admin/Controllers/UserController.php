<?php

namespace App\Admin\Controllers;

use Encore\Admin\Widgets\Tab;
use App\Http\Controllers\Controller;
use App\Admin\Forms\Setting;
use Encore\Admin\Layout\Content;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User);
        // $grid->model()->where('id', '>', 10);
        //$grid->model()->whereIn('id',[50,35,45]);
        //$grid->model()->whereBetween('id',[2,15]);
        //$grid->model()->whereColumn('updated_at','>','created_at');
        //$grid->model()->orderBy('id','desc');
        // $grid->model()->take(33);
        //$grid->fixColums(100,5);
        //$grid->column('id')->view('content');
        //数列方法$grid->column('array')->pluck('name')->implode('-');
        
        //列展开
        // $grid->column('name', __('Name'))->expand(function($model){
        //     $emails = $model->all()->take(2)->map(function($email){
        //         return $email->only(['id','email']);

        //     });
        //     return new Table(['id','email'], $emails->toArray());
        // });
        
        //弹出模态框
        // $grid->column('name','姓名')->modal('最新email',function($model){
        //     $emails = $model->all()->take(2)->map(function($email){
        //                 return $email->only(['id','email']);
        //     });
        //     return new Table(['id','email'],$emails->toArray());
        // });

        // $grid->filter(function($filter){
        //     // $filter->disableIdFilter();
        //     // $filter->like('name');
        // });

        // $grid->expandFilter();
        // // $grid->expand(function(){})
        //     // $grid->actions(function ($actions) {
        //     $grid->batchActions(function($batch){
        //         // // 去掉删除
        //         // $actions->disableDelete();
            
        //         // // 去掉编辑
        //         // $actions->disableEdit();
            
        //         // 去掉查看
        //         // $actions->disableView();
        //      $batch->disableDelete();
        //     // $actions->row;//获取行数据
        //     // $actions->getKey();//获取当前行主键值
        //     });
            
            // // 全部关闭
            // $grid->disableActions();
            //添加自定义按钮
            // $grid->actions(function ($actions) {

            //     // append一个操作
            //     $actions->append('<a href=""><i class="fa fa-eye"></i></a>');
            
            //     // prepend一个操作
            //     $actions->prepend('<a href=""><i class="fa fa-paper-plane"></i></a>');
            // });
           
            // $grid->header(function ($query) {
            //     return 'header';
            // });
          //like查询
               // $grid->quickSearch();//快速搜索


            //快速创建
            //    $grid->quickCreate(function (Grid\Tools\QuickCreate $create) {
            //     $create->text('name', '名称');
            //     $create->email('email', '邮箱');
            //     $create->ip('ip','ip');
            //     $create->url('url','url地址');
            //     $create->password('password','密码');
            //     $create->mobile('mobile','手机号');
            //     $create->integer('int','整数输入框');
            //     $create->select('select','单选')->options([1=>'foo',2=>'bar']);
            //     $create->multipleSelect('checkbox','复选框')->options([1=>'foo',2=>'bar']);
            //     $create->datetime('datetime','日期时间');
            //     $create->time('time','时间');
            //     $create->date('date','日期');
            // });
            // $model->where('username', 'REGEXP', 'song');
            $states = [
                'on' => ['text' => 'YES'],
                'off' => ['text' => 'NO'],
            ];
        $grid->column('id', __('Id'))->totalRow();//->loading([1,2,3]);//->progressBar($style='primary',$size='sm',$max=100);//->link();//->psv('pink')->help('这是ID')->sortable()->qrcode();
        //$grid->column('name', __('Name'));//->setAttributes(['style'=>'color:red;']);
        $grid->column('email', __('Email'))->radio([
            1 => 'Sed ut perspiciatis unde omni',
            2 => 'voluptatem accusantium doloremque',
            3 => 'dicta sunt explicabo',
            4 => 'laudantium, totam rem aperiam',
        ]);;//->editable('select',[1=>'1215334105@qq.com',2=>'optiion2',3=>'optiion3',4=>'optiion4']);//->editable('textarea');
        $grid->column('email_verified_at', __('Email verified at'))->width(200);
        $grid->column('password', __('Password'));
        $grid->column('remember_token', __('Remember token'));
        $grid->column('created_at', __('Created at'))->date('Y-m-d');//->hide();
        $grid->column('updated_at', __('Updated at'))->limit(10);
        $grid->column('is_admin', __('Is admin'))->switchGroup(['hot'       => '热门',
        'new'       => '最新',
        'recommend' => '推荐',], $states);//->display(function($is_admin){return $is_admin?'是':'否';})->icon(['是'=>'toggle-off','否'=>'toggle-on'],$default='');//->label('info');//->copyable();
        $grid->column('activation_token', __('Activation token'));
        $grid->column('activated', __('Activated'));//->gravatar();

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('email_verified_at', __('Email verified at'));
        $show->field('password', __('Password'));
        $show->field('remember_token', __('Remember token'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('is_admin', __('Is admin'));
        $show->field('activation_token', __('Activation token'));
        $show->field('activated', __('Activated'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        
        $form = new Form(new User);

        $form->text('name', __('Name'));//->inputmask(['mask' => '99-9999999']);//->datalist(['key' => 'value']);//->required()->pattern('[0-9a-zA-z]*')->rules('required|min:10');//->autofocus();//->placeholder('请输入。。。');//->attribute(['data-title' => 'title...']);//->help('help...');//->default('text...');//value('text...');//;
        $form->email('email', __('Email'))->readonly();
        $form->datetime('email_verified_at', __('Email verified at'))->default(date('Y-m-d H:i:s'));
        $form->password('password', __('Password'));
        $form->text('remember_token', __('Remember token'));
        $form->switch('is_admin', __('Is admin'))->disable();
        $form->text('activation_token', __('Activation token'));
        $form->switch('activated', __('Activated'));//开关
        $form->listbox('column')->options([1=>'foo',2=>'bar',3=>'val']);//多选
        $form->datetimeRange('1898-08-09','1999-09-09','DaTime Range');//时间范围
        $form->currency('单位')->symbol('￥');
        $form->number('数')->min(2)->max(10);
        $form->rate('比例');
        $form->file('文件上传');
        $form->multipleFile('多文件上传')->removable();
        $form->slider('滑块')->options(['max'=>100,'min'=>10,'step'=>2,'postfix' => 'years old']);
        $form->divider('分割线');
        $form->hidden('隐藏域');
        $form->tags('sss');
        $form->icon('图标')->rules();
        $form->timezone('timezone')->creationRules('required');
       
        
       
       
       
       
        // $form->table('信息',function($table){
        //     $table->text('学校');
        //     $table->text('年龄');
        //     $table->text('身高');
        // })->updateRules(['required','unique::user_table,usernaem,{{id}}']);
        
        // $form->tab('信息',function($form){
        //     $form->tags('sss');
        //     $form->icon('图标')->rules();
        // });
        // $form->tab('信息s',function($form){
        //     $form->tags('ssaaas');
        //     $form->icon('图标')->rules();
        // });
        // $form->tab('信息aa',function($form){
        //     $form->tags('sssasdasdasdasd');
        //     $form->icon('图标')->rules();
        // });
      
        


       



        //在表单提交前调用
        // $form->submitted(function(From $form){
        //     //.
        // });
        
        //保存前回调
        // $form->saving(function(From $form){
        //     //.
        // });
        
        //保存后回调
        // $form->saved(function(From $form){
        //     //.
        // });

        //在删除前回调
        //$form->deleting(function(){});

        //在删除后回调
        //$form->deleted(function(){});    

        //在模型中添加访问器和修改器
        // public function getExtraAttribute($extra)
        // {
        //     return array_values(json_decode($extra, true) ?: []);
        // }
    
        // public function setExtraAttribute($extra)
        // {
        //     $this->attributes['extra'] = json_encode(array_values($extra));
        // }
        //$form->html('')
        // $form->tab('Basic info'//数据表, function ($form) {

        //     $form->text('username');
        //     $form->email('email');
        
        // })->tab('Profile', function ($form) {
        
        //    $form->image('avatar');
        //    $form->text('address');
        //    $form->mobile('phone');
        
        // })->tab('Jobs', function ($form) {
        //      $form->hasMany('jobs', function () {
        //          $form->text('company');
        //          $form->date('start_date');
        //          $form->date('end_date');
        //      });
        //   })

        //可以利用ajax动态分页载入选项
        // $form->select('friends')->options(function ($ids) {
        //     return User::find($ids)->pluck('name', 'id');
        // })->ajax('/admin/api/users');

        //通过参数q，调用/api/city 接口，并把返回的数据填充为city选择框的选项，返回的数据必须符合格式
       // $form->select('province')->options(...)->load('city', '/api/city');
        
    //图片上传目录在文件config/admin.php中的upload.image中配置，如果目录不存在，需要创建该目录并开放写权限。

    //可以使用压缩、裁切、添加水印等各种方法,需要先安装intervention/image.
    //    $form->image($column[, $label]);

    //     // 修改图片上传路径和文件名
    //     $form->image($column[, $label])->move($dir, $name);

    //     // 剪裁图片
    //     $form->image($column[, $label])->crop(int $width, int $height, [int $x, int $y]);

    //     // 加水印
    //     $form->image($column[, $label])->insert($watermark, 'center');

    //     // 添加图片删除按钮
    //     $form->image($column[, $label])->removable();

    //     // 删除数据时保留图片
    //     $form->image($column[, $label])->retainable();

    //     // 增加一个下载按钮，可点击下载
    //     $form->image($column[, $label])->downloadable();
    
    // // 上传图片的同时生成缩略图
    // $form->image($column[, $label])->thumbnail('small', $width = 300, $height = 300);

    // // 或者多张缩略图
    // $form->image($column[, $label])->thumbnail([
    // 'small' => [100, 100],
    // 'small' => [200, 200],
    // 'small' => [300, 300],
    // ]);

       return $form;
    }



}
