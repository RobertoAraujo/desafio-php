
$(document).ready(function () {

    var processoPreenchido = false;
    var fornecedorPreenchido = false;
    var itensPreenchido = false;

    $("#avancar-processo").on("click", function () {
        $("#nav-processo").removeClass("show active");
        $("#nav-fornecedor").addClass("show active");
        $("#processo-tab").removeClass("active");
        $("#processo-tab").addClass("success");
        $("#fornecedor-tab").addClass("active");
    });

    $("#avancar-fornecedor").on("click", function () {
        $("#nav-fornecedor").removeClass("show active");
        $("#nav-itens").addClass("show active");
        $("#fornecedor-tab").removeClass("active");
        $("#fornecedor-tab").addClass("success");
        $("#itens-tab").addClass("active");
    });

    $("#avancar-itens").on("click", function () {
        $("#nav-itens").removeClass("show active");
        $("#nav-financeiro").addClass("show active");
        $("#itens-tab").removeClass("active");
        $("#itens-tab").addClass("success");
        $("#financeiro-tab").addClass("active");
    });

    $("#avancar-financeiro").on("click", function () {
        $("#nav-financeiro").removeClass("show active");
        $("#nav-resumo").addClass("show active");
        $("#financeiro-tab").removeClass("active");
        $("#financeiro-tab").addClass("success");
        $("#resumo-tab").addClass("active");
    });

    $("#voltar-processo").click(function () {
        $("#nav-fornecedor").removeClass("show active");
        $("#nav-processo").addClass("show active");
        $("#fornecedor-tab").removeClass("active");
        $("#processo-tab").addClass("active");
    });

    $("#voltar-itens").click(function () {
        $("#nav-itens").removeClass("show active");
        $("#nav-fornecedor").addClass("show active");
        $("#itens-tab").removeClass("active");
        $("#fornecedor-tab").addClass("active");

        $("html, body").animate({ scrollTop: 0 }, "slow");
    });

    $("#voltar-financeiro").click(function () {
        $("#nav-financeiro").removeClass("show active");
        $("#nav-itens").addClass("show active");
        $("#financeiro-tab").removeClass("active");
        $("#itens-tab").addClass("active");
    });

    $("#voltar-resumo").click(function () {
        $("#nav-resumo").removeClass("show active");
        $("#nav-financeiro").addClass("show active");
        $("#resumo-tab").removeClass("active");
        $("#financeiro-tab").addClass("active");
    });

    $("#botao-processo").click(function () {
        processoPreenchido = true;
    });

    $("#botao-fornecedor").click(function () {
        fornecedorPreenchido = true;
    });

    $("#botao-itens").click(function () {
        itensPreenchido = true;
    });

    var itensAdicionados = []
    var itensDisponiveis = []

    var navButtons = [
        {
            numero: 1,
            class: 'nav-link active',
            id: 'processo-tab',
            h5class: 'py-1 botao-ativo',
            datatarget: '#nav-processo',
            ariacontrols: 'processo',
            icone: 'fa-regular fa-edit',
            texto: 'Selecionar Processo'
        },
        {
            numero: 2,
            class: 'nav-link',
            id: 'fornecedor-tab',
            h5class: 'py-1',
            datatarget: '#nav-fornecedor',
            ariacontrols: 'fornecedor',
            icone: 'fa-regular fa-file-circle-plus',
            texto: 'Selecionar Fornecedor'
        },
        {
            numero: 3,
            class: 'nav-link',
            id: 'itens-tab',
            h5class: 'py-1',
            datatarget: '#nav-itens',
            ariacontrols: 'itens',
            icone: 'fa-regular fa-money-check-pen',
            texto: 'Selecionar Itens'
        },
        {
            numero: 5,
            class: 'nav-link',
            id: 'financeiro-tab',
            h5class: 'py-1',
            datatarget: '#nav-financeiro',
            ariacontrols: 'financeiro',
            icone: 'fa-regular fa-coins',
            texto: 'Financeiro'
        },
        {
            numero: 6,
            class: 'nav-link',
            id: 'resumo-tab',
            h5class: 'py-1',
            datatarget: '#nav-resumo',
            ariacontrols: 'resumo',
            icone: 'fa-regular fa-ballot-check',
            texto: 'Resumo da Solicitação'
        }
    ]

    $('.div-info').html(`
        <div class="rounded-top card-fornecedor mt-3">
            <div class="card-body">
                <div class="d-flex align-items-end" >
                    <p class="fw-bold me-2">Órgao: </p><span class="nome_orgao"></span>
                </div>
                <div class="d-flex align-items-end">
                    <p class="fw-bold me-2">N° Processo: </p><span class="numero_processo"> </span>
                    <p class="fw-bold ms-2 me-2">Ano Processo: </p><span class="ano_processo"> </span>
                </div>
                <div class="d-flex align-items-end">
                    <p class="fw-bold me-2">Objeto: </p><span class="objeto_processo"> </span>
                </div>
                <div class="fornecedor-info d-none">
                    <div class="d-flex align-items-end">
                        <p class="fw-bold me-2">Nome Fantasia: </p><span class="nome_fantasia"> </span>
                        <p class="fw-bold ms-2 me-2">CNPJ: </p><span class="cnpj"> </span>
                    </div>
                    <div class="d-flex align-items-end">
                        <p class="fw-bold me-2">Razão Social: </p><span class="razao_social"> </span>
                    </div>
                </div>
                <div class="despesa-info d-none " >
                    <div class="d-flex align-items-end">
                        <p class="fw-bold me-2">Despesa Orçamentária: </p><span class="despesa"> </span>
                    </div>
                </div>
            </div>
        </div>
    `)

    $('.nav-tabs-buttons').html(`
        ${navButtons.map(navButton => {
            return `
                <button class="${navButton.class}" type="button" id="${navButton.id}" data-bs-toggle="tab" data-bs-target="${navButton.datatarget}" role="tab" aria-controls="${navButton.ariacontrols}" aria-selected="true">
                    <h5 class="${navButton.h5class}">
                        <i class="${navButton.icone} me-2"></i><span>${navButton.texto}</span>
                    </h5>
                </button>
            `
        }).join('')}
    `)

    $(".nav > button").each(function(){
        if ($(this).hasClass("active") == false){
            $(this).children().find('span').prop('hidden', true);
        }
    });

    $('body').on('click', 'button', function(){
        $(".nav > button").each(function(){
            if ($(this).hasClass("active") == false){
                $(this).children().find('span').prop('hidden', true);
            }else{
                $(this).children().find('span').prop('hidden', false);
            }
        });
    })

    $('#busca_processo').select2({
        theme: 'bootstrap4',
        ajax: {
            url: buscarProcesso,
            dataType: 'json',
            method: 'GET',
            data: function(params) {
                return {
                    busca: params.term,
                    length: 25,
                    start: 0,
                    draw: 1,
                    order: [
                        {
                            column: 0,
                            dir: 'asc'
                        }
                    ]
                }
            },
            processResults: function(data) {
                var itens = [];
                data.data.map(dados => {
                    itens.push({ id: dados.id_processo, text: dados.numero_processo +" - "+ dados.objeto +" - "+ dados.sigla_orgao})
                });
                return {
                    results: itens
                };
            },

        }
    }).on('change', function (e) {
        $('.div-info').attr('hidden', false);
        var id_processo = $(this).val();
        $.ajax({
            url: buscarProcesso,
            method: 'GET',
            data: {
                id_processo: id_processo
            },
            success: function (data) {
                $(".numero_processo").text(data.numero_processo);
                $(".ano_processo").text(data.ano_processo);
                $(".objeto_processo").text(data.objeto);
                $(".nome_orgao").text(data.orgao + ' - ' + data.sigla_orgao)
            }
        })

        if ($(this).val() !== null && $(this).val() !== '') {
            $("#avancar-processo").prop("disabled", false);
        } else {
            $("#avancar-processo").prop("disabled", true);
        }

        $('#busca_fornecedores').val(null).trigger('change');
        $('.fornecedor-info').addClass('d-none');
    });

    $('#busca_fornecedores').select2({
        theme: 'bootstrap4',
        ajax: {
            url: buscarFornecedor,
            dataType: 'json',
            method: 'GET',
            data: function(params) {
                return {
                    busca: params.term,
                    id_processo: $("#busca_processo").val(),
                    length: 25,
                    start: 0,
                    draw: 1,
                    order: [
                        {
                            column: 0,
                            dir: 'asc'
                        }
                    ]
                }
            },
            processResults: function(data) {
                var itens = [];
                data.data.map(dados => {
                    itens.push({ id: dados.id_fornecedor, text: dados.cnpj + ' - ' + dados.razao_social })
                });
                return {
                    results: itens
                };
            }
        }
    }).on('change', function(){
        var id_fornecedor = $(this).val();
        $.ajax({
            url: buscarFornecedor,
            method: 'GET',
            data: {
                id_fornecedor: id_fornecedor
            },
            success: function (data) {

                $(".razao_social").text(data.razao_social);
                $(".nome_fantasia").text(data.nome_fantasia);
                $(".cnpj").text(data.cnpj);
                $(".fornecedor-info").attr('hidden', false);
            }
        })

        $('.fornecedor-info').removeClass('d-none');

        if ($(this).val() !== null && $(this).val() !== '') {
            $("#avancar-fornecedor").prop("disabled", false);
        } else {
            $("#avancar-fornecedor").prop("disabled", true);
        }

        table_item.draw();
    });

    var table_item = $('#item-fornecedor').DataTable({
        searching: false,
        paging: false,
        info: false,
        lengthChange: false,
        ordering: false,
        serverSide: true,

        ajax: {
            url: buscarItens,
            method: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: function (data) {
                data.id_fornecedor = $("#busca_fornecedores").val();
                data.id_processo = $("#busca_processo").val();
            }
        },
        columns: [
            {
                data: null,
                className: 'text-center align-middle fw-bolder',
                render: function (data, type, row) {
                    return  data.numero_item;
                }
            },
            {
                data: null,
                className: 'col-5',
                render: function (data, type, row) {
                    return  data.objeto;
                }
            },
            {
                data: null,
                className: 'text-center align-middle',
                render: function (data, type, row) {
                    return  data.tipo;
                }
            },
            {
                data: null,
                className: 'text-center align-middle',
                render: function (data, type, row) {
                    return  data.unidade;
                }
            },
            {
                data: null,
                className: 'text-center align-middle',
                render: function (data, type, row) {
                    return  data.quantidade_processo;
                }
            },
            {
                data: null,
                className: 'text-center align-middle',
                render: function (data, type, row) {
                    return  data.quantidade_empenhado == null ? data.quantidade_processo : data.quantidade_processo - data.quantidade_empenhado;
                }
            },
            {
                data: null,
                className: 'text-center align-middle',
                render: function (data, type, row) {
                    return  parseFloat(data.valor_unitario).toLocaleString('pt-BR', {style: 'currency', currency: 'BRL'});
                }
            },
            {
                data: null,
                className: 'text-center align-middle',
                render: function (data, type, row) {
                    return  `<button TYPE="button" class="btn btn-outline-warning adicionar-item" data-id="${data.id_item}" ${ data.quantidade_processo - data.quantidade_empenhado <= 0 ? 'disabled' : ''}><i class="fa-solid fa-check"></i></button>`
                }
            }
        ]
    }).on('draw', function(e, data) {
        itensDisponiveis = []
        for(let i in data.aoData) {
            itensDisponiveis.push(data.aoData[i]._aData)
        }

    })

    var table_editar_item = $('#editar-item').DataTable({
        searching: false,
        paging: false,
        info: false,
        lengthChange: false,
        ordering: false,
        data: itensAdicionados,
        columns: [
            {
                data: null,
                className: 'text-center align-middle fw-bolder',
                render: function (data, type, row) {
                    return  data.numero_item;
                }
            },
            {
                data: null,
                className: 'col-4',
                render: function (data, type, row) {
                    return  data.objeto;
                }
            },
            {
                data: null,
                className: 'text-center align-middle',
                render: function (data, type, row) {
                    return  data.tipo;
                }
            },
            {
                data: null,
                className: 'text-center align-middle',
                render: function (data, type, row) {
                    return  data.unidade;
                }
            },
            {
                data: null,
                className: 'text-center align-middle',
                render: function (data, type, row) {
                    return  data.quantidade_processo;
                }
            },
            {
                data: null,
                className: 'text-center align-middle',
                render: function (data, type, row) {
                    return  data.quantidade_empenhado == null ? data.quantidade_processo : data.quantidade_processo - data.quantidade_empenhado;
                }
            },
            {
                data: null,
                className: 'text-center align-middle',
                render: function (data, type, row) {
                    return  parseFloat(data.valor_unitario).toLocaleString('pt-BR', {style: 'currency', currency: 'BRL'});
                }
            },
            {
                data: null,
                className: 'text-center align-middle col-2 ',
                render: function (data, type, row) {
                    return `<div class="input-group"><span class="input-group-text ">${data.unidade}</span><input type="number" min="0" class="form-control qnt-empenho" value="${data.quantidade_empenho}"></div>`;
                }
            },
            {
                data: null,
                className: 'text-center align-middle ',
                render: function (data, type, row) {
                    return  `<span class="valor-total" data-id="${data.id_item}">${data.quantidade_empenho == null ? 'R$ 0,00' : parseFloat( data.quantidade_empenho * data.valor_unitario).toLocaleString('pt-BR', {style: 'currency', currency: 'BRL'})}</span>`

                }
            },
            {
                data: null,
                className: 'text-center align-middle',
                render: function (data, type, row) {
                    return  `<button class="btn btn-outline-danger remover-item" data-id="${data.id_item}"  ><i class="fa-solid fa-trash"></i></button>`
                }
            }
        ]
    }).on('keyup change', '.qnt-empenho', function (e) {
        e.preventDefault()
        var id = $(this).parent().parent().parent().find('.valor-total').data('id')
        var item = itensAdicionados.find(item => item.id_item === id)

        var saldo = item.quantidade_processo - item.quantidade_empenhado
        var valor = $(this).val().replace(/\./g, '').replace(',', '.')

        //adiciona no objeto o valor da quantidade de empenho
        item.quantidade_empenho = valor

        if(valor === ''){
            $(this).addClass('is-invalid')
            valor = 0;
        }else{
            $(this).removeClass('is-invalid')
        }

        var valorTotal = parseFloat(valor) * parseFloat(item.valor_unitario)

        //se o valor for maior que o saldo, adiciona a classe is-invalid
        if (valorTotal > saldo * parseFloat(item.valor_unitario)) {
            $(this).addClass('is-invalid')
        }

        //adicionar o valor total
        $(this).parent().parent().parent().find('.valor-total').text(valorTotal.toLocaleString('pt-BR', {style: 'currency', currency: 'BRL'}))

        //se todos os campos estiverem preenchidos, habilita o botão de avançar
        avancar();

        return false;
    })

    $("body").on('click', '#todos-itens', function (e){
        if($(this).prop('checked')) {
            $('.adicionar-item').each(function () {
                if (!$(this).prop('disabled')) {
                    $(this).click()
                }
            })
        }
    })

    $("body").on('click', '.adicionar-item', function (e){
        $('.todos_itens').prop('hidden', false);
        const id = $(this).data('id')
        const item = itensDisponiveis.find(item => item.id_item === id)
        itensAdicionados.push(item)

        var elemento = itensAdicionados[0].id_elemento_despesa

        $(".despesa").text(item.elemento_despesa.despesa);
        $('.despesa-info').removeClass('d-none');

        itensDisponiveis.forEach(item => {

            if (item.id_elemento_despesa !== elemento) {

                table_item.rows().every(function () {
                    if (this.data().id_item === item.id_item) {
                        $(this.node()).find('.adicionar-item').prop('disabled', true);
                        $(this.node()).find('.adicionar-item').removeClass('btn-outline-warning');
                        $(this.node()).find('.adicionar-item').addClass('btn-secondary');
                        $(this.node()).find('.adicionar-item').children().removeClass('fa-check');
                        $(this.node()).find('.adicionar-item').children().addClass('fa-ban');
                        $(this.node()).find('td').each(function(){
                            $(this).addClass('text-body-tertiary')
                        })
                    }
                })
            }
        })

        table_editar_item.row.add(item).draw()

        if (itensAdicionados.length === itensDisponiveis.length) {
            $('#todos-itens').prop('checked', true)
        }

        $('#table-editar-item').prop('hidden', false);
        $(this).prop('disabled', true);
        $(this).removeClass('btn-outline-warning');
        $(this).addClass('btn-success');
        $(this).parent().parent().find('td').each(function(){
            $(this).addClass('text-body-tertiary')
        })
    })

    $("body").on('click', '.remover-item', function(){
        const id = $(this).data('id')
        const item = itensAdicionados.find(item => item.id_item === id)
        itensAdicionados.splice(itensAdicionados.indexOf(item), 1)
        table_editar_item.clear().draw()
        table_editar_item.rows.add(itensAdicionados).draw()

        if (itensAdicionados.length === 0) {
            $('#table-editar-item').prop('hidden', true);

            $('.despesa-info').addClass('d-none');

            $('.todos_itens').prop('hidden', true);

            itensDisponiveis.forEach(item => {
                table_item.rows().every(function () {
                    if (this.data().id_item === item.id_item) {
                        $(this.node()).find('.adicionar-item').prop('disabled', false);
                        $(this.node()).find('.adicionar-item').removeClass('btn-secondary');
                        $(this.node()).find('.adicionar-item').addClass('btn-outline-warning');
                        $(this.node()).find('.adicionar-item').children().removeClass('fa-ban');
                        $(this.node()).find('.adicionar-item').children().addClass('fa-check');
                        $(this.node()).find('td').each(function(){
                            $(this).removeClass('text-body-tertiary')
                        })
                    }
                })
            })
        }

        $('#todos-itens').prop('checked', false)
        $('.adicionar-item').each(function () {
            if ($(this).data('id') === id) {
                $(this).prop('disabled', false);
                $(this).removeClass('btn-success');
                $(this).addClass('btn-outline-warning');
                $(this).parent().parent().find('td').each(function(){
                    $(this).removeClass('text-body-tertiary')
                })
            }
        })
    })

    $('#nav-financeiro input select').on('keyup change', function () {
        var camposPreenchidos = false

        $('#nav-financeiro input').each(function () {
            if ($(this).val() === '') {
                camposPreenchidos = true
            }
        })
        if (camposPreenchidos) {
            $('#avancar-financeiro').prop('disabled', true)
        } else {
            $('#avancar-financeiro').prop('disabled', false)
        }
    })

    function avancar(){
        var camposPreenchidos = true
        $('.qnt-empenho').each(function () {
            if ($(this).val() === '' || $(this).hasClass('is-invalid')) {
                camposPreenchidos = false
            }
        })
        if (camposPreenchidos) {
            $('#avancar-itens').prop('disabled', false)
        } else {
            $('#avancar-itens').prop('disabled', true)
        }
    }

})
