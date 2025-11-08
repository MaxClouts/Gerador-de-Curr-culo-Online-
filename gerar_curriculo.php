<?php
// Verifica se a requisição é um POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Coleta e sanitiza os dados estáticos
    $nome = htmlspecialchars($_POST['nome'] ?? 'Nome Não Informado');
    $email = htmlspecialchars($_POST['email'] ?? 'Email Não Informado');
    $telefone = htmlspecialchars($_POST['telefone'] ?? 'Telefone Não Informado');
    $resumo = htmlspecialchars($_POST['resumo'] ?? 'Resumo Não Informado');
    $resumo_formatado = nl2br($resumo);

    // 2. Coleta e processa Experiências (Arrays)
    $experiencias_html = '';
    if (isset($_POST['experiencia_cargo']) && is_array($_POST['experiencia_cargo'])) {
        $cargos = $_POST['experiencia_cargo'];
        $descricoes = $_POST['experiencia_descricao'];
        
        for ($i = 0; $i < count($cargos); $i++) {
            $cargo = htmlspecialchars($cargos[$i]);
            $descricao = htmlspecialchars($descricoes[$i]);
            $experiencias_html .= '
                <div class="item-experiencia">
                    <h3>' . $cargo . '</h3>
                    <p>' . nl2br($descricao) . '</p>
                </div>';
        }
    } else {
        $experiencias_html = '<p>Nenhuma experiência profissional informada.</p>';
    }

    // 3. Coleta e processa Formações 
    $formacoes_html = '';
    if (isset($_POST['formacao_curso']) && is_array($_POST['formacao_curso'])) {
        $cursos = $_POST['formacao_curso'];
        $instituicoes = $_POST['formacao_instituicao'];
        
        for ($i = 0; $i < count($cursos); $i++) {
            $curso = htmlspecialchars($cursos[$i]);
            $instituicao = htmlspecialchars($instituicoes[$i]);
            $formacoes_html .= '
                <div class="item-formacao">
                    <h3>' . $curso . '</h3>
                    <p>' . $instituicao . '</p>
                </div>';
        }
    } else {
        $formacoes_html = '<p>Nenhuma formação acadêmica informada.</p>';
    }
    
    // Início da saída HTML do currículo 
    echo '<!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Currículo de ' . $nome . '</title>
        <style>
            body { font-family: "Helvetica", "Arial", sans-serif; margin: 0; padding: 20px; background-color: #f9f9f9; }
            .curriculo { max-width: 800px; margin: auto; padding: 30px; border: 1px solid #ddd; background: white; box-shadow: 0 0 10px rgba(0,0,0,0.05); }
            
            .cabecalho { text-align: center; margin-bottom: 25px; padding-bottom: 10px; border-bottom: 3px solid #007bff; }
            h1 { margin: 0; color: #007bff; font-size: 28px; text-transform: uppercase; }
            .contato { font-size: 14px; color: #555; }
            .contato span { margin: 0 10px; }

            h2 { 
                color: #333; 
                margin-top: 30px; 
                padding-bottom: 5px; 
                border-bottom: 2px solid #ccc;
                font-size: 20px;
            }
            .secao { margin-bottom: 20px; line-height: 1.6; font-size: 15px; }
            .resumo-texto { font-style: italic; color: #444; }
            
            .item-experiencia, .item-formacao {
                margin-bottom: 15px;
                border-left: 4px solid #007bff;
                padding-left: 10px;
            }
            .item-experiencia h3, .item-formacao h3 {
                margin: 0;
                font-size: 16px;
                color: #333;
            }
            .item-experiencia p, .item-formacao p {
                margin: 5px 0 0 0;
                font-size: 14px;
            }
            
            /* Estilos para a tela (visualização web) */
            .pdf-link-container { text-align: center; margin-top: 30px; }
            .pdf-link {
                background-color: #dc3545; color: white; padding: 10px 20px; 
                border: none; border-radius: 5px; cursor: pointer; text-decoration: none;
                font-size: 16px; display: inline-block;
            }

            @media print {
                /* Oculta o container que possui o botão de imprimir */
                .pdf-link-container {
                    display: none;
                }
                
                /* Remove a cor de fundo e bordas na impressão */
                body {
                    background-color: white !important;
                }
                .curriculo {
                    border: none;
                    box-shadow: none;
                }
            }
        </style>
    </head>
    <body>

    <div class="curriculo">
        <div class="cabecalho">
            <h1>' . $nome . '</h1>
            <div class="contato">
                <span>' . $email . '</span> |
                <span>' . $telefone . '</span>
            </div>
        </div>

        <h2>Resumo Profissional</h2>
        <div class="secao resumo-texto">
            <p>' . $resumo_formatado . '</p>
        </div>

        <h2>Experiência Profissional</h2>
        <div class="secao">
            ' . $experiencias_html . '
        </div>
        
        <h2>Formação Acadêmica</h2>
        <div class="secao">
            ' . $formacoes_html . '
        </div>

    </div>
    <div class="pdf-link-container">
        <p style="color: #888;">Use a função de impressão do navegador (Ctrl+P ou Cmd+P) e selecione "Salvar como PDF" para finalizar.</p>
        <a href="javascript:window.print()" class="pdf-link">🖨️ Imprimir / Salvar como PDF</a>
    </div>

    </body>
    </html>';

} else {
    echo "Acesso inválido. Por favor, preencha o formulário em <a href='index.html'>index.html</a>.";
}
?>