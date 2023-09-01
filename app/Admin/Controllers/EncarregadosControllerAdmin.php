<?php

namespace App\Admin\Controllers;

use App\Models\Encarregado;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class EncarregadosControllerAdmin extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Encarregado';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Encarregado());

        $grid->column('idEncarregado', __('IdEncarregado'));
        $grid->column('nome', __('Nome'));
        $grid->column('parentesco', __('Parentesco'));
        $grid->column('telefone', __('Telefone'));
        $grid->column('email', __('Email'));
        $grid->column('senha', __('Senha'));
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
        $show = new Show(Encarregado::findOrFail($id));

        $show->field('idEncarregado', __('IdEncarregado'));
        $show->field('nome', __('Nome'));
        $show->field('parentesco', __('Parentesco'));
        $show->field('telefone', __('Telefone'));
        $show->field('email', __('Email'));
        $show->field('senha', __('Senha'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Encarregado());

        $form->text('nome', __('Nome'));
        $form->text('parentesco', __('Parentesco'));
        $form->text('telefone', __('Telefone'));
        $form->email('email', __('Email'));
        $form->text('senha', __('Senha'));

        return $form;
    }
}
