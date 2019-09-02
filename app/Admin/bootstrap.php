<?php
use Encore\Admin\Grid\Column;
use Encore\Admin\Admin;
//use Encore\Admin\Grid;
/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */
Admin::script('console.log("hello world");');
Encore\Admin\Form::forget(['map', 'editor']);
Column::extend('psv',function($value,$psv){
    return "<span style='color:$psv'>$value</span>";
});
//表格初始化
// Grid::init(function (Grid $grid) {

//     $grid->disableActions();

//     $grid->disablePagination();

//     $grid->disableCreateButton();

//     $grid->disableFilter();

//     $grid->disableRowSelector();

//     $grid->disableColumnSelector();

//     $grid->disableTools();

//     $grid->disableExport();

//     $grid->actions(function (Grid\Displayers\Actions $actions) {
//         $actions->disableView();
//         $actions->disableEdit();
//         $actions->disableDelete();
//     });
// });


//表单初始化
// Form::init(function (Form $form) {

//     $form->disableEditingCheck();

//     $form->disableCreatingCheck();

//     $form->disableViewCheck();

//     $form->tools(function (Form\Tools $tools) {
//         $tools->disableDelete();
//         $tools->disableView();
//         $tools->disableList();
//     });
// });