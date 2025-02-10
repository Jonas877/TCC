# TCC - Sistema de Controle de Saídas com RFID/NFC

## Descrição
Este é o projeto de TCC desenvolvido em grupo para a conclusão do curso técnico em Desenvolvimento de Sistemas. O sistema foi projetado para facilitar a saída de alunos do estacionamento de motos de uma escola, utilizando tags RFID para automação e registro.

## Objetivo
O projeto visa substituir o processo manual de encontrar um segurança para abrir o portão, tornando o fluxo mais rápido e confiável. 

## Tecnologias Utilizadas
- **PHP**: Backend para os endpoints e CRUD.
- **Bootstrap**: Frontend responsivo para o site.
- **C++ (Arduino)**: Programação do microcontrolador.
- **RC522**: Leitor RFID para leitura das tags.
- **ESP8266**: Comunicação Wi-Fi entre o Arduino e o site.

## Funcionamento
1. Os alunos aproximam sua tag RFID do leitor RC522.
2. O Arduino, utilizando o módulo ESP8266, faz uma requisição HTTP a um endpoint PHP.
3. O site registra os dados no banco (usuário, data e hora) e permite a visualização e gerenciamento dos registros.

## Como Rodar
1. Clone este repositório:  
   ```bash
   git clone https://github.com/seu-usuario/tcc
   
2. Configure o servidor PHP e o banco de dados MySQL.
3. Faça o upload do código para o Arduino utilizando a IDE Arduino.
4. Acesse o site pelo navegador para gerenciar as saídas.

Contribuições são bem-vindas! Abra uma issue ou envie um pull request.

## TCC - Exit Control System with RFID/NFC
Description
This is the capstone project developed by a group for the completion of the technical course in Systems Development. The system was designed to streamline the process of students exiting the motorcycle parking area of a school, using RFID tags for automation and logging.

## Objective
The project aims to replace the manual process of finding a security guard to open the gate, making the flow faster and more reliable.

## Technologies Used
- **PHP**: Backend for endpoints and CRUD operations.
- **Bootstrap**: Responsive frontend for the website.
- **C++ (Arduino)**: Microcontroller programming.
- **RC522**: RFID reader for tag scanning.
- **ESP8266**: Wi-Fi communication between Arduino and the website.

## How It Works
1. Students bring their RFID tag close to the RC522 reader.
2. The Arduino, using the ESP8266 module, makes an HTTP request to a PHP endpoint.
3. The website records the data in the database (user, date, and time) and allows for viewing and managing the logs.

## How to run
1. Clone this repository:
   ```bash
   git clone https://github.com/seu-usuario/tcc
   
2. Set up the PHP server and MySQL database.
3. Upload the code to the Arduino using the Arduino IDE.
4. Access the website via a browser to manage the exits.

Contributions are welcome! Open an issue or submit a pull request.
