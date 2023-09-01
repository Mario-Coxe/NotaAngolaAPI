<?php

namespace App\Admin\Controllers;

use App\Models\Instituicao;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class InstituicaoControllerAdmin extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Instituicao';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Instituicao());

        $grid->column('idInstituicao', __('IdInstituicao'));
        $grid->column('idEncarregado', __('IdEncarregado'));
        $grid->column('nome', __('Nome'));
        $grid->column('localizacao', __('Localizacao'));
        $grid->column('telefone', __('Telefone'));
        $grid->column('email', __('Email'));
        $grid->column('status', __('Status'));
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
        $show = new Show(Instituicao::findOrFail($id));

        $show->field('idInstituicao', __('IdInstituicao'));
        $show->field('idEncarregado', __('IdEncarregado'));
        $show->field('nome', __('Nome'));
        $show->field('localizacao', __('Localizacao'));
        $show->field('telefone', __('Telefone'));
        $show->field('email', __('Email'));
        $show->field('status', __('Status'));
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
        $form = new Form(new Instituicao());

        $form->number('idEncarregado', __('IdEncarregado'));
        $form->text('nome', __('Nome'));
        $form->text('localizacao', __('Localizacao'));
        $form->text('telefone', __('Telefone'));
        $form->email('email', __('Email'));
        $form->text('status', __('Status'))->default('1');

        return $form;
    }
}
