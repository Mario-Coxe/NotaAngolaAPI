# Aplicativo Mobile Multitenancy para Gestão de Notas Escolares

Este repositório contém o código-fonte de um aplicativo mobile multitenancy desenvolvido para a gestão de notas escolares. A aplicação foi construída utilizando tecnologias modernas, incluindo React Native, React e Laravel, visando fornecer uma solução completa para a administração acadêmica, melhorar os processos escolares e facilitar a comunicação entre professores, alunos e pais.

# Documentation for API Endpoints

This document provides an overview of the available endpoints in the API and their functionalities.

## Students

- `GET /studentInstitution/{instituicaoId}`: Get all students from a specific institution.
- `GET /studentIncharge/{studentId}`: Get the guardian of a specific student.
- `POST /createStudent`: Create a new student.
- `GET /readStudent/{id}`: Get details of a specific student.
- `PUT /updateStudent/{id}`: Update information of a specific student.
- `DELETE /deleteStudent/{id}`: Delete a specific student.

## Institutions

- `POST /createInstitution`: Create a new institution.
- `GET /readInstitution/{id}`: Get details of a specific institution.
- `PUT /updateInstitution/{id}`: Update information of a specific institution.
- `DELETE /deleteInstitution/{id}`: Delete a specific institution.
- `GET /getAllInstitution`: Get details of all institutions.
- `GET /getAllTeachers`: Get details of all teachers in institutions.

## Guardians (Encarregados)

- `POST /createIncharge`: Create a new guardian.
- `GET /readIncharge/{id}`: Get details of a specific guardian.
- `PUT /updateIncharge/{id}`: Update information of a specific guardian.
- `DELETE /deleteIncharge/{id}`: Delete a specific guardian.
- `GET /getAllIncharge`: Get details of all guardians.

## Teachers (Professores)

- `POST /createTeacher`: Create a new teacher.
- `GET /readTeacher/{id}`: Get details of a specific teacher.
- `PUT /updateTeacher/{id}`: Update information of a specific teacher.
- `DELETE /deleteTeacher/{id}`: Delete a specific teacher.
- `POST /teacherInstitution/{professorId}`: Add a teacher to an institution.

## Classes (Turmas)

- `GET /getStudentClass/{turmaId}`: Get all students in a specific class.
- `POST /createClass`: Create a new class.
- `GET /createClass/{id}`: Get details of a specific class.
- `PUT /updateClass/{id}`: Update information of a specific class.
- `DELETE /deleteClass/{id}`: Delete a specific class.

## Authentication

- `GET /user`: Get authenticated user details (requires authentication).

## Configuração

Para configurar e executar este projeto localmente, siga estas etapas:

1. Clone este repositório: `git clone https://github.com/seu-usuario/seu-repositorio.git`
2. Instale as dependências do Laravel: `composer install`
3. Instale as dependências do React Native: `npm install`
4. Configure o ambiente e o banco de dados no arquivo `.env`
5. Execute as migrações do banco de dados: `php artisan migrate`
6. Inicie o servidor Laravel: `php artisan serve`
7. Inicie o servidor React Native: `npm start`

## Contribuição

Contribuições são bem-vindas! Se você quiser contribuir para este projeto, siga estas etapas:

1. Faça um fork deste repositório.
2. Crie uma branch para a sua feature ou correção: `git checkout -b minha-feature`
3. Faça as alterações desejadas.
4. Commit suas alterações: `git commit -m 'Minha nova feature'`
5. Faça o push para a branch: `git push origin minha-feature`
6. Crie um novo Pull Request.

## Licença

Este projeto está sob a licença XYZ. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.
