# web_app
Projeto: Web app 
- Jamilly Ramos de brito
- 3°DS (Desenvolvimento de Sistemas)
- EEEMI Prof. Joaquim De Moura Candelária
Descrição do projeto:
Este é um Web App de Reservas de Eventos Culturais, que começou como um simples sistema de login com segurança reforçada, mas cresceu e hoje faz muito mais.
Agora os usuários podem ver eventos culturais, conferir localização no mapa, saber o clima no dia e fazer reservas. O administrador tem controle total sobre os eventos.
Tudo foi feito com HTML, CSS, JavaScript, PHP e MySQL, além das APIs do Google Maps e OpenWeather.

Funcionalidades de Login:
-Verificação de usuário e senha
-Bloqueio após 3 tentativas erradas
-Contador de acessos
-Aviso de primeiro acesso
-Cadastro de usuários direto no sistema

Perfis do Sistema:
Administrador
-O administrador tem acesso a funções de gerenciamento. Ele pode:
-Criar novos eventos culturais
-Informar endereço, data, horário e descrição
-Editar ou excluir eventos
-Visualizar reservas feitas pelos usuários
-Liberar ou bloquear contas de usuários
-Cadastrar novos usuários se necessário

Usuário Comum:
-O usuário comum utiliza o sistema para:
-Fazer login e acessar sua área
-Ver os eventos culturais disponíveis
-Ver a localização do evento pelo mapa (Google Maps)
-Ver a previsão do clima para o dia do evento
-Reservar um evento
-Acessar a página Minhas Reservas
-Ver suas reservas com todos os detalhes, incluindo mapa e clima

Funcionalidades do Sistema de Eventos:

Eventos Culturais
-Lista completa de eventos cadastrados
-Cada evento mostra:
-Nome
-Data e horário
-Descrição
-Endereço
-Mapa do local
-Clima do dia do evento

API de Clima (OpenWeather):
Para cada evento, o sistema mostra:
-Temperatura prevista
-Condição do tempo
-Ícone do clima
-Sensação térmica (opcional)

API de Mapa (Google Maps):
Sempre que o administrador cadastra um endereço, o sistema exibe:
-Mapa interativo
-Localização real do evento

Tecnologias Usadas:
Front-end
-HTML5
-CSS3
-JavaScript
-Bootstrap

Back-end
-PHP
-MySQL
-APIs
-Google Maps
-OpenWeather
Back-end

PHP

MySQL

APIs

Google Maps

OpenWeather
