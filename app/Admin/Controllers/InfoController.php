<?php

namespace App\Admin\Controllers;

use App\Models\Info;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class InfoController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '基本信息';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Info());
        $grid->model()->orderBy("sort", "ASC");

        $grid->column('id', __('Id'))->hide();
        $grid->column('name', __('Name'));
        $grid->column('key', __('Key'));
        $grid->column('value', __('Value'))->width(500)->editable("textarea");
        $grid->column('sort', __('Sort'))->editable();
//        $grid->column('status', __('Status'))->switch(
//            [
//                'on' => ['value' => Info::STATUS_ON],
//                'off' => ['value' => Info::STATUS_OFF],
//            ]
//        );
//        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'))->date("Y-m-d H:i:s");
       $grid->disableFilter();
       $grid->disableExport();
       $grid->disablePagination();
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
        $show = new Show(Info::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('key', __('Key'));
        $show->field('value', __('Value'));
        $show->field('sort', __('Sort'));
        $show->field('status', __('Status'))->using([1 => "显示", 2 => "隐藏"]);
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Info());

        $form->text('name', __('Name'))->required();
        $form->text('key', __('Key'))->required();
        $form->text('value', __('Value'))->required();
        $form->number('sort', __('Sort'))->required();
        $form->switch('status', __('Status'))->states(
            [
                'on' => ['value' => Info::STATUS_ON],
                'off' => ['value' => Info::STATUS_OFF],
            ]
        )->default(1);

        return $form;
    }
}
