<template class="bg-body">
  <div
    id="app"
    class="bg-body"
    style="background-color: #ffffff; min-height: 100vh"
  >
    <div>
      <Navigation />
    </div>
    <router-view />
  </div>
</template>

<script>
import Navigation from "./components/Navigation.vue";

export default {
  computed: {
    currentRouteName() {
      return this.$route.name;
    },
  },
  name: "App",
  components: {
    Navigation,
  },
};
</script>

<style></style>
