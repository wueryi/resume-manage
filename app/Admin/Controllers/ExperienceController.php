<?php

namespace App\Admin\Controllers;

use App\Models\Experience;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ExperienceController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '项目经历';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Experience());
        $grid->model()->orderBy("sort", "ASC");


        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('skill', __('Skill'))->width(150);
        $grid->column('brief', __('Brief'))->width(300);
        $grid->column('responsibility', __('Responsibility'))->width(250);
        $grid->column('difficulty', __('Difficulty'))->width(250);
        $grid->column('achievement', __('Achievement'))->hide();
        $grid->column('image', __("Image"))->carousel(100,100, "")->hide();
        $grid->column('begin_at', __('Begin at'));
        $grid->column('end_at', __('End at'));
        $grid->column('sort', __('Sort'))->editable()->hide();
        $grid->column('status', __('Status'))->switch(
            [
                'on' => ['value' => Experience::STATUS_ON],
                'off' => ['value' => Experience::STATUS_OFF],
            ]
        );
//        $grid->column('created_at', __('Created at'))->date('Y-m-d H:i:s');
//        $grid->column('updated_at', __('Updated at'))->date('Y-m-d H:i:s');

        $grid->filter(function ($filter) {
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            $filter->like('skill', __("Skill"));
            $filter->like('brief', __('Brief'));
            $filter->like('responsibility', __('Responsibility'));
            $filter->like('difficulty', __('Difficulty'));
        });
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
        $show = new Show(Experience::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('brief', __('Brief'));
        $show->field('skill', __('Skill'));
        $show->field('responsibility', __('Responsibility'));
        $show->field('difficulty', __('Difficulty'));
        $show->field('achievement', __('Achievement'));
        $show->field('image', __("Image"))->carousel();
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
        $form = new Form(new Experience());

        $form->text('name', __('Name'))->required();
        $form->textarea('brief', __('Brief'))->required();
        $form->text('skill', __('Skill'))->required();
        $form->textarea('responsibility', __('Responsibility'))->required();
        $form->textarea('difficulty', __('Difficulty'))->required();
        $form->textarea('achievement', __('Achievement'));
        $form->datetime('begin_at', __('Begin at'))->format("YYYY-MM")->required();
        $form->datetime('end_at', __('End at'))->format("YYYY-MM");
        $form->number('sort', __('Sort'))->required();
        $form->switch('status', __('Status'))->states(
            [
                'on' => ['value' => Experience::STATUS_ON],
                'off' => ['value' => Experience::STATUS_OFF],
            ]
        )->default(1);
        $form->multipleImage('image', __('Image'))->sortable()->removable();

        return $form;
    }
}
