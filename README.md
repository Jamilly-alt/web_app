# web_app
Projeto: Web app 
- Jamilly Ramos de brito
- 3°DS (Desenvolvimento de Sistemas)
- EEEMI Prof. Joaquim De Moura Candelária
Sobre o Projeto

Este projeto é um Web App para reserva de eventos culturais. Ele começou como um sistema de login com algumas funções extras de segurança e evoluiu para um sistema completo onde usuários podem visualizar eventos, consultar a localização no mapa, verificar o clima no dia do evento e realizar reservas. O administrador tem acesso completo ao gerenciamento dos eventos e dos usuários.

Funcionalidades de Login

Verificação de usuário e senha

Bloqueio automático após 3 tentativas erradas

Contador de acessos por usuário

Identificação de primeiro acesso

Cadastro de novos usuários diretamente no sistema

Perfis do Sistema
Administrador

O administrador tem acesso às ferramentas de gerenciamento e pode:

Criar novos eventos culturais

Informar endereço, data, horário e descrição dos eventos

Editar ou excluir eventos

Visualizar reservas feitas pelos usuários

Cadastrar novos usuários

Bloquear ou liberar contas

Usuário Comum

O usuário comum pode:

Fazer login e acessar sua área

Visualizar eventos disponíveis

Consultar a localização do evento pelo mapa (Google Maps)

Ver a previsão do clima para a data do evento

Fazer reservas

Acessar a página “Minhas Reservas” com todos os detalhes

Funcionalidades do Sistema de Eventos
Eventos Culturais

A listagem de eventos mostra:

Nome do evento

Data e horário

Descrição

Endereço

Mapa da localização

Clima previsto para o dia do evento

API de Clima (OpenWeather)

Para cada evento, o sistema exibe:

Temperatura prevista

Condição do tempo

Ícone representando o clima

Outras informações opcionais como sensação térmica

API de Mapa (Google Maps)

Sempre que o administrador cadastra um endereço, o sistema mostra:

Mapa interativo

Localização exata do evento

Tecnologias Utilizadas
Front-end

HTML5

CSS3

JavaScript

Bootstrap

Back-end

PHP

MySQL

APIs Integradas

Google Maps

OpenWeather
