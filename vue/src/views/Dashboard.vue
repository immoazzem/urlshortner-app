<template>
  <PageComponent title="Dashboard">
    <div class="flex justify-center">
      <router-link
        :to="{ name: 'ShortUrl' }"
        class="btn font-black text-3xl text-indigo-600 hover:text-indigo-500"
      >
        Click Here To Short Url
      </router-link>
    </div>

  </PageComponent>
</template>

<script setup>
import { EyeIcon, PencilIcon } from "@heroicons/vue/solid"
import PageComponent from "../components/PageComponent.vue";
import { computed } from "vue";
import { useStore } from "vuex";

const store = useStore();

</script>

<style scoped>
</style>
