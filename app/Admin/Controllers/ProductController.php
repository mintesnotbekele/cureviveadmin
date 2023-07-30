<?php

namespace App\Admin\Controllers;

use App\Models\product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'product';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new product());

        $grid->column('id', __('Id'));

        $grid->column('name', __('Name'));

        $grid->column('medicinalroperty', __('Medicinal Property'));

        $grid->column('shelflife', __('Shelf Life'));
        $grid->column('storage', __('storage'));
        $grid->column('size', __('size')); 
        $grid->column('application', __('application'));
        $grid->column('description', __('description '));
        $grid->column('type', __('type '));
        $grid->column('picture', 'Preview Image')->display(function ($imagePath) {
            return '<img src="'. asset($imagePath) .'" style="max-width:100px;max-height:100px;">';
        });
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
        $show = new Show(product::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new product());

        $form->text('name', __('Name'));
        $form->text('medicinalroperty', __('medicinal property'));
        $form->text('shelflife', __('Shelf Life'));
        $form->text('storage', __('Storage'));
        $form->text('size', __('Size'));
        $form->text('type', __('Type'));
        $form->text('application', __('Application'));
        $form->text('description', __('Description'));
        $form->image('picture', __('Picture'));


        return $form;
    }
}
