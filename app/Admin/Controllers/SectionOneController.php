<?php

namespace App\Admin\Controllers;

use App\Models\sectionone;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SectionOneController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'sectionone';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new sectionone());
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
        $show = new Show(sectionone::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new sectionone());
        $form->text('title', __('Title'));
        $form->text('description', __('Description'));
        $form->image('picture', __('Picture'));

        return $form;
    }
}
