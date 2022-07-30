<template>
  <PageComponent title="UrlShort">

    <div class="min-w-screen flex items-center justify-center px-5 py-5">
      <div
        class="w-full mx-auto rounded-xl bg-gray-100 shadow-lg p-10 text-gray-800 relative overflow-hidden resize-x min-w-80 max-w-3xl">
        <form @click.prevent="shortUrls">
          <div class="relative mt-1">
            <input type="text" v-model="org_url"
              class="w-full pl-3 pr-10 py-2 border-2 border-gray-200 rounded-xl hover:border-gray-300 focus:outline-none focus:border-blue-500 transition-colors"
              placeholder="Put your link here...">
            <button type="submit"
              class="w-min h-7 text-center text-xl leading-0 absolute top-2 right-2 text-gray-900 focus:outline-none hover:text-gray-900 transition-colors">Short!</button>
          </div>
          <!-- <div class="absolute top-0 left-0 w-full h-2 flex">
            <div class="h-2 bg-blue-500 flex-1"></div>
            <div class="h-2 bg-red-500 flex-1"></div>
            <div class="h-2 bg-yellow-500 flex-1"></div>
            <div class="h-2 bg-blue-500 flex-1"></div>
            <div class="h-2 bg-green-500 flex-1"></div>
            <div class="h-2 bg-red-500 flex-1"></div>
          </div> -->
        </form>
        <div v-if="shortUrl && shortUrl.success">
          <a :href="shortUrl.data.hkey" target="_blank">{{ shortUrl.data.hkey }}</a>

        </div>
      </div>
    </div>



  </PageComponent>
</template>

<script setup>
import { useRouter } from "vue-router";
import { ref } from "vue";
import Alert from "../components/Alert.vue";
import PageComponent from "../components/PageComponent.vue";
import axios from "axios";
import { useStore } from "vuex";

const store = useStore();
</script>

<script>
export default {
  data() {
    return {
      org_url: null,
      error: null,
      shortUrl: {}
    }
  },
  methods: {
    shortUrls() {
      if (this.org_url && this.org_url !== '') {
        this.error = null
        axios.post('/url-short', {
          org_url: this.org_url
        }).then((res) => {
          if (res.data.success) {
            this.shortUrl = res.data
            console.log(res.data)
          }
        }).catch((err) => {
          console.log(err)
        })
      }
    }
  }
}

// import axios from "axios";
</script>

<style scoped>
</style>
<style>
@import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);
</style>
<style>
.min-w-80 {
  min-width: 20rem;
}

.resize::-webkit-resizer,
.resize-x::-webkit-resizer,
.resize-y::-webkit-resizer {
  background-color: transparent;
}

.resize:after,
.resize-x:after,
.resize-y:after {
  display: block;
  position: absolute;
  bottom: 5px;
  right: 5px;
  width: 24px;
  height: 24px;
  content: '\F045D';
  font: normal normal normal 24px/1 "Material Design Icons";
  font-size: 24px;
  text-rendering: auto;
  line-height: 24px;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: rgba(0, 0, 0, 0.3);
}
</style>

