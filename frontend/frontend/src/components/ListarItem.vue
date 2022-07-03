<template>

    <div>
        
            <RouterLink class="btn btn-outline-success btn-sm" to="/criar">Adicionar Tarefas</RouterLink>
        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>

                </tr>
            </thead>
            <tbody  v-for="item in retorno" :key="item.id">
                <tr>
                <th scope="row">{{item.id}}</th>
                <td>{{item.nome}}</td>
                <td>{{item.descricao}}</td>
                <td>{{item.status}}</td>
                <td >
                    <button class="btn btn-danger btn-sm" @click.prevent="deletarTarefa(item.id)">Deletar</button>   
                    <RouterLink class="btn btn-success ms-1 btn-sm" :to="{name:'editar',params:{id:item.id}}">Editar</RouterLink>
                    
    
                </td>
                </tr>
                
            </tbody>
        </table>
    </div>

   
</template>


<script>
    import { RouterLink, RouterView } from "vue-router";
    import api from '@/plugins/api';
    export default {
       name: 'ListarItem',
        data(){
            return {
                retorno:[]
            }     
        },

        created(){
            this.getTarefas();
        },
    
        mounted(){
            
        },
        methods:{
            async getTarefas(){
                await api
                .get('/listar')
                .then(response => {
                    console.log(response.data);
                    this.retorno = response.data;       
                })
                .catch(error => console.log(error))
            },
             deletarTarefa(id){
                console.log(id);
                api
                .delete('/delete/'+id)
                .then(response => {
                    console.log(response);
                   if(response.data.status == true){
                        setTimeout(() => {
                                this.$router.go();
                            }, 2000);
                        
                   }   
                })
                .catch(error => console.log(error))
            },
        },
       
    }

</script>

