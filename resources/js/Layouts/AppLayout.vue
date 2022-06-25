<template>
  <v-app>
    <v-app-bar
      app
      light
      elevation="0"
      height="60px"
      fixed
      scroll-target="#scrolling-techniques"
    >
      <v-row>
        <v-btn elevation="0" text height="40" width="150">
          <v-img
            class="mx-2 ml-5"
            src="../assets/logo2.png"
            max-height="100"
            max-width="130"
            contain
          ></v-img
        ></v-btn>
        <v-spacer></v-spacer>
        <v-col cols="12">
          <v-toolbar-title>{{ $page.props.app.name }}</v-toolbar-title>
          <v-spacer />
          <v-link text rounded class="mr-4" :href="route('register')"
            >Register</v-link
          >
          <v-link text rounded :href="route('login')">Login</v-link>

          <v-btn
            icon
            @click="$vuetify.theme.dark = !$vuetify.theme.dark"
            class="teal--text"
          >
            <v-icon v-if="!$vuetify.theme.dark"> mdi-weather-night </v-icon>
            <v-icon v-else> mdi-white-balance-sunny </v-icon>
          </v-btn>
        </v-col>
      </v-row>
    </v-app-bar>

    <v-main class="mb-12">
      <slot />
    </v-main>

  <v-footer app small>
      &copy; {{ new Date().getFullYear() }} {{ $page.props.app.name }}
    </v-footer>
  </v-app>
</template>

<script>
// import FooterSec from "@/Components/Layout/FooterSec.vue"

export default {
//   components: {
//     FooterSec
//   },
  data() {
    return {
      showingNavigationDropdown: false,
    };
  },

  methods: {
    logout() {
      this.$inertia.post(route("logout"));
    },
  },
};
</script>
