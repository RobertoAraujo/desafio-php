<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consulta Representante</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    html,
    body {
      height: 100%;
      margin: 0;
    }

    .centered-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .content {
      width: 100%;
      max-width: 1200px;
      /* Altere para o valor desejado ou remova */
      position: relative;
    }

    .logo {
      position: absolute;
      top: 0;
      left: 0;
      padding: 10px;
    }
  </style>
</head>

<body>
  <div class="centered-container" x-data="setup" x-init="fetchData">
    <div class="container content" style="border: 1px solid #000; padding: 20px; position: relative;">
      <!-- Logo no canto superior esquerdo -->
      <div class="logo">
        <img src="logo.png" alt="Logo" class="img-fluid" style="max-width: 150px;">
      </div>

      <div class="row mt-5">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              Consulta Representante
            </div>
            <div class="card-body">
              <form method="">
                <div class="row mb-3">
                  <div class="col-md-2">
                    <label for="cpf" class="form-label">CPF:</label>
                    <input type="text" id="cpf" name="cpf" class="form-control" value="{{ request('cpf') }}">
                  </div>

                  <div class="col-md-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" id="nome" name="nome" class="form-control" value="{{ request('nome') }}">
                  </div>

                  <div class="col-md-3">
                    <label for="datanascimento" class="form-label">Data de Nascimento:</label>
                    <input type="date" id="datanascimento" name="datanascimento" class="form-control" value="{{ request('datanascimento') }}">
                  </div>

                  <div class="col-md-4 d-flex align-items-center">
                    <label class="form-label me-2">Sexo:</label>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="genero" id="masculino" value="1" {{ request('genero') == '1' ? 'checked' : '' }}>
                      <label class="form-check-label" for="masculino">Masculino</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="genero" id="feminino" value="feminino" required>
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
                <button type="submit" class="btn btn-primary">Buscar</button>
                <button type="reset" class="btn btn-secondary">Limpar</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-3">
        <!-- Resultado Encontrado -->
        <div class="col-12">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Clientes</th>
                <th>CPF</th>
                <th>Data de Nascimento</th>
                <th>Sexo</th>
                <th>Estado</th>
                <th>Cidade</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($representantes as $representante)
              <tr>
                <td>{{ $representante->id }}</td>
                <td>{{ $representante->nome }}</td>
                <td>{{ $representante->cpf }}</td>
                <td>{{ $representante->data_nascimento }}</td>
                <td>{{ $representante->genero === '1' ? 'M' : 'F' }}</td>
                <td>{{ $representante->endereco ? $representante->endereco->estado : 'N/A' }}</td>
                <td>{{ $representante->endereco ? $representante->endereco->cidade : 'N/A' }}</td>
                <td>
                  <button class="btn btn-warning btn-sm">Editar</button>
                  <form action="{{ route('representante.deletar', $representante->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este representante?')">Excluir</button>
                  </form>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="8" class="text-center">Nenhum Registro Encontrado</td>
              </tr>
              @endforelse
            </tbody>
          </table>
          <div class="d-flex justify-content-center mt-3">
            {{ $representantes->links('pagination::bootstrap-4') }}
          </div>
        </div>
      </div>

      <div class="row mt-3">
        <!-- Lista de representante -->
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function fetchData(page = 1) {
      fetch(`http://localhost:8000/representante?page=${page}`)
        .then(response => response.json())
        .then(data => {
          representante = data;
          console.log(representante.data);
        });
    }

    fetchData();

    const representante = {
      data: [],
      current_page: 1,
      links: [],
      from: 1,
      to: 1,
      total: 1,
      per_page: 1,
      representanteSize: 0,
      representante: 0,
    };
    getSexo = (genero) => {
      if (genero === '1') {
        return 'M';
      } else {
        return 'F';
      }
    };
  </script>
</body>

</html>