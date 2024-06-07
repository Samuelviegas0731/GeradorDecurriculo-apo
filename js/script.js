document.addEventListener('DOMContentLoaded', function() {
    const addExperienceButton = document.getElementById('add-experience');
    const addReferenceButton = document.getElementById('add-reference');

    if (addExperienceButton) {
        addExperienceButton.addEventListener('click', function() {
            addField('experience-fields', 'experience[]', 'Experiência Profissional');
        });
    }

    if (addReferenceButton) {
        addReferenceButton.addEventListener('click', function() {
            addField('reference-fields', 'reference[]', 'Referência Pessoal');
        });
    }

    // Função para calcular e exibir a idade
    function calcularIdade() {
        const dataNascimento = document.getElementById('birthdate').value;
        const hoje = new Date();
        const nascimento = new Date(dataNascimento);
        let idade = hoje.getFullYear() - nascimento.getFullYear();
        const mesAtual = hoje.getMonth();
        const diaAtual = hoje.getDate();
        const mesNascimento = nascimento.getMonth();
        const diaNascimento = nascimento.getDate();

        if (mesAtual < mesNascimento || (mesAtual === mesNascimento && diaAtual < diaNascimento)) {
            idade--;
        }

        return idade;
    }

    // Atualiza o elemento HTML com a idade calculada
    function exibirIdade() {
        const idade = calcularIdade();
        const idadeSpan = document.getElementById('idade');
        if (idadeSpan) {
            idadeSpan.textContent = `${idade} anos`;
        }
    }

    // Chama a função para exibir a idade quando a página carrega
    exibirIdade();

    // Adiciona um ouvinte de evento ao campo de data de nascimento para atualizar a idade quando a data é alterada
    const birthdateInput = document.getElementById('birthdate');
    if (birthdateInput) {
        birthdateInput.addEventListener('change', exibirIdade);
    }

    function addField(containerId, fieldName, placeholderText) {
        const container = document.getElementById(containerId);
        if (container) {
            const newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.name = fieldName;
            newInput.placeholder = placeholderText;
            newInput.required = true;

            container.appendChild(newInput);
        }
    }

    // Função para adicionar o botão de impressão ao final do currículo
    function addPrintButton() {
        // Cria um novo elemento de botão
        const printButton = document.createElement('button');
        printButton.textContent = 'Imprimir Currículo';
        printButton.classList.add('print-button'); // Adiciona a classe print-button para estilo
        // Adiciona um ouvinte de evento de clique para acionar a impressão
        printButton.addEventListener('click', function() {
            window.print(); // Aciona a função de impressão do navegador
        });

        // Encontra o elemento de contêiner do currículo
        const container = document.querySelector('container');
        if (container) {
            // Adiciona o botão ao final do contêiner
            container.appendChild(printButton);
        }
    }

    // Chama a função para adicionar o botão de impressão quando o documento estiver pronto
    addPrintButton();
});

