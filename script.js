// script.js

$(document).ready(function() {
    
    
    // 1. ADICIONAR NOVA EXPERIÊNCIA
    
    $('#addExperiencia').click(function(e) {
        e.preventDefault(); 
        
        var novoCampo = `
            <div class="experiencia-group dynamic-input">
                <label>Cargo/Empresa:</label>
                <input type="text" name="experiencia_cargo[]" required>
                <label>Descrição (Período e Atividades):</label>
                <textarea name="experiencia_descricao[]" required></textarea>
                <button type="button" class="removerCampo">Remover Experiência</button>
            </div>
        `;
        
        $('#camposExperiencia').append(novoCampo);
    });

    
    // 2. REMOVER CAMPO DINÂMICO 
    
    $('#camposExperiencia, #camposFormacao').on('click', '.removerCampo', function() {
        $(this).closest('.dynamic-input').remove();
    });
    
    
    // 3. ADICIONAR NOVA FORMAÇÃO

    $('#addFormacao').click(function(e) {
        e.preventDefault();
        
        var novoCampo = `
            <div class="formacao-group dynamic-input">
                <label>Curso/Grau:</label>
                <input type="text" name="formacao_curso[]" required>
                <label>Instituição/Período:</label>
                <input type="text" name="formacao_instituicao[]" required>
                <button type="button" class="removerCampo">Remover Formação</button>
            </div>
        `;
        
        $('#camposFormacao').append(novoCampo);
    });
});