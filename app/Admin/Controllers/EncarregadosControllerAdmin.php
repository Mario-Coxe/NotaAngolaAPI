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

        $grid->column('idEncarregado', __('Id'));
        $grid->column('nome', __('Nome'));
        $grid->column('parentesco', __('Parentesco'));
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
        $show = new Show(Encarregado::findOrFail($id));

        $show->field('idEncarregado', __('Id'));
        $show->field('nome', __('Nome'));
        $show->field('parentesco', __('Parentesco'));
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
        $form = new Form(new Encarregado());

        $form->text('nome', __('Nome'));
        $form->select('parentesco', __('Parentesco'))->options([
            'Pai' => 'Pai',
            'Mãe' => 'Mãe',
            'Tio' => 'Tio',
            'Tia' => 'Tia',
            'Avó' => 'Avó',
            'Outro' => 'Outro',
        ]);
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
