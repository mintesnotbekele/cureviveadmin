<?php

namespace App\Admin\Controllers;

use App\Models\disease;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class DiseaseController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'disease';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new disease());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('description', __('Description'));
        $grid->column('picture', __('Picture'));
        $grid->column('videolink', __('Video Link'));
        
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
        $show = new Show(disease::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new disease());

        $form->text('name', __('Name'));
        $form->text('description', __('Description'));
        $form->image('picture', __('Picture'));
        $form->text('videolink', __('videolink'));
        $form->text('agegroup', __('agegroup'));
        $form->text('duration', __('duration'));
        $form->text('treatments', __('treatments'));
        $form->text('mode', __('mode'));

        return $form;
    }
}
