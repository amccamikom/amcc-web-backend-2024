<template>
  <div>

    <Navbar />
    <Container>
      <!-- Row pertama -->
      <div class="flex w-full border-2 mt-10 md:mt-40">
        <!-- Kolom kiri kosong -->
        <div class="w-1/12 border-2"></div>

        <!-- Konten utama (2 kolom tengah) -->
        <div class="flex-1 grid   divide-x divide-gray-300">
          <div class="py-10 px-8">
            <p class="text-[3.4rem] text-center  font-bold text-gray-1000 leading-none	" v-if="data">Turning
              Code into Web Apps
            </p>
            <!-- <p class="text-xl text-gray-1000" v-if="data">{{ data.subline }}</p> -->
          </div>
          <div v-if="formattedMarkdown"
            class="hidden px-12  justify-center items-center border-l-2 min-h-full border-gray-300">
            <MarkdownIt :source="formattedMarkdown" />
          </div>
        </div>

        <!-- Kolom kanan kosong -->
        <div class="w-1/12 border-2"></div>
      </div>

      <!-- Row kedua -->
      <div class="flex w-full border-2">
        <div class="w-1/12 border-2"></div>

        <div class="flex-1 grid justify-center items-center text-center w-full grid-cols-1 divide-x divide-gray-300">
          <div class="py-10 px-8">
            <p class="text-xl text-gray-1000" v-if="data">From messy commits to polished products, we create the web

            </p>
            <br>
            <div>
              <a target="_blank" href="https://ungu.in/discord-amcc">
                <button class="bg-gray-1000 py-4 px-8 rounded-md">Join Now</button>
              </a>
            </div>
          </div>
        </div>
        <div class="w-1/12 border-2"></div>
      </div>
    </Container>
  </div>
</template>

<script lang="ts">
import Container from './components/Container.vue';
import MarkdownIt from './components/MarkdownIt.vue';
import Navbar from './components/Navbar.vue';
import { API_URL } from './lib/constants';

export default {
  components: {
    MarkdownIt,
    Container,
    Navbar
  },
  data() {
    return {
      data: {
        headline: "",
        subline: "",
      },
    }
  },
  async mounted() {
    const res = await fetch(API_URL)
    const data = await res.json()
    this.data = data
  },
  computed: {
    formattedMarkdown() {
      return "```json\n" + JSON.stringify(this.data, null, 2) + "\n```";
    },
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
