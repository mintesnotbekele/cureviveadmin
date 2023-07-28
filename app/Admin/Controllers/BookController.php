<?php

namespace App\Admin\Controllers;

use App\Models\book;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class BookController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'book';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new book());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        $grid->column('treatmentfor', __('Treatmentfor'));
        $grid->column('phone', __('Phone'));
        $grid->column('description', __('Description'));
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
        $show = new Show(book::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('treatmentfor', __('Treatmentfor'));
        $show->field('phone', __('Phone'));
        $show->field('description', __('Description'));
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
        $form = new Form(new book());

        $form->text('name', __('Name'));
        $form->email('email', __('Email'));
        $form->text('treatmentfor', __('Treatmentfor'));
        $form->mobile('phone', __('Phone'));
        $form->text('description', __('Description'));

        return $form;
    }
}
