<?php

namespace App\Admin\Controllers;

use App\Model\UserModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Model\UserModel';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new UserModel());

        $grid->column('id', __('Id'));
        //$grid->column('c_name', __(''));
        $grid->column('c_people', __('用户名'));
       // $grid->column('c_photo', __('C photo'));
        $grid->column('phone', __('手机'));
        $grid->column('email', __('邮箱'));
        $grid->column('appid', __('Appid'));
        $grid->column('appsecret', __('Appsecret'));
        $grid->column('created_at', __('Created at'));
        //$grid->column('updated_at', __('Updated at'));
        //$grid->column('c_place', __('C place'));
        // $grid->column('pwd', __('Pwd'));

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
        $show = new Show(UserModel::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('c_name', __('C name'));
        $show->field('c_people', __('C people'));
        $show->field('c_photo', __('C photo'));
        $show->field('phone', __('Phone'));
        $show->field('email', __('Email'));
        $show->field('appid', __('Appid'));
        $show->field('appsecret', __('Appsecret'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('c_place', __('C place'));
        $show->field('pwd', __('Pwd'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new UserModel());

        $form->text('c_name', __('C name'));
        $form->text('c_people', __('C people'));
        $form->text('c_photo', __('C photo'));
        $form->mobile('phone', __('Phone'));
        $form->email('email', __('Email'));
        $form->text('appid', __('Appid'));
        $form->text('appsecret', __('Appsecret'));
        $form->text('c_place', __('C place'));
        $form->password('pwd', __('Pwd'));

        return $form;
    }
}
