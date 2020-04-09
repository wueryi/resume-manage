<?php

namespace App\Admin\Controllers;

use App\Models\Work;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class WorkController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '工作经历';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Work());
        $grid->model()->orderBy("sort", "ASC");


        $grid->column('id', __('Id'));
        $grid->column('company', __('Company'));
        $grid->column('position', __('Position'));
        $grid->column('responsibility', __('Responsibility'));
        $grid->column('begin_at', __('Begin at'));
        $grid->column('end_at', __('End at'));
        $grid->column('sort', __('Sort'));
        $grid->column('status', __('Status'))->switch(
            [
                'on' => ['value' => Work::STATUS_ON],
                'off' => ['value' => Work::STATUS_OFF],
            ]
        );
//        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'))->date("Y-m-d H:i:s");

        $grid->disableFilter();
        $grid->disableExport();
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
        $show = new Show(Work::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('company', __('Company'));
        $show->field('position', __('Position'));
        $show->field('responsibility', __('Responsibility'));
        $show->field('begin_at', __('Begin at'));
        $show->field('end_at', __('End at'));
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
        $form = new Form(new Work());

        $form->text('company', __('Company'))->required();
        $form->text('position', __('Position'))->required();
        $form->textarea('responsibility', __('Responsibility'));
        $form->datetime('begin_at', __('Begin at'))->format("YYYY-MM")->required();
        $form->datetime('end_at', __('End at'))->format("YYYY-MM");
        $form->number('sort', __('Sort'))->required();
        $form->switch('status', __('Status'))->states(
            [
                'on' => ['value' => Work::STATUS_ON],
                'off' => ['value' => Work::STATUS_OFF],
            ]
        )->default(1);

        return $form;
    }
}
