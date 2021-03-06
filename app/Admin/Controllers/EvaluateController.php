<?php

namespace App\Admin\Controllers;

use App\Models\Evaluate;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class EvaluateController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '自我评价';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Evaluate());
        $grid->model()->orderBy("sort", "ASC");


        $grid->column('id', __('Id'));
        $grid->column('content', __('Content'));
        $grid->column('sort', __('Sort'))->editable();
        $grid->column('status', __('Status'))->switch(
            [
                'on' => ['value' => Evaluate::STATUS_ON],
                'off' => ['value' => Evaluate::STATUS_OFF],
            ]
        );
//        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'))->date("Y-m-d H:i:s");
        $grid->filter(function ($filter) {
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            $filter->like('content', __("Content"));
        });
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
        $show = new Show(Evaluate::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('content', __('Content'));
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
        $form = new Form(new Evaluate());

        $form->textarea('content', __('Content'))->required();
        $form->number('sort', __('Sort'))->required();
        $form->switch('status', __('Status'))->states(
            [
                'on' => ['value' => Evaluate::STATUS_ON],
                'off' => ['value' => Evaluate::STATUS_OFF],
            ]
        )->default(1);

        return $form;
    }
}
