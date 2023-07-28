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
        $grid->column('tags', __('Tags'));
        $grid->column('socialmedia', __('Social Media'));
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
        $form->image('image_column')->thumbnail([
            'small' => [100, 100],
            'small' => [200, 200],
            'small' => [300, 300],
        ]);;
        $form->text('tags', __('Tags'));
        $form->text('socialmedia', __('Social Media'));
       
        return $form;
    }
}
