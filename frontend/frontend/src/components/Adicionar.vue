<template>
<div class="container">
    <div class="row">
        <div class="col-md-6">
        
            <form @submit.prevent="addTarefa" >
                <fieldset>
                    <div class="form-group">
                        <label class="form-label mt-4">Nome</label>
                        <input class="form-control" 
                            type="text" 
                            v-model="tarefa.nome" 
                            placeholder="Nome"
                            id="nome"
                        >
                    </div>
                    <div class="form-group">
                        <label class="form-label mt-4">Descrição</label>
                        <input class="form-control" 
                            type="text" 
                            v-model="tarefa.descricao" 
                            placeholder="Seu texto aqui"
                            id="descricao"
                        >
                    </div>
                    <div class="form-group">
                        <label class="form-label mt-4">Status</label>
                        <select class="form-control" v-model="tarefa.status" >
                            <option disabled value="">Escolha um status</option>
                            <option value="C">Criado</option>
                            <option value="A">Andamento</option>
                            <option value="F">Finalizado</option>
                            <option value="P">Pausa</option>
                        </select>
                        
                    </div>
                  
                <button class="btn btn-primary mt-4">Submit</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>

    
</template>

<script>

 import api from '@/plugins/api';
    export default {
       name: 'Adicionar',
        data(){
            return {
                tarefa:{},
                nome: '',
                descricao: '',
                status: '',
                errors:[],
            }     
        },

        methods:{
        
            async addTarefa(){
               
                   let formData = new FormData();
                   formData.append('nome', this.tarefa.nome);
                   formData.append('descricao', this.tarefa.descricao);
                   formData.append('status', this.tarefa.status );
                   
                   await api
                        .post('/adicionar',formData)
                        .then(response => {
                            console.log(response.data);
                            if (response.data.status == false) {
                                let nomeInput = document.getElementById('nome');
                                let descricaoInput = document.getElementById('descricao');
                                nomeInput.style.borderColor = "#fa4";
                                descricaoInput.style.borderColor = "#fa4";
                            }else{
                                setTimeout(() => {
                                    this.$router.push({name: 'tarefas'});
                                }, 3000);
                                
                            }
                            
                                  
                        })
                        .catch(error => console.log(error))
                
              
            }
        }
        
    }

</script>