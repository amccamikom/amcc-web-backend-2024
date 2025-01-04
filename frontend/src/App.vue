<template>
  <div>
    <p class="text-xl font-bold" v-if="msg">{{ msg }}</p>
  </div>
</template>


<script lang="ts">
export default {
  data() {
    return {
      msg: ''
    }
  },
  async mounted() {
    const res = await fetch('http://localhost:8000/api')
    const data = await res.json()
    this.msg = data.message
  },
}
</script>



<style scoped>
.logo {
  height: 6em;
  padding: 1.5em;
  will-change: filter;
  transition: filter 300ms;
}

.logo:hover {
  filter: drop-shadow(0 0 2em #646cffaa);
}

.logo.vue:hover {
  filter: drop-shadow(0 0 2em #42b883aa);
}
</style>
