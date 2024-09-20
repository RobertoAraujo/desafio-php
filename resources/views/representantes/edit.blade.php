<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Representante</title>
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

                <h2 class="text-center mb-4">Edição de Representante</h2>

                <form id="representanteForm" method="POST" action="{{ route('representante.update', $representante->id) }}"></form>
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="cpf" class="form-label">CPF:</label>
                            <input type="text" id="cpf" name="cpf" class="form-control" maxlength="11" pattern="\d{11}" title="Digite exatamente 11 dígitos" value="{{ old('cpf', $representante->cpf) }}" required>
                        </div>

                        <div class="col-md-3">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome', $representante->nome) }}" required>
                        </div>

                        <div class="col-md-3">
                            <label for="datanascimento" class="form-label">Data de Nascimento:</label>
                            <input type="date" id="datanascimento" name="datanascimento" class="form-control" value="{{ old('datanascimento', is_string($representante->data_nascimento) ? $representante->data_nascimento : $representante->data_nascimento->format('Y-m-d')) }}" required>
                        </div>

                        <div class="col-md-4 d-flex align-items-center">
                            <label class="form-label me-2">Sexo:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="genero" id="masculino" value="1" {{ old('genero', $representante->genero) == 1 ? 'checked' : '' }} required>
                                <label class="form-check-label" for="masculino">Masculino</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="genero" id="feminino" value="2" {{ old('genero', $representante->genero) == 2 ? 'checked' : '' }} required>
                                <label class="form-check-label" for="feminino">Feminino</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="endereco" class="form-label">Endereço:</label>
                            <input type="text" id="endereco" name="endereco" class="form-control" value="{{ old('endereco', $representante->endereco) }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="cidade" class="form-label">Cidade:</label>
                            <select id="cidade" name="cidade" class="form-select" required>
                                <option value="" disabled selected>Selecione uma cidade</option>
                                @forelse ($cidades as $cidade)
                                    <option value="{{ $cidade->id }}" {{ old('cidade') == $cidade->id ? 'selected' : ($representante->cidade_id == $cidade->id ? 'selected' : '') }}>
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
                                    <option value="{{ $estado->id }}" {{ old('estado') == $estado->id ? 'selected' : ($representante->estado_id == $estado->id ? 'selected' : '') }}>
                                        {{ $estado->nome }}
                                    </option>
                                @empty
                                    <option value="" disabled>Nenhum estado disponível</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.getElementById('representanteForm').addEventListener('submit', function(event) {
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
