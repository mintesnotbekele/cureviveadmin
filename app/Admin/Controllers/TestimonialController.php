<?php

namespace App\Admin\Controllers;

use App\Models\testimonial;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TestimonialController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'testimonial';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new testimonial());

        $grid->column('id', __('Id'));
        $grid->column('username', __('Username'));
        $grid->column('profilepic', __('Profilepic'));
        $grid->column('testimony', __('Testimony'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(testimonial::findOrFail($id));
        $show->field('id', __('Id'));
        $show->field('username', __('Username'));
        $show->field('profilepic', __('Profilepic'));
        $show->field('testimony', __('Testimony'));
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
        $form = new Form(new testimonial());

        $form->text('username', __('Username'));
        $form->text('profilepic', __('Profilepic'));
        $form->text('testimony', __('Testimony'));

        return $form;
    }
}
