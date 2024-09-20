    $(document).ready(function () {
        const inputNames = [
            "numero_processo",
            "cpf_cnpj_fornecedor",
            "ano_empenho",
            "id_orgao",
            "descricao",
            "cnpj",
            "razao_social",
            "inscricao_estadual",
            "endereco",
            "bairro",
            "cidade",
            "uf",
            "cep",
            "numero_item",
            "descricao_item",
            "valor_unitario",
            "valor_total",
            "quantidade_processo",
        ];

        inputNames.forEach(function (name) {
            const inputs = $('input[name="' + name + '"]');

            inputs.each(function () {
                const input = $(this);
                input.on("change", function () {
                    inputs.each(function () {
                        if (!$(this).is(input)) {
                            $(this).prop("checked", false);
                        }
                    });
                });
            });
        });
    });

    // $(document).ready(function () {
    //     const avancarItensButton = $("#avancar-itens");
    //     const selectedItens = [];
    //
    //     $('input[type="checkbox"]').on('change', function() {
    //         const checkbox = $(this);
    //         const tr = checkbox.closest('tr');
    //
    //         const item = {
    //             numero_item: tr.find('[name="numero_item"]').val(),
    //             descricao_item: tr.find('[name="descricao_item"]').val(),
    //             unidade: tr.find('[name="unidade"]').val(),
    //             quantidade_processo: tr.find('[name="quantidade_processo"]').val(),
    //             valor_unitario: tr.find('[name="valor_unitario"]').val(),
    //             quantidade_empenhado: tr.find('[name="quantidade_empenhado"]').val(),
    //             valor_empenho: tr.find('[name="valor_empenho"]').val(),
    //         };
    //
    //         // Verificar se o checkbox foi marcado ou desmarcado
    //         if (checkbox.prop('checked')) {
    //             selectedItens.push(item);
    //         } else {
    //             const index = selectedItens.findIndex(i => i.numero_item === item.numero_item);
    //             if (index !== -1) {
    //                 selectedItens.splice(index, 1);
    //             }
    //         }
    //
    //         if (selectedItens.length > 0) {
    //             avancarItensButton.prop("disabled", false);
    //         } else {
    //             avancarItensButton.prop("disabled", true);
    //         }
    //     });
    // });

    $(document).ready(function () {



    });

    // $(document).ready(function() {
    //     // Função para verificar se todos os campos estão preenchidos
    //     function verificarCamposPreenchidos() {
    //         const codProgramaTrabalho = $('#cod_programa_trabalho').val();
    //         const idFonte = $('#id_fonte').val();
    //         const elementoDespesa = $('#id_situacao').val();
    //         const historico = $('#historico').val();
    //
    //         // Habilitar o botão se todos os campos estiverem preenchidos
    //         if (codProgramaTrabalho && idFonte && elementoDespesa && historico) {
    //             $('#avancar-financeiro').prop('disabled', false);
    //         } else {
    //             $('#avancar-financeiro').prop('disabled', true);
    //         }
    //     }
    //
    //     // Lidar com mudanças nos campos
    //     $('#cod_programa_trabalho, #id_fonte, #id_situacao, #historico').on('change input', function() {
    //         verificarCamposPreenchidos();
    //     });
    //
    //     // Verificar o estado inicial
    //     verificarCamposPreenchidos();
    // });

    // document.addEventListener("DOMContentLoaded", function () {
    //     const quantidadeEmpenhadoInputs = document.querySelectorAll(".quantidade-empenhado-input");
    //
    //     quantidadeEmpenhadoInputs.forEach(function (input) {
    //         input.addEventListener("change", function () {
    //             const checkbox = $(this);
    //
    //             const numeroItem = checkbox.val();
    //             const row = checkbox.closest('tr');
    //
    //             // Obtenha o valor diretamente do campo de entrada quantidadeNoProcesso
    //             const quantidadeNoProcesso = parseFloat(row.find('[name=quantidade_empenhado]').val());
    //             const valorUnitario = parseFloat(row.children('td').eq(5).text().replace(',', '.'));
    //
    //             const valor_empenho = quantidadeNoProcesso * valorUnitario;
    //             const valorEmpenhoCell = row.find('td[data-name="valor_empenho"]');
    //
    //             valorEmpenhoCell.text(valor_empenho.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
    //             // console.log(valor_empenho)
    //             // Atualize o valor do campo input com a mesma formatação
    //             this.parentElement.parentElement.querySelector('#valor_empenho').value = valor_empenho
    //         });
    //     });
    // });

    // Função para enviar os dados para a página de resumo
    function enviarParaResumo() {}

    // $(document).ready(function () {
    //
    //     const avancarProcessoButton = $("#avancar-processo");
    //     $('#busca_processo').on('change', function () {
    //         if ($(this).val() !== null) {
    //
    //             avancarProcessoButton.prop("disabled", false);
    //         } else {
    //             avancarProcessoButton.prop("disabled", true);
    //         }
    //     });
    //
    //     const avancarFornecedorButton = $("#avancar-fornecedor");
    //
    //     $('#busca_fornecedores').on('change', function () {
    //         if ($(this).val() !== null && $(this).val() !== '') {
    //             avancarFornecedorButton.prop("disabled", false);
    //         } else {
    //             avancarFornecedorButton.prop("disabled", true);
    //         }
    //     });
    //
    //     $('#busca_fornecedores').on('change', function () {
    //         const cnpjSelecionado = $(this).val().split(' ')[0];
    //
    //         $(`#item-fornecedor[data-cnpj="${cnpjSelecionado}"]`).show();
    //     });
    //
    //     $('#itens-fornecedor').on('input', '.quantidade-empenhado', function () {
    //         const $row = $(this).closest('#item-fornecedor');
    //         const quantidadeEmpenhar = parseFloat($(this).val());
    //         const valorUnitario = parseFloat($row.find('#valor_unitario').data('valor_unitario'));
    //         const valorTotal = quantidadeEmpenhar * valorUnitario;
    //         $row.find('#valor_total').text(valorTotal.toFixed(4).replace('.', ','));
    //     });
    // });

    // $(document).ready(function() {
    //     $('.quantidade-empenhado-input').on('input', function() {
    //         var inputValue = parseFloat($(this).val());
    //         var maxInputValue = parseFloat($(this).attr('max'));
    //
    //         if (inputValue > maxInputValue) {
    //             $(this).val(maxInputValue);
    //             alert('A quantidade empenhada não pode ser maior do que a quantidade do processo.');
    //         }
    //     });
    //
    //     $('#busca_processo').on('change', function() {
    //        const numero_processo = $(this).val();
    //     });
    //
    //
    // });
