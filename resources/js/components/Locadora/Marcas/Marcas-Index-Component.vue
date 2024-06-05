<template>
    <div class="container">
        <div class="row mb-3">
            <div class="col-sm-6">
                <h3>Marcas</h3>
            </div>
            <div class="col-sm-6 text-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cadastrarMarca">
                    Cadastrar
                </button>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Imagem</th>
                    <th class="text-center" scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Toyota</td>
                    <td>
                        <img src="https://media.istockphoto.com/id/1478431022/pt/foto/cars-for-sale-stock-lot-row.webp?s=1024x1024&w=is&k=20&c=2Tx_cQAujcGeLKcF7ciK_JiFaFUIT19SAAY7nKeQmyQ="
                            width="70">
                    </td>
                    <td class="text-center">
                        <a href="#"><i class="fa-regular fa-pen-to-square fa-lg"></i></a>&nbsp;
                        <a href="#"><i class="fa-regular fa-trash-can fa-lg" style="color: red;"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>

        <!--
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
        -->

        <div class="modal fade" id="cadastrarMarca" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastrar nova marca</h5>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3 form-group">
                            <label class="form-label">Nome</label>
                            <input type="text" class="form-control" v-model="nomeMarca">

                            {{ nomeMarca }}
                        </div>
                        <div class="mb-3 form-group">
                            <label class="form-label">Imagem</label>
                            <input type="file" class="form-control-file" @change="carregarImagem($event)">
                            
                            {{ arquivoImagem }}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            nomeMarca: '',
            arquivoImagem: [],
        }
    },
    methods: {
        carregarImagem(e) {
            this.arquivoImagem = e.target.files;
        }
    }
}
</script>