const { createApp, ref, computed } = Vue;

createApp({
  setup() {
    const selected = ref([]);
    const anySelected = computed(() => selected.value.length > 0);
    

    const botaoSelecionado = (assunto) => {
      if(selected.value.includes(assunto)) {
        selected.value = selected.value.filter(item => item !== assunto);
      } else {
        selected.value.push(assunto);
      }
    };

    const limparFavoritos = () => {
      selected.value = [];
    };


    return {
      selected,
      botaoSelecionado,
      limparFavoritos,
      anySelected

    };
  }
}).mount('#app');