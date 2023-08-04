<?php

namespace App\Admin\Controllers;

use App\Models\reply;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ReplyController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'reply';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new reply());
        $grid->column('description', __('Description'));
        $grid->column('thread', __('Thread'));
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
        $show = new Show(reply::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new reply());
        $form->text('description', __('Description'));
        $form->number('thread', __('Thread'));
        $form->number('author', __('Author'));
        return $form;
    }
}
