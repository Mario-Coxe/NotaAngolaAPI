<?php

namespace App\Admin\Controllers;

use App\Models\Professor;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProfessorControllerAdmin extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Professor';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Professor());

        $grid->column('idProfessor', __('Id'));
        $grid->column('nome', __('Nome'));
        $grid->column('telefone', __('Telefone'));
        $grid->column('email', __('Email'));
        $grid->column('senha', __('Senha'));
        $grid->column('created_at', __('Criado em'));
        $grid->column('updated_at', __('Actualizado em'));


        // Aplique o filtro personalizado
        $grid->filter(function ($filter) {
            $filter->like('nome', 'Nome');
            $filter->like('telefone', 'Telefone');
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
        $show = new Show(Professor::findOrFail($id));

        $show->field('idProfessor', __('Id'));
        $show->field('nome', __('Nome'));
        $show->field('telefone', __('Telefone'));
        $show->field('email', __('Email'));
        $show->field('senha', __('Senha'));
        $show->field('created_at', __('Criado em'));
        $show->field('updated_at', __('Actualizado em'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Professor());

        $form->text('nome', __('Nome'));

        // Use o método 'mobile' para adicionar a máscara de telefone
        $form->mobile('telefone', __('Telefone'))->options(['mask' => '+(244) 999 999 999']);
        $form->email('email', __('Email'));
        $form->text('senha', __('Senha'));


         $form->saving(function (Form $form) {
            // remove the mask from the phone number
            $form->telefone = str_replace('+(244)', '', $form->telefone);
            $form->telefone = preg_replace('/\D/', '', $form->telefone);
        });

        return $form;
    }
}
