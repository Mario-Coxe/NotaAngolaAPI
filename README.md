# Aplicativo Mobile Multitenancy para Gestão de Notas Escolares

Este repositório contém o código-fonte de um aplicativo mobile multitenancy desenvolvido para a gestão de notas escolares. A aplicação foi construída utilizando tecnologias modernas, incluindo React Native, React e Laravel, visando fornecer uma solução completa para a administração acadêmica, melhorar os processos escolares e facilitar a comunicação entre professores, alunos e pais.

## Endpoints da API

A seguir, estão listados os endpoints disponíveis na API deste projeto:

### Estudantes

- `GET /api/studentInstitution/{id}`: Retorna todos os estudantes de uma determinada instituição.
- `GET /api/studentIncharge/{id}`: Retorna o encarregado de um estudante específico.
- `POST /api/createStudent`: Cria um novo estudante.
- `GET /api/readStudent/{id}`: Retorna os detalhes de um estudante.
- `PUT /api/updateStudent/{id}`: Atualiza as informações de um estudante.
- `DELETE /api/deleteStudent/{id}`: Remove um estudante.

### Instituições

- `POST /api/createInstitution`: Cria uma nova instituição.
- `GET /api/readInstitution/{id}`: Retorna os detalhes de uma instituição.
- `PUT /api/updateInstitution/{id}`: Atualiza as informações de uma instituição.
- `DELETE /api/deleteInstitution/{id}`: Remove uma instituição.

### Encarregados

- `POST /api/createIncharge`: Cria um novo encarregado.
- `GET /api/readIncharge/{id}`: Retorna os detalhes de um encarregado.
- `PUT /api/updateIncharge/{id}`: Atualiza as informações de um encarregado.
- `DELETE /api/deleteIncharge/{id}`: Remove um encarregado.

### Administração

- `GET /api/getAllInstitution`: Retorna todas as instituições.
- `GET /api/getAllStudents`: Retorna todos os estudantes.
- `GET /api/getAllTeachers`: Retorna todos os professores.
- `GET /api/getAllIncharge`: Retorna todos os encarregados.

### Professores

- `POST /api/createTeacher`: Cria um novo professor.
- `GET /api/readTeacher/{id}`: Retorna os detalhes de um professor.
- `PUT /api/updateTeacher/{id}`: Atualiza as informações de um professor.
- `DELETE /api/deleteTeacher/{id}`: Remove um professor.

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
