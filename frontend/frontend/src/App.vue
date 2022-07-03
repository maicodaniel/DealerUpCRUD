<script setup lang="ts">
import { RouterLink, RouterView } from "vue-router";
import Header from "@/components/Header.vue";
import { def } from "@vue/shared";
</script>

<template>
  <header>
    

    <div class="wrapper">
      <div class="container">
        <Header msg="You did it!" />
        <nav>
          
          <RouterLink class="btn btn-outline-primary my-4 btn-sm" to="/listar">Listar Tarefas</RouterLink>
         
        </nav>
      </div>
      
    </div>
  </header>

  <RouterView />
</template>

<style>

</style>
