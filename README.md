# Aplicativo Mobile Multitenancy para Gestão de Notas Escolares

Este repositório contém o código-fonte de um aplicativo mobile multitenancy desenvolvido para a gestão de notas escolares. A aplicação foi construída utilizando tecnologias modernas, incluindo React Native, React e Laravel, visando fornecer uma solução completa para a administração acadêmica, melhorar os processos escolares e facilitar a comunicação entre professores, alunos e pais.

# Documentation for API Endpoints

This document provides an overview of the available endpoints in the API and their functionalities.

### Estudantes

- `GET /studentInstitution/{instituicaoId}`: Obter todos os estudantes de uma instituição específica.
- `GET /studentIncharge/{studentId}`: Obter o encarregado de um estudante específico.
- `POST /createStudent`: Criar um novo estudante.
- `GET /readStudent/{id}`: Obter detalhes de um estudante específico.
- `PUT /updateStudent/{id}`: Atualizar informações de um estudante específico.
- `DELETE /deleteStudent/{id}`: Excluir um estudante específico.

### Instituições

- `POST /createInstitution`: Criar uma nova instituição.
- `GET /readInstitution/{id}`: Obter detalhes de uma instituição específica.
- `PUT /updateInstitution/{id}`: Atualizar informações de uma instituição específica.
- `DELETE /deleteInstitution/{id}`: Excluir uma instituição específica.
- `GET /getAllInstitution`: Obter detalhes de todas as instituições.
- `GET /getAllTeachers`: Obter detalhes de todos os professores em instituições.

### Encarregados

- `POST /createIncharge`: Criar um novo encarregado.
- `GET /readIncharge/{id}`: Obter detalhes de um encarregado específico.
- `PUT /updateIncharge/{id}`: Atualizar informações de um encarregado específico.
- `DELETE /deleteIncharge/{id}`: Excluir um encarregado específico.
- `GET /getAllIncharge`: Obter detalhes de todos os encarregados.

### Professores

- `POST /createTeacher`: Criar um novo professor.
- `GET /readTeacher/{id}`: Obter detalhes de um professor específico.
- `PUT /updateTeacher/{id}`: Atualizar informações de um professor específico.
- `DELETE /deleteTeacher/{id}`: Excluir um professor específico.
- `POST /teacherInstitution/{professorId}`: Adicionar um professor a uma instituição.

### Classes (Turmas)

- `GET /getStudentClass/{turmaId}`: Obter todos os alunos de uma determinada turma.
- `POST /createClass`: Criar uma nova turma.
- `GET /readClass/{id}`: Obter detalhes de uma turma específica.
- `PUT /updateClass/{id}`: Atualizar informações de uma turma específica.
- `DELETE /deleteClass/{id}`: Excluir uma turma específica.

### Disciplinas

- `POST /createSubject`: Criar uma nova disciplina.
- `GET /readSubject/{id}`: Obter detalhes de uma disciplina específica.
- `PUT /updateSubject/{id}`: Atualizar informações de uma disciplina específica.
- `DELETE /deleteSubject/{id}`: Excluir uma disciplina específica.
- `GET /subjects/{instituicaoId}`: Obter disciplinas por instituição.

### Notas

- `POST /createGrade`: Criar uma nova nota.
- `GET /readGrade/{id}`: Obter detalhes de uma nota específica.
- `PUT /updateGrade/{id}`: Atualizar informações de uma nota específica.
- `DELETE /deleteGrade/{id}`: Excluir uma nota específica.


