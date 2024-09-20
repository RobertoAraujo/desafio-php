<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .logo {
            width: 80px;
            /* Tamanho da logo */
        }

        .container-outer {
            position: relative;
        }

        .logo-container {
            position: absolute;
            top: 10px;
            left: 10px;
        }
    </style>
</head>

<body>

    <div class="container-outer container mt-5 border p-3">
        <div class="logo-container">
            <img src="logo.png" alt="Logo" class="logo">
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">

                <h2 class="text-center mb-4">Cadastro de Cliente</h2>

                <form id="clienteForm" method="POST" action="{{ route('cliente.store') }}">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="cpf" class="form-label">CPF:</label>
                            <input type="text" id="cpf" name="cpf" class="form-control" maxlength="11" pattern="\d{11}" title="Digite exatamente 11 dígitos" required>
                        </div>

                        <div class="col-md-3">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" id="nome" name="nome" class="form-control" required>
                        </div>

                        <div class="col-md-3">
                            <label for="datanascimento" class="form-label">Data de Nascimento:</label>
                            <input type="date" id="datanascimento" name="datanascimento" class="form-control" required>
                        </div>

                        <div class="col-md-4 d-flex align-items-center">
                            <label class="form-label me-2">Sexo:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="genero" id="masculino" value="1" required>
                                <label class="form-check-label" for="masculino">Masculino</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="genero" id="feminino" value="2" required>
                                <label class="form-check-label" for="feminino">Feminino</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="endereco" class="form-label">Endereço:</label>
                            <input type="text" id="endereco" name="endereco" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label for="cidade" class="form-label">Cidade:</label>
                            <select id="cidade" name="cidade" class="form-select" required>
                                <option value="" disabled selected>Selecione uma cidade</option>
                                @forelse ($cidades as $cidade)
                                <option value="{{ $cidade->sigla }}" {{ old('cidade') == $cidade->sigla ? 'selected' : '' }}>
                                    {{ $cidade->nome }}
                                </option>
                                @empty
                                <option value="" disabled>Nenhuma cidade disponível</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="estado" class="form-label">Estado:</label>
                            <select id="estado" name="estado" class="form-select" required>
                                <option value="" disabled selected>Selecione um estado</option>
                                @forelse ($estados as $estado)
                                <option value="{{ $estado->sigla }}" {{ old('estado') == $estado->sigla ? 'selected' : '' }}>
                                    {{ $estado->nome }}
                                </option>
                                @empty
                                <option value="" disabled>Nenhum estado disponível</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.getElementById('clienteForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const form = event.target;
            const url = form.action;
            const data = new FormData(form);

            axios.post(url, data)
                .then(response => {
                    console.log(response.data);
                })
                .catch(error => {
                    console.log(error);
                });
        });
    </script>

</body>

</html>