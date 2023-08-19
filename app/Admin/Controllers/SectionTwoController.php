<?php

namespace App\Admin\Controllers;

use App\Models\sectiontwo;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SectionTwoController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'sectiontwo';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new sectiontwo());

        $grid->column('title', __('title ')); 
        $grid->column('description', __('description '));
        
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
        $show = new Show(sectiontwo::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new sectiontwo());

        $form->text('title', __('Title'));
        $form->text('description', __('Description'));
        $form->image('picture', __('Picture'));

        return $form;
    }
}
