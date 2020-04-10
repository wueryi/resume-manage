<?php

namespace App\Admin\Controllers;

use App\Models\Skill;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SkillController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '个人技能';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Skill());
        $grid->model()->orderBy("sort", "ASC");
        $grid->paginate(30);

        $grid->column('id', __('Id'));
//        $grid->column('brief', __('Brief'));
        $grid->column('content', __('Content'))->width(700)->filter('like');
        $grid->column('keyword', __('Keyword'));
        $grid->column('sort', __('Sort'));
        $grid->column('status', __('Status'))
            ->switch(
                [
                    'on' => ['value' => Skill::STATUS_ON],
                    'off' => ['value' => Skill::STATUS_OFF],
                ]
            );
//        $grid->column('created_at', __('Created at'))->date('Y-m-d H:i:s');
        $grid->column('updated_at', __('Updated at'))->date('Y-m-d H:i:s');

        $grid->filter(function ($filter) {
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            $filter->like('content', __("Content"));
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
        $show = new Show(Skill::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('brief', __('Brief'));
        $show->field('content', __('Content'));
        $show->field('keyword', __('Keyword'));
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
        $form = new Form(new Skill());

//        $form->text('brief', __('Brief'));
        $form->textarea('content', __('Content'))->required();
        $form->text('keyword', __('Keyword'))->required();
        $form->number('sort', __('Sort'))->required();
        $form->switch('status', __('Status'))->states(
            [
                'on' => ['value' => Skill::STATUS_ON],
                'off' => ['value' => Skill::STATUS_OFF],
            ]
        )->default(1);

        return $form;
    }
}
