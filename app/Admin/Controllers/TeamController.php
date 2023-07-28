<?php

namespace App\Admin\Controllers;

use App\Models\team;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TeamController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'team';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new team());
        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('role', __('Role'));
        $grid->column('picture', 'Preview Image')->display(function ($imagePath) {
            return '<img src="'. asset($imagePath) .'" style="max-width:100px;max-height:100px;">';
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
        $show = new Show(team::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new team());
        $form->text('name', __('Name'));
        $form->text('role', __('ROle'));
        $form->image('picture', __('Picture'));
        

        return $form;
    }
}
