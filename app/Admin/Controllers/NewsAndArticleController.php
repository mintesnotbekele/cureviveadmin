<?php

namespace App\Admin\Controllers;

use App\Models\newsandarticle;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class NewsAndArticleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'newsandarticle';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new newsandarticle());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('description', __('Description'));
        $grid->column('category', __('Category'));
        $grid->column('tag', __('Tag'));
        $grid->column('socialmedia', __('Social Media'));
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
        $show = new Show(newsandarticle::findOrFail($id));



        return $show;
    }

      /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new newsandarticle());

        $form->text('title', __('Title'));
        $form->text('description', __('Description'));
        $form->text('category', __('Category'));
        $form->text('tags', __('Tag'));
        $form->text('socialmedia', __('Social Media')); 
        $form->image('picture', __('Picture'));
     
       

        return $form;
    }
}
