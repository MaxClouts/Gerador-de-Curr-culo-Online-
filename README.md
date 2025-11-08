# Gerador de Currículo Online

[cite_start]Este projeto consiste em um **Gerador de Currículo Online** desenvolvido como um Estudo Dirigido para a disciplina de Fundamentos de Programação para Internet[cite: 7, 12, 13]. [cite_start]O objetivo principal desta atividade é proporcionar a oportunidade de praticar os conceitos de **programação estruturada**, conforme utilizados no mundo do desenvolvimento de software[cite: 11, 14]. [cite_start]O trabalho é um requisito parcial para a obtenção do grau de Graduação de Análise e Desenvolvimento de Sistemas na Unipar Universidade Paranaense[cite: 1, 7].

##  Tecnologias Utilizadas

O sistema é estruturado em três camadas de código:
1.  [cite_start]**HTML** (`index.html`): Define a estrutura do formulário de entrada de dados e faz a inclusão dos arquivos de estilo e script [cite: 20-68].
2.  [cite_start]**CSS** (`style.css`): Responsável pela estilização do formulário, incluindo o uso de classes para inputs dinâmicos e botões de remoção [cite: 69-183, 157-162].
3.  [cite_start]**JavaScript (com jQuery)** (`script.js`): Implementa a funcionalidade de adicionar e remover dinamicamente os campos de Experiência Profissional e Formação Acadêmica, melhorando a interação do usuário [cite: 184-219].
4.  [cite_start]**PHP** (`gerar_curriculo.php`): É a tecnologia de back-end que recebe os dados do formulário via método POST [cite: 31, 221-223][cite_start], realiza a coleta, sanitização (`htmlspecialchars`) e processamento das informações [cite: 224-263][cite_start], e por fim, gera o código HTML estilizado do currículo final [cite: 264-350].

##  Funcionalidades Principais

* [cite_start]**Coleta de Dados:** Formulário estruturado para inserção de Dados Pessoais, Resumo Profissional/Objetivo, Experiência e Formação Acadêmica [cite: 32-61].
* [cite_start]**Entradas Dinâmicas:** Capacidade de adicionar múltiplos registros de Experiência Profissional e Formação Acadêmica dinamicamente, com a opção de remover cada bloco individualmente [cite: 187-219].
* [cite_start]**Geração do Currículo:** O PHP processa todos os dados e cria uma página de currículo formatada, pronta para ser visualizada [cite: 220-350].
* [cite_start]**Pronto para PDF:** A página final do currículo inclui estilos CSS otimizados para impressão (`@media print`) [cite: 307-320] [cite_start]e uma instrução para o usuário utilizar a função do navegador "Salvar como PDF"[cite: 346, 347].

