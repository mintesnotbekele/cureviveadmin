<?php

namespace App\Admin\Controllers;

use App\Models\thread;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ThreadController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'thread';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new thread());
        $grid->column('title', __('Title'));
        $grid->column('body', __('Body'));
        $grid->column('author', __('Author'));
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
        $show = new Show(thread::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new thread());
        $form->text('title', __('Title'));
        $form->text('body', __('Body'));
        $form->number('author', __('Author'));
        $form->text('status', __('Status'));
        return $form;
    }
}
