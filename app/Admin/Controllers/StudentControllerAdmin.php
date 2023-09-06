<?php

namespace App\Admin\Controllers;

use App\Models\Student;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class StudentControllerAdmin extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Student';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Student());

        $grid->column('idAluno', __('Id'));
        $grid->column('nome', __('Nome'));
        $grid->column('turma.nome', __('Turma'));
        $grid->column('encarregado.nome', __('Encarregado'));
        $grid->column('dataNascimento', __('Nacimento em'));
        $grid->column('BI', __('BI'));
        $grid->column('email', __('Email'));
        $grid->column('morada', __('Morada'));
        // $grid->column('genero', __('Genero'));
        // $grid->column('created_at', __('Criado em'));
        // $grid->column('updated_at', __('Actualizado em'));

        // Aplique o filtro personalizado
        $grid->filter(function ($filter) {
            $filter->like('nome', 'Nome');
            $filter->like('BI', 'Nº De BI');
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
        $show = new Show(Student::findOrFail($id));

        $show->field('idAluno', __('Id'));
        $show->field('nome', __('Nome'));
        $show->field('turma.nome', __('Turma'));
        $show->field('encarregado.nome', __('Encarregado'));
        $show->field('dataNascimento', __('Nacimento em'));
        $show->field('BI', __('Nº BI'));
        $show->field('email', __('Email'));
        $show->field('genero', __('Genero'));
        $show->field('morada', __('Morada'));
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
        $form = new Form(new Student());

        $form->text('nome', __('Nome'));
        $form->date('dataNascimento', __('Data De Nascimento'))->default(date('Y-m-d'));
        $form->select('genero', __('Genero'))->options([
            'Masculino' => 'Masculino',
            'Feminino' => 'Feminino',
        ]);
        $form->text('BI', __('BI'));
        $form->email('email', __('Email'));
        $form->text('morada', __('Morada'));

        // Obtém os encarregados da tabela "encarregados" e as turmas da tabela "turmas"
        $encarregados = \App\Models\Encarregado::pluck('nome', 'idEncarregado');
        $turmas = \App\Models\Turma::pluck('nome', 'id');

        $form->select('idEncarregado', __('Encarregado'))->options($encarregados)->required();
        $form->select('idTurma', __('Turma'))->options($turmas)->required();

        return $form;
    }
}
